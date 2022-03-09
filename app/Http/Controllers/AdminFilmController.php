<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\film;
use App\Models\Category;
use App\Models\CategoryFilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminFilmRequest;
use Illuminate\Support\Facades\File;

class AdminFilmController extends Controller
{
    public function index()
    {
        return view('User.Admin.Film.index', [
            'films' => film::latest()->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('User.Admin.Film.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(AdminFilmRequest $request)
    {
        // dd($request->method());
        $sinopsis = preg_replace('/<br>/', '<p></p>', $request->sinopsis);
        $sinopsis = preg_replace('/<div>/', '<p>', $sinopsis);
        $sinopsis = preg_replace('#</div>#', '</p>', $sinopsis);
        // dd($sinopsis);

        try {
            DB::beginTransaction();
            if($request->hasFile('gambar')) {
                $extensi = $request->file('gambar')->getClientOriginalExtension();
                $namaGambar = 'film-'.time().".$extensi";
                $request->file('gambar')->move('images/Upload', $namaGambar);
            }
            $film = film::create([
                'title' => $request->title,
                'sinopsis' => $sinopsis,
                'sutradara' => $request->sutradara,
                'pemain' => $request->pemain,
                'produksi' => $request->produksi,
                'playing' => $request->playing,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
                'gambar' => $namaGambar,
            ]);

            for ($i = 1; $i <= 5 ; $i++) {
                if($request->input('category-'.$i)) {
                    CategoryFilm::create([
                        'film_id' => $film->id,
                        'category_id' => $i
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dashboard.admin.film.index')->with(['status' => 'success', 'value' => 'Film Berhasil ditambah!']);
        } catch (Exception $exception) {
            DB::rollBack();
            echo $exception->getMessage();
        }
    }

    public function show(film $film)
    {
        return view('User.Admin.Film.show', [
            'film' => $film
        ]);
    }

    public function edit(film $film)
    {
        return view('User.Admin.Film.edit', [
            'film' => $film,
            'categories' => Category::all()
        ]);
    }

    public function update(AdminFilmRequest $request, film $film)
    {
        $sinopsis = preg_replace('#^<br>|</br>$#', '', $request->sinopsis);

        try {
            DB::beginTransaction();
            if($request->hasFile('gambar')) {
                File::delete('images/Upload/' . $film->gambar);

                $extensi = $request->file('gambar')->getClientOriginalExtension();
                $namaGambar = 'film-'.time().".$extensi";
                $request->file('gambar')->move('images/Upload', $namaGambar);
            }

            $film->update([
                'title' => $request->title,
                'sinopsis' => $sinopsis,
                'sutradara' => $request->sutradara,
                'pemain' => $request->pemain,
                'produksi' => $request->produksi,
                'playing' => $request->playing ?? $film->playing,
                'harga' => $request->harga,
                'durasi' => $request->durasi,
                'gambar' => $namaGambar ?? $film->gambar,
            ]);

            CategoryFilm::where('film_id', $film->id)->delete();

            for ($i = 1; $i <= 5 ; $i++) {
                if($request->input('category-'.$i)) {
                    CategoryFilm::create([
                        'film_id' => $film->id,
                        'category_id' => $i
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dashboard.admin.film.index')->with(['status' => 'success', 'value' => 'Film Berhasil Diubah!']);
        } catch (Exception $exception) {
            DB::rollBack();
            echo $exception->getMessage();
        }
    }

    public function destroy(film $film)
    {
        // dd($film);
        film::destroy($film->id);

        return redirect()->route('dashboard.admin.film.index')->with(['status' => 'success', 'value' => 'Film Berhasil dihapus!']);
    }

    public function start(film $film)
    {
        $film->update([
            'playing' => 'Now PLaying'
        ]);

        return redirect()->route('dashboard.admin.film.index')->with(['status' => 'success', 'value' => 'Film Berhasil diStart!']);
    }
}

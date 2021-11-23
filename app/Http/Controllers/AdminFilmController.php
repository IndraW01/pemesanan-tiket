<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminFilmRequest;
use App\Models\Category;
use App\Models\CategoryFilm;
use App\Models\film;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $sinopsis = preg_replace('#^<br>|</br>$#', '', $request->sinopsis);
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
        //
    }

    public function update(Request $request, film $film)
    {
        //
    }

    public function destroy(film $film)
    {
        //
    }
}

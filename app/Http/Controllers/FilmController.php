<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Schedule;
use DateTime;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        return  view('Films.index', [
            'nows' => Film::where('playing', 'Now PLaying')->latest()->get(),
            'comings' => Film::where('playing', 'Upcoming')->latest()->get()
        ]);
    }

    public function show(Film $film)
    {
        // dd($film->categories->pluck('nama_category')->map(fn($value) => "$value")->implode(', '));
        return view('Films.show', [
            'film' => $film,
            'category' => $film->categories->pluck('nama_category')->map(fn($value) => "$value")->implode(', ')
        ]);
    }

    public function schedule(Film $film)
    {
        $dateTime = new DateTime();

        return view('Films.schedule', [
            'film' => $film,
            'schedules' => Schedule::all(),
            'dateNow' => $dateTime->format("H:i")
        ]);
    }

    public function chair(Request $request)
    {
        // dd('yes');

        $request->session()->put('data', $request->all());
        return redirect()->route('films.chairview');
    }

    public function chairview()
    {
        // dd(session('data'));
        $data = session('data');
        // session()->forget('data');
        dump($data);
    }
}

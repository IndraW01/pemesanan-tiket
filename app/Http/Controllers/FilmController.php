<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Schedule;
use App\Models\Seat;
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

    public function chair(Request $request, Film $film)
    {
        return view('Films.checkout', [
            'film' => $film,
            'ticket' => $request->ticket,
            'seatsA' => Seat::where('seat', 'A')->get()->pluck('no_bangku'),
            'seatsB' => Seat::where('seat', 'B')->get()->pluck('no_bangku'),
        ]);
    }

}

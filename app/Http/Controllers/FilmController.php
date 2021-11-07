<?php

namespace App\Http\Controllers;

use App\Models\Film;
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
}

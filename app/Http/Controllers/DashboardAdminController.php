<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return  view('User.index', [
            'jumlahPlaying' => Film::where('playing', 'Now PLaying')->selectRaw('count(*) as jumlah')->first()->jumlah,
            'jumlahUpcoming' => Film::where('playing', 'Upcoming')->count()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // dd("booking");
        // dd(Auth::user()->bookings);
        // $booking = Auth::user()->bookings;
        // $seats = $booking->seats();
        // dd($seats);
        return view('User.Booking.index', [
            'bookings' => Auth::user()->bookings
        ]);
    }
}

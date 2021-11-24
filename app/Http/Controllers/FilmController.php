<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Film;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\SeatUser;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        return  view('Films.index', [
            'nows' => Film::where('playing', 'Now PLaying')->filter(request(['search']))->latest()->get(),
            'comings' => Film::where('playing', 'Upcoming')->filter(request(['search']))->latest()->get()
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
        if($film->playing != 'Now PLaying') {
            abort(403);
        }

        $dateTime = new DateTime();

        return view('Films.schedule', [
            'film' => $film,
            'schedules' => Schedule::all(),
            'dateNow' => $dateTime->format("H:i")
        ]);
    }

    public function chair(Request $request, Film $film)
    {
        if($film->playing != 'Now PLaying') {
            abort(403);
        }

        $Validator = Validator::make($request->all(),
        [
            'jam_tayang' => 'required'
        ],
        [
            'required' => 'Jam Tayang Tidak ada'
        ]);

        if($Validator->fails()) {
            return back()->withErrors($Validator)->withInput();
        }

        return view('Films.checkout', [
            'film' => $film,
            'jam_tayang' => $request->jam_tayang,
            'ticket' => $request->ticket,
            'seatsA' => Seat::whereSeat('A')->get()->pluck('no_bangku'),
            'seatsB' => Seat::where('seat', 'B')->get()->pluck('no_bangku'),
        ]);
    }

    public function store(Film $film, Request $request)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::create([
                'user_id' => Auth::user()->id,
                'film_id' => $film->id,
                'schedule_id' => Schedule::whereSchedule($request->input('jam_tayang'))->pluck('id')->first(),
                'tiket' => $request->ticket,
                'total' => $film->harga * $request->ticket
            ]);

            for($i = 1; $i <= 10; $i++) {
                if($request->input('seat-'.$i)) {
                    SeatUser::create([
                        'user_id' => Auth::user()->id,
                        'seat_id' => Seat::where('no_bangku', $request->input('seat-'.$i))->pluck('id')->first(),
                        'booking_id' => $booking->id
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $message) {
            echo $message->getMessage();
            DB::rollBack();
        }
        // dd("berhasil");
        return redirect()->route('dashboard.user.booking')->with(['status' => 'success', 'value' => 'Film Booking Successfully!']);
    }
}

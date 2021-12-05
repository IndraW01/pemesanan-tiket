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
        // dd($request->jam_tayang);
        if(!in_array($request->jam_tayang, ['13.30', '16.30', '19.30']) || !in_array($request->ticket, [1,2,3,4,5])) {
            abort(403);
        }

        if($film->playing != 'Now PLaying') {
            abort(403);
        }

        $Validator = Validator::make($request->all(),
        [
            'jam_tayang' => 'required',
            'ticket' => 'required|numeric'
        ],
        [
            'required' => 'Jam Tayang Tidak ada'
        ]);

        if($Validator->fails()) {
            return back()->withErrors($Validator)->withInput();
        }

        $schedule = Schedule::where('schedule', $request->jam_tayang)->select('id')->first();

        $bookingsFilm = Booking::where('film_id', $film->id)->where(function($query) use ($schedule) {
            $query->where('schedule_id', $schedule->id);
        })->get();

        if($bookingsFilm->count() > 0) {
            $simpan1 = null;
            foreach($bookingsFilm as $bookingFilm) {
                // dd($bookingFilm);
                $simpan2 = [];

                $seatUsers = $bookingFilm->seats;
                foreach($seatUsers as $seatUser) {
                    $simpan2[] = $seatUser->seat->no_bangku;
                }

                $simpan1[] = $simpan2;
            }
            $seat = [];
            foreach($simpan1 as $simpan) {
                foreach($simpan as $s) {
                    $seat[] = $s;
                }
            }
        }


        return view('Films.checkout', [
            'film' => $film,
            'jam_tayang' => $request->jam_tayang,
            'ticket' => $request->ticket,
            'seatBookings' => $seat ?? [],
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

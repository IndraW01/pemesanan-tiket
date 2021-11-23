<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\SeatUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        return view('User.Booking.index', [
            'bookings' => Auth::user()->bookings
        ]);
    }

    public function lunaskan(Booking $booking)
    {
        $total = $booking->total;
        $saldo = Auth::user()->wallet->saldo;

        if($total > $saldo) {
            return back()->with(['status' => 'failed', 'value' => 'Saldo anda Kurang']);
        }

        try {
            DB::beginTransaction();
            Auth::user()->wallet->update([
                'saldo' => $saldo - $total
            ]);

            $booking->update([
                'status' => 'Lunas'
            ]);

            DB::commit();
            return back()->with(['status' => 'success', 'value' => 'Transaksi Anda berhasil dilunaskan']);
        } catch (Exception $exception) {
            DB::rollBack();
            echo $exception->getMessage();
        }


    }

    public function destroy(Booking $booking)
    {
        try {
            DB::beginTransaction();
            SeatUser::where('booking_id', $booking->id)->delete();

            $booking->delete();

            DB::commit();
            return back()->with(['status' => 'success', 'value' => 'Transaksi Anda berhasil dihapus']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(['status' => 'failed', 'value' => 'Transaksi Anda gagal dihapus']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\SeatUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// reference the Dompdf namespace
use Dompdf\Dompdf;


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
        $saldo = Auth::user()->wallet->saldo ?? $error = true;

        if(isset($error)) {
            return back()->with(['status' => 'failed', 'value' => 'Register E-Wallet Terlebih dahulu']);
        }

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

    public function cetak(Booking $booking)
    {
        if($booking->user_id != Auth::user()->id) {
            abort(403);
        }
        $html =  view('User.Booking.cetak', [
            'booking' => $booking
        ]);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Tikect {$booking->film->title}", ['Attachment' => false]);
    }
}

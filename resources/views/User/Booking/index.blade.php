{{-- @dd($wallet) --}}
@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">My Booking</h1>

@if (session()->has('status'))
    <div id="flash" data-flash="{{ session()->get('value') }}"></div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
               My Booking
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Jam</th>
                                <th>Ticket</th>
                                <th>Harga/Tiket</th>
                                <th>Total</th>
                                <th>Seat</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->film->title }}</td>
                                    <td>{{ $booking->schedule->schedule }}</td>
                                    <td>{{ $booking->tiket }}</td>
                                    <td>{{ $booking->film->harga }}</td>
                                    <td>{{ $booking->total }}</td>
                                    <td>
                                        {{-- @dd($booking->seats) --}}
                                        @forelse ($booking->seats as $seats)
                                            <a class="text-decoration-none text-dark">{{ $seats->seat->no_bangku }}</a>
                                        @empty

                                        @endforelse
                                    </td>
                                    <td>{{ $booking->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Data Booking Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

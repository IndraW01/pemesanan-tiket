{{-- @dd($ticket) --}}
{{-- @dd($seatsA) --}}
@extends('Layouts.main')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center m-auto">
        <div class="col-md-2">
            <div class="section-header">
                Seats
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <img src="/images/cartoons/demon-slayer.jpg" alt="" width="247" height="381">
        </div>
        <div class="col-md-4">
            <h3 class="mb-3 text-white">{{ $film->title }}</h3>
            <p class="fs-5"><i class='bx-fw bx bx-time-five bx-sm'></i> {{ $film->durasi }} Minutes</p>
            <p class="fs-5"><i class='bx-fw bx bx-money bx-sm'></i> Rp {{ $film->harga }}</p>
            <span class="btn btn-sm disabled me-2" style="border: 1px solid rgba(255 ,255 ,255, 0.5);">2D</span>
            <span class="btn btn-sm disabled" style="border: 1px solid rgba(255 ,255 ,255, 0.5);">R13+</span>

            <p class="fs-5 mt-4">Chekout Film</p>

            <div class="form">
                <form action="">
                    <div class="mb-3 fs-5">
                        <p class="d-inline me-3">A</p>
                        @foreach ($seatsA as $seatA)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="{{ $seatA }}" id="seats" value="{{ $seatA }}">
                                <label class="form-check-label" for="seats">{{ $loop->iteration }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3 fs-5">
                        <p class="d-inline me-3">B</p>
                        @foreach ($seatsB as $seatB)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="{{ $seatB }}" id="seats" value="{{ $seatB }}">
                                <label class="form-check-label" for="seats">{{ $loop->iteration }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn" style="background-color: #c0392b">Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

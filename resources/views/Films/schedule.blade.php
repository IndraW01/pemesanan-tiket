@extends('Layouts.main')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-3">
        <img src="/images/cartoons/demon-slayer.jpg" alt="" width="247" height="381">
    </div>
    <div class="col-md-4">
        <h3 class="mb-3 text-white">{{ $film->title }}</h3>
        <p class="fs-5"><i class='bx-fw bx bx-time-five bx-sm'></i> {{ $film->durasi }} Minutes</p>
        <span class="btn disabled me-2" style="border: 1px solid rgba(255 ,255 ,255, 0.5);">2D</span>
        <span class="btn disabled" style="border: 1px solid rgba(255 ,255 ,255, 0.5);">R13+</span>

        <p class="fs-5 mt-4">Pilih Jam Tayang</p>

        @foreach ($schedules as $schedule)
        <a href="?jam={{ $schedule->schedule }}" class="btn me-3" style="border: 1px solid rgba(255 ,255 ,255, 0.5); color: #f14e3c" data-bs-toggle="modal" data-bs-target="#exampleModal">
            {{ $schedule->schedule }}
        </a>
        @endforeach

        @include('Partials.modal')

    </div>
</div>

@endsection

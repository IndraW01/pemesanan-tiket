{{-- @dd($errors) --}}
@extends('Layouts.main')

@section('content')

<div class="container mt-5">
    @if (session()->has('status'))
        <div id="flash" data-flash="{{ session()->get('value') }}"></div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="section-header">
                Schedule
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
                <form action="{{ route('films.checkout', ['film' => $film->title]) }}">
                    <div class="mb-3">
                        <label for="ticket" class="form-label">Jam Tayang:</label>
                        <select class="form-select @error('jam_tayang') is-invalid @enderror" name="jam_tayang" id="ticket">
                            @foreach ($schedules as $schedule)
                                {{-- @if ($dateNow > $schedule->schedule) --}}
                                    {{-- <option value="{{ $schedule->schedule }}" disabled>{{ $schedule->schedule }}</option> --}}
                                {{-- @else --}}
                                    <option value="{{ $schedule->schedule }}">{{ $schedule->schedule }}</option>
                                {{-- @endif --}}
                            @endforeach
                        </select>
                        @error('jam_tayang')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ticket" class="form-label">Select Tickets:</label>
                        <select class="form-select" name="ticket" id="ticket">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn" style="background-color: #c0392b">Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- @dd($nows) --}}
@extends('Layouts.main')

@section('content')

<!-- NOW PLAYING SECTION -->
<div class="section">
    <div class="container">
        @if (session()->has('status'))
            <div id="flash" data-flash="{{ session()->get('value') }}"></div>
        @endif
        <div class="row justify-content-center mb-5">
            <div class="col-md-4">
                <form action="{{ route('films.index') }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Judul Film" aria-describedby="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit" id="search">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="section-header">
            Now Playing
        </div>
        <div class="movies-slide carousel-nav-center owl-carousel">
            @forelse ($nows as $now)
            <!-- MOVIE ITEM -->
            <a href="{{ route('films.show', ['film' => $now->title]) }}" class="movie-item">
                <img src="{{ asset('images/Upload/' . $now->gambar) }}" alt="">
                <div class="movie-item-content">
                    <div class="movie-item-title">
                        {{ $now->title }}
                    </div>
                    <div class="movie-infos">
                        <div class="movie-info">
                            <i class="bx bxs-time"></i>
                            <span>{{ $now->durasi }} min</span>
                        </div>
                        <div class="movie-info">
                            <i class='bx bx-money'></i>
                            <span>Rp {{ $now->harga }}</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END MOVIE ITEM -->
            @empty
            <h3>Film Tidak Ada</h3>
            @endforelse
        </div>
    </div>
</div>
<!-- END NOW PLAYING SECTION -->

<!-- UPCOMING SECTION -->
<div class="section">
    <div class="container">
        <div class="section-header">
            Upcoming
        </div>
        <div class="movies-slide carousel-nav-center owl-carousel">
            @forelse($comings as $coming)
            <!-- MOVIE ITEM -->
            <a href="{{ route('films.show', ['film' => $coming->title]) }}" class="movie-item">
                <img src="{{ asset('images/Upload/' . $coming->gambar) }}" alt="">
                <div class="movie-item-content">
                    <div class="movie-item-title">
                        {{ $coming->title }}
                    </div>
                    <div class="movie-infos">
                        <div class="movie-info">
                            <i class="bx bxs-time"></i>
                            <span>{{ $coming->durasi }} min</span>
                        </div>
                        <div class="movie-info">
                            <i class='bx bx-money'></i>
                            <span>Rp {{ $coming->harga }}</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END MOVIE ITEM -->
            @empty
            <h3>Film Tidak Ada</h3>
            @endforelse
        </div>
    </div>
</div>
<!-- END UPCOMING SECTION -->

@endsection

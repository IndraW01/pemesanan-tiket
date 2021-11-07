{{-- @dd($nows) --}}
<div class="hero-section">
    <!-- HERO SLIDE -->
    <div class="hero-slide">
        <div class="owl-carousel carousel-nav-center" id="hero-carousel">
            @foreach ($nows->take(3) as $now)
            <!-- SLIDE ITEM -->
            <div class="hero-slide-item">
                <img src="/images/black-banner.png" alt="">
                <div class="overlay"></div>
                <div class="hero-slide-item-content">
                    <div class="item-content-wraper">
                        <div class="item-content-title top-down">
                            {{ $now->title }}
                        </div>
                        <div class="movie-infos top-down delay-2">
                            <div class="movie-info">
                                <i class="bx bxs-time"></i>
                                <span>120 mins</span>
                            </div>
                            <div class="movie-info">
                                <span>HD</span>
                            </div>
                            <div class="movie-info">
                                <span>16+</span>
                            </div>
                        </div>
                        <div class="item-content-description top-down delay-4">
                             {!! Str::limit($now->sinopsis, 240, '') !!}
                        </div>
                        <div class="item-action top-down delay-6">
                            <a href="{{ route('films.show', ['film' => $now->title]) }}" class="btn btn-hover">
                                <i class="bx bxs-right-arrow"></i>
                                <span>Buy Ticket</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SLIDE ITEM -->
            @endforeach
        </div>
    </div>
    <!-- END HERO SLIDE -->
</div>

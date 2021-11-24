{{-- @dd($film->categories) --}}
@extends('Layouts.main')

@section('content')
<div class="container mt-5">
    @if (session()->has('status'))
        <div id="flash" data-flash="{{ session()->get('value') }}"></div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="section-header">
                {{ $film->playing }}
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <img src="/images/cartoons/demon-slayer.jpg" alt="" width="287" height="421">
            @if ($film->playing == 'Now PLaying')
                <a href="{{ route('films.schedule', ['film' => $film->title]) }}" class="btn buy">Buy Ticket</a>
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="mb-3 title-show">{{ $film->title }}</h3>
            <table class="table text-white table-borderless">
                <tr class="mb-3">
                    <td class="padding">Kategory Film</td>
                    <td>: {{ $category }}</td>
                </tr>
                <tr>
                    <td class="padding">Sutradara</td>
                    <td>: {{ $film->sutradara }}</td>
                </tr>
                <tr>
                    <td class="padding">Produksi</td>
                    <td>: {{ $film->produksi }}</td>
                </tr>
                <tr>
                    <td class="padding">Casts</td>
                    <td>: {{ $film->pemain }}</td>
                </tr>
            </table>
            <h4 class="mt-5">Sinopsis</h4>
            <p class="sinopsis">{!! $film->sinopsis !!}</p>
        </div>
    </div>
</div>
@endsection

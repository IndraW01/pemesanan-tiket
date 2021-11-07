{{-- @dd($film->categories) --}}
@extends('Layouts.main')

@section('content')
<div class="container mt-5">
    <div class="section-header">
        {{ $film->playing }}
    </div>
    <div class="row">
        <div class="col-md-4">
            <img src="/images/cartoons/demon-slayer.jpg" alt="" width="287" height="421">
            <a href="#" class="btn buy">Buy Ticket</a>
        </div>
        <div class="col-md-8">
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

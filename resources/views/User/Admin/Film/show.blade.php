@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">Show Film</h1>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('dashboard.admin.film.index') }}" class="btn btn-primary"><i class="fas fa-fw fa-undo-alt"></i></a>
                </div>
               <div class="crud">
                   <a href="" class="btn btn-success {{ $film->playing=='Now PLaying'?'disabled':'' }}"><i class="fas fa-fw fa-play-circle"></i> Start</a>
                   <a href="" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i> Tambah</a>
                   <a href="" class="btn btn-warning"><i class="fas fa-fw fa-pen-square"></i> Edit</a>
                   <a href="" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
               </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <img src="/images/cartoons/demon-slayer.jpg" alt="" width="287" height="421">
                    </div>
                    <div class="col-md-8">
                        <h3 class="mb-3 title-show">{{ $film->title }}</h3>
                        <table class="table table-borderless">
                            <tr class="mb-3">
                                <td class="padding">Kategory Film</td>
                                <td>: {{ $film->categories->pluck('nama_category')->implode(', ') }}</td>
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
        </div>
    </div>
</div>

@endsection

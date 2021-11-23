{{-- @dd($films) --}}
@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">Data Film</h1>

@if (session()->has('status'))
    <div id="flash" data-flash="{{ session()->get('value') }}"></div>
@endif

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               My Booking
               <a href="{{ route('dashboard.admin.film.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Start Film</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($films as $key => $film)
                                <tr>
                                    <td>{{ $key + $films->firstItem() }}</td>
                                    <td>{{ $film->title }}</td>
                                    <td>
                                        @if ($film->playing == 'Now PLaying')
                                            <a href="" class="btn btn-primary disabled">Start</a>
                                        @else
                                            <a href="#" class="btn btn-primary">Start</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.admin.film.show', ['film' => $film->title]) }}" class="btn btn-success">Show</a>
                                        <a href="" class="btn btn-warning">Update</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Film Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $films->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">Edit Film</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('dashboard.admin.film.index') }}" class="btn btn-primary"><i class="fas fa-fw fa-undo-alt"></i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.admin.film.update', ['film' => $film->title]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $film->id }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $film->title) }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sutradara" class="form-label">Sutradara</label>
                        <input type="text" class="form-control @error('sutradara') is-invalid @enderror" name="sutradara" id="sutradara" value="{{ old('sutradara', $film->sutradara) }}">
                        @error('sutradara')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pemain" class="form-label">Cast</label>
                        <input type="text" class="form-control @error('pemain') is-invalid @enderror" name="pemain" id="pemain" value="{{ old('pemain', $film->pemain) }}">
                        @error('pemain')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="produksi" class="form-label">Produksi</label>
                        <input type="text" class="form-control @error('produksi') is-invalid @enderror" name="produksi" id="produksi" value="{{ old('produksi', $film->produksi) }}">
                        @error('produksi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga', $film->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi</label>
                        <input type="number" class="form-control @error('durasi') is-invalid @enderror" name="durasi" id="durasi" value="{{ old('durasi', $film->durasi) }}">
                        @error('durasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="playing" class="form-label">Playing</label>
                        <select class="form-select @error('playing') is-invalid @enderror" name="playing" id="playing">
                            <option value="Now PLaying" {{ old('playing', $film->playing) == 'Now PLaying' ? 'selected' : '' }}>Now Playing</option>
                            <option value="Upcoming" {{ old('playing', $film->playing) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                        </select>
                        @error('playing')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categories</label>
                        <div class="col-md-6">
                            @foreach ($categories as $key => $category)
                                @if (in_array($category->nama_category, $film->categories->pluck('nama_category')->all()) || old('category-' . $key+1) == $category->nama_category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="category-{{ $key + 1 }}" id="category-{{ $key + 1 }}" value="{{ $category->id }}" checked>
                                    <label class="form-check-label" for="category-{{ $key + 1 }}">{{ $category->nama_category }}</label>
                                </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="category-{{ $key + 1 }}" id="category-{{ $key + 1 }}" value="{{ $category->id }}">
                                    <label class="form-check-label" for="category-{{ $key + 1 }}">{{ $category->nama_category }}</label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <img src="{{ asset('images/Upload/'.$film->gambar) }}" width="100" height="100" class=" img-thumbnail d-block mb-3">
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        @error('sinopsis')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="sinopsis" type="hidden" name="sinopsis" value="{{ old('sinopsis', $film->sinopsis) }}">
                        <trix-editor input="sinopsis"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">Register E-Wallet</h1>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                Daftar E-Wallet
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.user.wallet.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pin" class="form-label">Pin</label>
                        <input type="number" class="form-control @error('pin') is-invalid @enderror"" name="pin" id="pin">
                        <div id="pin" class="form-text"><small>Pin harus 4 Karakter</small></div>
                        @error('pin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: #c0392b">Register</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection

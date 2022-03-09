{{-- @dd($wallet) --}}
@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">My E-Wallet</h1>

@if (session()->has('status'))
    <div id="flash" data-flash="{{ session()->get('value') }}"></div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                Saldo E-Wallet
            </div>
            <div class="card-body">
                <h3>Saldo Saya = Rp. {{ $wallet->saldo }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                Ubah Pin E-Wallet
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.user.wallet.update', ['wallet' => $wallet->no_hp]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="pinlama" class="form-label">Pin Lama</label>
                        <input type="number" class="form-control @error('pinlama') is-invalid @enderror" name="pinlama" id="pinlama">
                        @error('pinlama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pin" class="form-label">Pin Baru</label>
                        <input type="number" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin">
                        @error('pin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pin_confirmation" class="form-label">Pin Konfirmasi</label>
                        <input type="number" class="form-control @error('pin_confirmation') is-invalid @enderror" name="pin_confirmation" id="pin_confirmation">
                        @error('pin_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: #c0392b">Ubah</button>
                    <a href="{{ route('dashboard.user.wallet') }}" class="btn btn-warning">Kembali</a>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection

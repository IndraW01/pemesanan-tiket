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
                Topup E-Wallet
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.user.wallet.topup') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="pin" class="form-label">Pin</label>
                        <input type="number" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin">
                        @error('pin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="number" class="form-control @error('saldo') is-invalid @enderror" name="saldo" id="saldo">
                        @error('saldo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: #c0392b">Top Up</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection

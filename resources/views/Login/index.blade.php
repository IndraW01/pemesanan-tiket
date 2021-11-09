@extends('Layouts.main')

@section('content')

<div class="container">
    @if (session()->has('status'))
        <div id="flash" data-flash="{{ session()->get('value') }}"></div>
    @endif
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="form">
                <h3 class="text-center">Login</h3>
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <a href="{{ route('register.index') }}" class="text-center d-block mb-3 register">don't have an account, register now!</a>
                    <button type="submit" class="btn text-center d-flex" style="background-color: #c0392b; margin: auto">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

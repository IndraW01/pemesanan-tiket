@extends('User.Layouts.main')

@section('user.content')

<h1 class="h3 mb-4 text-gray-800">My Profile</h1>

<div class="card mb-4">
    <div class="card-header">
        Profile
    </div>
    <div class="card-body">
        <p>Nama : {{ \Auth::user()->name }}</p>
        <p>Email : {{ \Auth::user()->email }}</p>
    </div>
</div>

@endsection

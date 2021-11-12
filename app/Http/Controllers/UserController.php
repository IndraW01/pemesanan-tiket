<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('User.Profile.index');
    }

    public function wallet()
    {
        return view('User.Wallet.index');
    }
}

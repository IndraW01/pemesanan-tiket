<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:3|confirmed'
        ]);

        $validateData['password'] = Hash::make($request->password);
        $validateData['is_admin'] = false;
        // dd($validateData);

        User::create($validateData);

        return redirect()->route('login.index')->with(['status' => 'success', 'value' => 'Registration Successful!']);
    }
}

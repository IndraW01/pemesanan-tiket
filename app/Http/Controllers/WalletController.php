<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        if($wallet = Wallet::where('user_id', Auth::user()->id)->first()) {
            return view('User.Wallet.index', [
                'wallet' => $wallet
            ]);
        } else {
            return view('User.Wallet.create');
        }
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'no_hp' => 'required|numeric',
            'pin' => 'required|size:4'
        ]);

        $validateData['user_id'] = Auth::user()->id;

        Wallet::create($validateData);

        return redirect()->route('dashboard.user.wallet')->with(['status' => 'success', 'value' => 'E-Wallet created successfully']);
    }

    public function topup(Request $request)
    {
        $validateData = $request->validate([
            'pin' => 'required',
            'saldo' => 'required'
        ]);

        $wallet = Wallet::where('user_id', Auth::user()->id)->first();

        if($wallet['pin'] != $request->pin) {
            return redirect()->route('dashboard.user.wallet')->with(['status' => 'failed', 'value' => 'Your pin is wrong']);
        }

        if($request->saldo < 10000) {
            return redirect()->route('dashboard.user.wallet')->with(['status' => 'failed', 'value' => 'Top up minimum 10000']);
        }

        $topupSaldo = $wallet['saldo'] + $request->saldo;

        $wallet->update([
            'saldo' => $topupSaldo
        ]);

        return redirect()->route('dashboard.user.wallet')->with(['status' => 'success', 'value' => 'E-Wallet Topup successfully']);
    }
}

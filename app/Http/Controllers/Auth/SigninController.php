<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function signin(Request $request)
    {
        if (!Auth::attempt([
            'school_number'  =>  $request->school_number,
            'password'       =>  $request->password,
        ])) {
            \Auth::logout();
        };
        return redirect()->route('home');
    }
}

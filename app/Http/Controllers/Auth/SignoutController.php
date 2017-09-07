<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SignoutController extends Controller
{
    public function signout(Request $request)
    {
        \Auth::logout();
        return redirect()->route('home');
    }
}

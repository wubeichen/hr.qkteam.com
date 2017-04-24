<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function signin(Request $request){
        if(Auth::attempt([
            'username'  =>  $request->username,
            'password'  =>  $request->password
        ])){
            return redirect()->route('member.index');
        }
        return redirect()->route('auth.signin');
    }
}

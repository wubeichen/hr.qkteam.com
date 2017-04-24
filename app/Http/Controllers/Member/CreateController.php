<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index(){
        return view('page.member.new');
    }

    public function create(Request $request){
        $member = new \App\Models\Member;
        $member->password = bcrypt('123456');
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->birthday = $request->birthday;
        $member->school_number = $request->school_number;
        $member->qq = $request->qq;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->bank_number = $request->bank_number;
        $member->active = $request->active;
        $member->save();
        return redirect() -> route('member.index');
    }
}

<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index (\App\Models\Member $member){
        return view('page.member.item', [
            'member' => $member,
        ]);
    }

    public function edit (\App\Models\Member $member){
        $member = new \App\Models\Member;
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->birthday = $request->birthday;
        $member->school_name = $request->school_name;
        $member->qq = $request->qq;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->bank_number = $request->bank_number;
        $member->active = $request->active;
        $member->save();
        return redirect()->route('member.item', [$member->id]);
    }
}

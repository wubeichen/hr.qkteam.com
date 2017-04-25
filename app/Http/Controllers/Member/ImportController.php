<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(\App\Models\Recruitment $recruitment)
    {
        $member = new \App\Models\Member;
        $member->name = $recruitment->name;
        $member->gender = $recruitment->gender;
        $member->birthday = $recruitment->birthday;
        $member->school_number = $recruitment->school_number;
        $member->qq = $recruitment->qq;
        $member->phone = $recruitment->phone;
        $member->email = $recruitment->email;
        $member->password = bcrypt(md5($recruitment->school_number));
        $member->active = 1;
        $member->save();
        return redirect()->route('member.item', [$member->id]);
    }
}

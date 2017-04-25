<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function in(\App\Models\Member $member)
    {
        $member->active = 1;
        $member->save();
        return redirect()->route('member.item', [$member->id]);
    }

    public function out(\App\Models\Member $member)
    {
        $member->active = 0;
        $member->save();
        return redirect()->route('member.item', [$member->id]);
    }
}

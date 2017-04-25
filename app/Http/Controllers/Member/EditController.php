<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:update,member');
    }

    public function index(\App\Models\Member $member)
    {
        return view('member.edit', [
            'member' => $member,
        ]);
    }

    public function edit(\App\Models\Member $member, R\Member\EditRequest $request)
    {
        $member = new \App\Models\Member;
        $member->birthday = $request->birthday;
        $member->qq = $request->qq;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->bank_number = $request->bank_number;
        $member->save();
        return redirect()->route('member.item', [$member->id]);
    }
}

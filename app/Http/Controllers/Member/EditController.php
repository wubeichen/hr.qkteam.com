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
        $member->birthday = $request->birthday;
        $member->department = $request->department;
        $member->major = $request->major;
        $member->qq = $request->qq;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->homepage = $request->homepage;
        $member->github = $request->github;
        $member->bank = $request->bank;
        $member->bank_number = $request->bank_number;
        $member->save();
        $log = new \App\Models\Log;
        $log->init($member, 'edit', '修改个人信息');
        $member->logs()->save($log);
        return redirect()->route('member.item', [$member->id]);
    }
}

<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create,App\Models\Member');
    }

    public function create(\App\Models\Recruitment $recruitment, R\Member\ImportRequest $request)
    {
        $member = \App\Models\Member::where(['school_number' => $recruitment->school_number])->first();
        if ($member) {
            return redirect()->route('member.item', [$member->id])->with('message-error', '该成员已存在');
        } else {
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
            $log = new \App\Models\Log;
            $log->operated_at = $request->time;
            $log->init($member, 'in', '加入工作室');
            $member->logs()->save($log);
            return redirect()->route('member.item', [$member->id])->with('message-success', '导入成功');
        }
    }
}

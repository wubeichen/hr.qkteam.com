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
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $password = '';
            for ($i=0; $i < 6; $i++) {
              $password .= $chars[mt_rand(0, strlen($chars) - 1)];
            }
            $member = new \App\Models\Member;
            $member->name = $recruitment->name;
            $member->gender = $recruitment->gender;
            $member->birthday = $recruitment->birthday;
            $member->school_number = $recruitment->school_number;
            $member->department = $recruitment->department;
            $member->major = $recruitment->major;
            $member->qq = $recruitment->qq;
            $member->phone = $recruitment->phone;
            $member->email = $recruitment->email;
            $member->homepage = $recruitment->homepage;
            $member->github = $recruitment->github;
            $member->password = bcrypt(md5($password));
            $member->active = 1;
            $member->save();
            $log = new \App\Models\Log;
            $log->operated_at = $request->time;
            $log->init($member, 'in', '加入工作室');
            $member->logs()->save($log);
            //dd($recruitment->email, $password, $recruitment->school_number, $recruitment->name);
            \Mail::to($recruitment->email)->send(new \App\Mail\JoinNotification($password, $recruitment->school_number, $recruitment->name));
            return redirect()->route('member.item', [$member->id])->with('message-success', '导入成功');
        }
    }
}

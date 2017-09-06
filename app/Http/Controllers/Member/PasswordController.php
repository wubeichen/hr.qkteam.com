<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:password,member');
    }

    public function index(\App\Models\Member $member)
    {
        return view('member.password', [
            'member'    => $member,
        ]);
    }

    public function change(\App\Models\Member $member, R\Member\PasswordRequest $request)
    {
        if (!\Hash::check($request->password_old, $member->password)) {
            return redirect()->route('member.password', [$member->id])->with('message-error', '密码错误');
        }
        $member->password = bcrypt($request->password);
        $member->save();
        $log = new \App\Models\Log;
        $log->init($member, 'password', '修改密码');
        $member->logs()->save($log);
        return redirect()->route('member.item', [$member->id])->with('message-success', '密码修改成功');
    }

    public function reset(\App\Models\Member $member)
    {
        $password = str_random(mt_rand(6, 10));
        $member->password = bcrypt(md5($password));
        $member->save();
        $log = new \App\Models\Log;
        $log -> init($member, 'password', '重设密码');
        $member->logs()->save($log);

        if (config('app.env') === 'production') {
            try {
                \Mail::to($member->email)->send(new \App\Mail\ResetPassword($member->name, $password, $member->school_number));
            } catch (e) {
                return redirect()->route('member.item', [$member->id])->with('message-warning', '密码重置成功，邮件发送失败');
            }
        }
        return redirect()->route('member.item', [$member->id])->with('message-success', '密码重置成功，请尽快到邮箱查看');
    }
}

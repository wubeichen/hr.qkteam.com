<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create,App\Models\Member');
    }

    public function index()
    {
        return view('member.new');
    }

    public function create(R\Member\CreateRequest $request)
    {
        $password = str_random(mt_rand(6, 10));
        $member = new \App\Models\Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = bcrypt(md5($password));
        $member->gender = $request->gender;
        $member->school_number = $request->school_number;
        $member->active = 1;
        $member->save();
        $log = new \App\Models\Log;
        $log->operated_at = $request->time;
        $log->init($member, 'in', '加入工作室');
        $member->logs()->save($log);
        if (config('app.env') === 'production') {
          \Mail::to($request->email)
            ->send(new \App\Mail\JoinNotification($password, $request->school_number, $request->name));
          }
        return redirect()->route('member.edit', $member->id);
    }
}

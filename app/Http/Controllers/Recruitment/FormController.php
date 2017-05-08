<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class FormController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('recruitment.form');
    }

    public function create(R\Recruitment\ApplicationRequest $request)
    {
        $recruitment = new \App\Models\Recruitment;
        $recruitment->name = $request->name;
        $recruitment->gender = $request->gender;
        $recruitment->birthday = $request->birthday;
        $recruitment->school_number = $request->school_number;
        $recruitment->department = $request->department;
        $recruitment->major = $request->major;
        $recruitment->qq = $request->qq;
        $recruitment->phone = $request->phone;
        $recruitment->email = $request->email;
        $recruitment->introduction = $request->introduction;
        $recruitment->homepage = $request->homepage;
        $recruitment->github = $request->github;
        $recruitment->expectation = $request->expectation;
        $recruitment->skill = join('; ', $request->skills) . "\n" . $request->skill;
        $recruitment->save();
        \Mail::to('freshmen@qkteam.com')
            ->send(new \App\Mail\RecruitmentNotification($recruitment));
        return redirect()->route('recruitment.apply')->with('message-success', '提交成功，请耐心等待');
    }
}

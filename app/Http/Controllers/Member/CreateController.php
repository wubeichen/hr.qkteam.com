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
        $member = new \App\Models\Member;
        $member->name = $request->name;
        $member->password = bcrypt(md5('123456'));
        $member->gender = $request->gender;
        $member->school_number = $request->school_number;
        $member->active = 1;
        $member->save();
        return redirect()->route('member.edit', $member->id);
    }
}

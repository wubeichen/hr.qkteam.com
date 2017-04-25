<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(\App\Models\Member $member)
    {
        return view('member.item', [
            'member' => $member,
        ]);
    }
}

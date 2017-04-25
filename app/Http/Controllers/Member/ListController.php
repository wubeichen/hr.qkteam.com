<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:list,App\Models\Member');
    }

    public function index()
    {
        $members = \App\Models\Member::latest()->get();
        return view('member.list', [
            'members' => $members,
        ]);
    }
}

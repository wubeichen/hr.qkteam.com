<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index(){
        $members = \App\Models\Member::all();
        return view('page.member.list', [
            'members' => $members,
        ]);
    }
}

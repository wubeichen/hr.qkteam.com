<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index (\App\Models\Member $member){
        return view('page.member.item', [
            'member' => $member,
        ]);
    }
}

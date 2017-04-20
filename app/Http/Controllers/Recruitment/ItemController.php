<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index (\App\Models\Recruitment $recruitment){
        return view('page.recruitment.item', [
            'recruitment' => $recruitment,
        ]);
    }
}

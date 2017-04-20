<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index(){
        $recruitments = \App\Models\Recruitment::all();
        return view('page.recruitment.list', [
            'recruitments' => $recruitments,
        ]);
    }
}

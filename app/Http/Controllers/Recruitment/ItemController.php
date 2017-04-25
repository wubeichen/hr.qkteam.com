<?php

namespace App\Http\Controllers\Recruitment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view,recruitment');
    }

    public function index(\App\Models\Recruitment $recruitment)
    {
        return view('recruitment.item', [
            'recruitment' => $recruitment,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class ActiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:active,member');
    }

    public function change(\App\Models\Member $member, R\Member\ActiveRequest $request)
    {
        if ($request->action === 'in' && !$member->active) {
            $member->active = 1;
            $member->save();
            $log = new \App\Models\Log;
            $log->operated_at = $request->time;
            $log->init($member, 'in', '加入工作室');
            $member->logs()->save($log);
        } elseif ($request->action === 'out' && $member->active) {
            $member->active = 0;
            $member->save();
            $log = new \App\Models\Log;
            $log->operated_at = $request->time;
            $log->init($member, 'out', '退出工作室');
            $member->logs()->save($log);
        }
        return redirect()->route('member.item', [$member->id]);
    }
}

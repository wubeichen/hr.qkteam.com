<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:role,member');
    }

    public function change(\App\Models\Member $member, R\Member\RoleRequest $request)
    {
        if ($member->id === 1) {
            return redirect()->route('member.item', [$member->id])->with('message-error', '不允许修改');
        }
        $role = \App\Models\Role::findOrFail($request->role_id);

        $log = new \App\Models\Log;
        $log->operated_at = $request->time;
        $log->init($member, 'role', '修改身份 [' . $member->role->name . '] -> [' . $role->name . ']');
        $member->logs()->save($log);

        $member->role()->associate($role);
        $member->save();
        return redirect()->route('member.item', [$member->id]);
    }
}

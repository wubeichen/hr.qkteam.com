<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function create()
    {
        $task = new \App\Models\Task;
        $task->name = $request->name;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->save();
        return redirect()->route('summary.index', $task->id);
    }
}

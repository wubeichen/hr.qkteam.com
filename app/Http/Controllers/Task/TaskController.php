<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create,App\Models\Task');
    }

    public function create(R\Task\CreateRequest $request)
    {
        $task = new \App\Models\Task;
        $task->name = $request->name;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->save();
        return redirect()->route('summary.index', $task->id);
    }
}

<?php

namespace App\Http\Controllers\Summary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    public function index()
    {
        $task = \App\Models\Task::latest()->first();
        return redirect()->route('summary.list', [$task->id]);
    }

    public function list(\App\Models\Task $task)
    {
        $summaries = $task->summaries->where('member_id', \Auth::user()->id);
        $tasks = \App\Models\Task::all();
        return view('summary.form', [
            'summaries' => $summaries,
            'tasks' => $tasks,
            'task' => $task,
            'ctask' => $task,
        ]);
    }

    public function create(\App\Models\Task $task,Request $request)
    {
        $summary = new \App\Models\Summary;
        $summary->date = $request->date;
        $summary->content = $request->content;
        $summary->member()->associate(\Auth::user());
        $task->summaries()->save($summary);
        // $summary->task()->associate($task);
        // $summary->save();
        return redirect()->route('summary.list', $task->id);
    }
}

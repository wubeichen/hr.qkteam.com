<?php

namespace App\Http\Controllers\Summary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    public function index(\App\Models\Task $task)
    {
        $summaries = $task->summaries()->latest();
        $tasks = \App\Models\Task::all();
        return view('summary.form', [
            'summaries' = $summaries,
            'tasks' = $tasks,
        ]);
    }

    public function create(\App\Models\Task $task)
    {
        $summary = new \App\Models\summary;
        $summary->date = $request->date;
        $summary->content = $request->content;
        $summary->member()->associate(\Auth::user());
        $task->summaries()->save($summary);
        // $summary->task()->associate($task);
        // $summary->save();
        return redirect()->route('summary.index', $task->id);
    }
}

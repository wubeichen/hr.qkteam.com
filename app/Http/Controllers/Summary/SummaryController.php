<?php

namespace App\Http\Controllers\Summary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class SummaryController extends Controller
{
    public function index()
    {
        $task = \App\Models\Task::latest()->first();
        return redirect()->route('summary.list', [\Auth::user()->id, $task->id]);
    }

    public function list(\App\Models\Member $member, \App\Models\Task $task)
    {
        $summaries = $task->summaries->where('member_id', $member->id);
        $tasks = \App\Models\Task::all();
        return view('summary.list', [
            'summaries' => $summaries,
            'tasks' => $tasks,
            'task' => $task,
            'ctask' => $task,
            'member' => $member,
        ]);
    }

    public function create(\App\Models\Task $task,R\Summary\CreateRequest $request)
    {
        $start = strtotime($task->start.' 00:00:00');
        $end = strtotime($task->end.' 23:59:59');
        $now = time();
        if ($now < $start || $now > $end){
            return redirect()->route('summary.list', [\Auth::user()->id, $task->id])->with('message-error', '任务未开始或已过期');
        }
        $summary = new \App\Models\Summary;
        $summary->date = $request->date;
        $summary->content = $request->content;
        $summary->member()->associate(\Auth::user());
        $task->summaries()->save($summary);
        // $summary->task()->associate($task);
        // $summary->save();
        return redirect()->route('summary.list', [\Auth::user()->id, $task->id]);
    }
}

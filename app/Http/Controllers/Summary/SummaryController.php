<?php

namespace App\Http\Controllers\Summary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests as R;

class SummaryController extends Controller
{
    public function index()
    {
        return redirect()->route('summary.list', [\Auth::user()->id, 1]);
    }

    public function list(\App\Models\Member $member, \App\Models\Task $task)
    {
        if (!\Auth::user()->isRole('director', 'leader') && \Auth::user()->id !== $member->id) {
            return redirect()->back()->with('message-error', '您没有权限查看');
        }
        $summaries = $task->summaries->where('member_id', $member->id);
        $tasks = \App\Models\Task::latest()->get();
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
        $current = time();
        $start = strtotime($task->start.' 00:00:00');
        $end = strtotime($task->end.' 23:59:59');
        if ($current < $start || $current > $end){
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

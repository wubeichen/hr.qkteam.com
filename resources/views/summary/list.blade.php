@extends('index.basic')

@section('title','总结系统')

@section('main')
<div class="columns">
    <div class="column is-three-quarters">
        <div class="title">
            <span>{{ $task->name }}</span>
        @if ($task->status == 0)
            <small class="has-text-success">[正在进行]</small>
        @endif
        </div>
        <div class="subtitle">{{ $task->start }} 至 {{ $task->end }}</div>
        @if ($task->status == 0)
        {!! Form::open(['route' => ['summary.new:action', $task->id]]) !!}
            <div class="field">
                <textarea
                    class="textarea @if ($errors->has('content')) is-danger @endif"
                    placeholder="内容" name="content"></textarea>
                @if ($errors->has('content'))
                    <p class="help is-danger">{{ $errors->first('content') }}</p>
                @endif
            </div>
            <div class="field">
                <input  class="input @if ($errors->has('date')) is-danger @endif" style="width: 200px"
                        type="text" name="date" value="{{date('Y-m-d', time())}}">
                <button type="submit" class="button is-primary">提交总结</button>
                @if ($errors->has('date'))
                    <p class="help is-danger">{{ $errors->first('date') }}</p>
                @endif
            </div>
            <hr>
        {!! Form::close() !!}
        @endif
        @foreach ($summaries as $summary)
            <div class="box">
                <div class="content">
                    <small class="is-pulled-right">提交时间：{{ $summary->created_at }}</small>
                    <strong>{{ $summary->date }}</strong><br>
                    <pre style="background: transparent; font-size: 1em;">{{$summary->content}}</pre>
                </div>
            </div>
        @endforeach
    </div>
    <div class="column is-offset-one-quater">
        <ul class="menu-list">
        @foreach ($tasks as $task)
            <li>
                <a
                    @if ($ctask->id === $task->id) class="is-active" @endif
                    href="{{route('summary.list', [$member->id, $task->id])}}">
                    <span>{{$task->name}}</span>
                @if ($task->status == 0)
                    <small>[正在进行]</small>
                @endif
                </a>
            </li>
        @endforeach
        </ul>
    @if (\Auth::user()->can('create', \App\Models\Task::class))
        <div class="box">
            <div class="content">
                <h3>添加任务</h3>
                {!! Form::open(['route' => 'task.new:action'])!!}
                <div class="field">
                    <p class="control">
                        <label>开始时间</label>
                        <input  class="input @if ($errors->has('start')) is-danger @endif"
                                type="text" name="start" value="{{ date('Y-m-d', time()) }}">
                    </p>
                    @if ($errors->has('start'))
                        <p class="help is-danger">{{ $errors->first('start') }}</p>
                    @endif
                </div>
                <div class="field">
                    <p class="control">
                        <label>结束时间</label>
                        <input  class="input @if ($errors->has('end')) is-danger @endif"
                                type="text" name="end" value="{{ date('Y-m-d', strtotime(date('Y-m-01', time()) . '+1month -1day')) }}">
                    </p>
                    @if ($errors->has('end'))
                        <p class="help is-danger">{{ $errors->first('end') }}</p>
                    @endif
                </div>
                <div class="field">
                    <p class="control">
                        <label>任务名称</label>
                        <input  class="input @if ($errors->has('name')) is-danger @endif"
                                type="text" name="name">
                    </p>
                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <button type="submit" class="button is-primary">添加任务</button>
                {!! Form::close() !!}
            </div>
        </div>
    @endif
    </div>
</div>
@endsection

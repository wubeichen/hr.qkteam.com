@extends('index.basic')

@section('title','总结系统')

@section('main')
<div class="columns">
    <div class="column is-three-quarters">
        {!! Form::open(['route' => ['summary.new:action', $task->id]]) !!}
            <div class="field">
                <strong>写总结</strong>
                <input type="date" name="date" value="{{date('Y-m-d', time())}}">
                <input class="button is-prinmary" type="submit" value="提交">
                <textarea class="textarea" placeholder="内容" name="content"></textarea>
            </div>
        {!! Form::close() !!}
        @foreach ($summaries as $summary)
            <div class="box">
                <div class="content">
                <p>
                    <strong>{{$summary->date}}</strong><br>
                    {{$summary->content}}
                </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="column is-offset-one-quater">
        {!! Form::open(['route' => 'task.new:action'])!!}
        <div class="box">
            <div class="content">
                <div>
                    <label for="start">开始时间</label>
                    <input id="start" type="date" name="start" value="{{date('Y-m-d', time())}}">
                </div>
                <div>
                    <label for="end">结束时间</label>
                    <input id="end" type="date" name="end">
                </div>
                <div>
                    <label for="name">任务名称</label>
                    <input id="name" type="text" name="name">
                </div>
                <input class="button is-prinmary" type="submit" value="提交">
            </div>
        </div>
        {!! Form::close() !!}
        <table class="table">
            <thead>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <a
                                @if ($ctask->id === $task->id) class="tag is-primary is-medium" @endif
                                href="{{route('summary.list', $task->id)}}">
                                {{$task->name}}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
@endsection

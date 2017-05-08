@extends('index.basic')

@section('title','总结系统')

@section('main')
<div class="columns">
    <div class="column is-three-quarters">
        {!! Form::open(['route' => ['summary.new:action', $task->id]]) !!}
            <div class="field">
                <strong>写总结</strong>
                <input  class="input @if ($errors->has('date')) is-danger @endif" style="width: 200px"
                        type="date" name="date" value="{{date('Y-m-d', time())}}">
                <input class="button is-prinmary" type="submit" value="提交">
                @if ($errors->has('date'))
                    <p class="help is-danger">{{ $errors->first('date') }}</p>
                @endif
                <div class="field">
                    <p class="control">
                        <textarea
                            class="textarea @if ($errors->has('content')) is-danger @endif"
                            placeholder="内容" name="content"></textarea>
                    </p>
                    @if ($errors->has('content'))
                        <p class="help is-danger">{{ $errors->first('content') }}</p>
                    @endif
                </div>
            </div>
        {!! Form::close() !!}
        @foreach ($summaries as $summary)
            <div class="box">
                <div class="content">
                <p>
                    <strong>{{$summary->date}}</strong><br>
                    <pre style="background: transparent; font-size: 1em;">{{$summary->content}}</pre>
                </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="column is-offset-one-quater">
        {!! Form::open(['route' => 'task.new:action'])!!}
        <div class="box">
            <div class="content">
                <div class="field">
                    <p class="control">
                        <label>开始时间</label>
                        <input  class="input @if ($errors->has('start')) is-danger @endif"
                                type="date" name="start" value="{{date('Y-m-d', time())}}">
                    </p>
                    @if ($errors->has('start'))
                        <p class="help is-danger">{{ $errors->first('start') }}</p>
                    @endif
                </div>
                <div class="field">
                    <p class="control">
                        <label>结束时间</label>
                        <input  class="input @if ($errors->has('end')) is-danger @endif"
                                type="date" name="end">
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
                                href="{{route('summary.list', [$member->id, $task->id])}}">
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

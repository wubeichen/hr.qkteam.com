@extends('index.basic')

@section('title', '报名管理')

@section('main')
    <div class="is-pulled-right" printable>报名时间：{{ $recruitment->created_at }}</div>
    <div class="title" printable>
        <i style="vertical-align: middle" class="fa fa-{{ $recruitment->gender ? 'mars' : 'venus' }}"></i>
        <span>{{$recruitment->name}}</span>
    </div>
    <button type="button" class="button is-success is-small is-pulled-right" onclick="printpage()">
        <span class="icon is-small">
            <i class="fa fa-print"></i>
        </span>
        <span>print</span>
    </button>

    <div class="title is-5" printable><small>生日</small> {{$recruitment->birthday}}</div>
    <div class="title is-5" printable><small>学号</small> {{$recruitment->school_number}}</div>
    <div class="title is-5" printable><small>学院</small> {{$recruitment->department}}</div>
    <div class="title is-5" printable><small>专业</small> {{$recruitment->major}}</div>
    <div class="title is-5" printable><small>邮箱</small> <a href="mailto:{{$recruitment->email}}">{{$recruitment->email}}</a></div>
    <div class="title is-5" printable><small>扣扣</small> {{$recruitment->qq}}</div>
    <div class="title is-5" printable><small>电话</small> {{$recruitment->phone}}</div>
    <div class="title is-5" printable><small>个人主页</small> <a href="{{$recruitment->homepage}}" target="_blank">{{$recruitment->homepage}}</a></div>
    <div class="title is-5" printable><small>Github</small> <a href="{{$recruitment->github}}" target="_blank">{{$recruitment->github}}</a></div>

    <div class="tile" printable>
        <div class="tile is-vertical">
            <article class="tile is-child notification">
                <div class="title">简介</div>
                <div class="content">{{$recruitment->introduction}}</div>
            </article>
            <article class="tile is-child notification">
                <div class="title">期望</div>
                <div class="content">{{$recruitment->expectation}}</div>
            </article>
            <article class="tile is-child notification">
                <div class="title">技能</div>
                <div class="content">{{$recruitment->skill}}</div>
            </article>
        </div>
    </div>
@if ($member)
    <hr>
    <a class="button" href="{{ route('member.item', [$member->id]) }}">查看该成员</a>
@else
@can ('create', \App\Models\Member::class)
    <hr>
    {!! Form::open(['route' => ['member.import', $recruitment->id]]) !!}
        <input type="text" class="input" style="width: 200px" name="time" value="{{ date('Y-m-d', time()) }}">
        <button class="button is-danger">加入工作室</button>
    {!! Form::close() !!}
@endcan
@endif
@endsection

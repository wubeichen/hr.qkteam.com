@extends('index.basic')

@section('title', '报名管理')

@section('main')
    <div class="title">
        <i style="vertical-align: middle" class="fa fa-{{ $recruitment->gender ? 'mars' : 'venus' }}"></i>
        <span>{{$recruitment->name}}</span>
    </div>

    <div class="title is-5"><small>生日</small> {{$recruitment->birthday}}</div>
    <div class="title is-5"><small>学号</small> {{$recruitment->school_number}}</div>
    <div class="title is-5"><small>邮箱</small> {{$recruitment->email}}</div>
    <div class="title is-5"><small>扣扣</small> {{$recruitment->qq}}</div>
    <div class="title is-5"><small>电话</small> {{$recruitment->phone}}</div>

    <div class="tile">
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

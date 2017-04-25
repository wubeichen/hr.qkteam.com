{{--
    member item
        $meber[...]
--}}


@extends('index.basic')

@section('title', '成员管理')

@section('main')
    <div class="title">
        <i style="vertical-align: middle" class="fa fa-{{ $member->gender ? 'mars' : 'venus' }}"></i>
        <span>{{$member->name}}</span>
    @unless ($member->active)
        <span class="has-text-danger">[退]</span>
    @endif
    </div>

    <div class="title is-5"><small>生日</small> {{$member->birthday}}</div>
    <div class="title is-5"><small>学号</small> {{$member->school_number}}</div>
    <div class="title is-5"><small>邮箱</small> {{$member->email}}</div>
    <div class="title is-5"><small>扣扣</small> {{$member->qq}}</div>
    <div class="title is-5"><small>电话</small> {{$member->phone}}</div>
    <div class="title is-5"><small>银行卡号</small> {{$member->bank_number}}</div>

    <hr>
    <a class="button is-primary" href="{{ route('member.edit', [$member->id]) }}">修改</a>
    {!! Form::open(['route' => ['member.in:action', $member->id], 'method' => 'put', 'style' => 'display: inline-block']) !!}
        <button class="button is-danger">加入工作室</button>
    {!! Form::close() !!}
    {!! Form::open(['route' => ['member.out:action', $member->id], 'method' => 'put', 'style' => 'display: inline-block']) !!}
        <button class="button is-danger">退出工作室</button>
    {!! Form::close() !!}
@endsection

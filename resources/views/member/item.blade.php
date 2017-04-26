@extends('index.basic')

@section('title', '成员管理')

@section('main')
    <div class="title">
        <i style="vertical-align: middle" class="fa fa-{{ $member->gender ? 'mars' : 'venus' }}"></i>
        <span>{{$member->name}}</span>
        <span class="has-text-info">[{{ $member->role->name }}]</span>
    @unless ($member->active)
        <span class="has-text-danger">[退]</span>
    @endif
    </div>
    <div class="title is-5"><small>生日</small> {{$member->birthday}}</div>
    <div class="title is-5"><small>学号</small> {{$member->school_number}}</div>
    <div class="title is-5"><small>邮箱</small> {{$member->email}}</div>
    <div class="title is-5"><small>扣扣</small> {{$member->qq}}</div>
    <div class="title is-5"><small>电话</small> {{$member->phone}}</div>
    <div class="title is-5"><small>{{ $member->bank }}</small> {{$member->bank_number}}</div>
@can ('update', $member)
    <hr>
    <a class="button is-primary" href="{{ route('member.edit', [$member->id]) }}">修改</a>
@endcan
@can ('password', $member)
    <a class="button is-warning" href="{{ route('member.password', [$member->id]) }}">安全设置</a>
@endcan
@can ('role', $member)
    <hr>
    {!! Form::open(['route' => ['member.role:action', $member->id], 'method' => 'put']) !!}
        <input type="text" class="input" style="width: 200px" name="time" value="{{ date('Y-m-d', time()) }}">
        <button class="button is-danger" name="role_id" value="1">负责人</button>
        <button class="button is-danger" name="role_id" value="2">组长</button>
        <button class="button is-danger" name="role_id" value="3">成员</button>
        <button class="button is-danger" name="role_id" value="4">学员</button>
    {!! Form::close() !!}
@endcan
@can ('active', $member)
    <hr>
    {!! Form::open(['route' => ['member.active:action', $member->id], 'method' => 'put']) !!}
        <input type="text" class="input" style="width: 200px" name="time" value="{{ date('Y-m-d', time()) }}">
    @if ($member->active)
        <button class="button is-danger" name="action" value="out">退出</button>
    @else
        <button class="button is-danger" name="action" value="in">加入</button>
    @endif
    {!! Form::close() !!}
@endcan
    <hr>
    <div class="title">操作记录</div>
@foreach ($logs as $log)
    <article class="media">
        <div class="media-content">
            <div class="content">
                <strong>{{ $log->action }}</strong>
                <small>@ {{ $log->operator->name }}</small>
                <small>{{ $log->operated_at }}</small>
                <div>{{ $log->description }}</div>
            </div>
        </div>
    </article>
@endforeach
@endsection

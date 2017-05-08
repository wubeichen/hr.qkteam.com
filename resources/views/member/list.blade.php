@extends('index.basic')

@section('title', '成员管理')

@section('main')
    <div align="right">
        <a class="button is-danger" href="{{ route('member.new') }}">新建成员</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>名字</th>
                    <th>学号</th>
                    <th>邮箱</th>
                    <th>扣扣</th>
                    <th>电话</th>
                    <th>身份</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($members as $member)
                <tr>
                    <td><a href="{{route('member.item', [$member->id])}}">
                        <i style="vertical-align: middle" class="fa fa-{{ $member->gender ? 'mars' : 'venus' }}"></i>
                        {{$member->name}}
                    </a></td>
                    <td>{{$member->school_number}}</td>
                    <td>{{$member->email}}</td>
                    <td>{{$member->qq}}</td>
                    <td>{{$member->phone}}</td>
                    <td>
                        <span>{{ $member->role->name }}</span>
                    @unless ($member->active)
                        <span class="has-text-danger">[退]</span>
                    @endunless
                    </td>
                    <td><a href="{{ route('summary.list', [$member->id, 1]) }}">查看总结</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

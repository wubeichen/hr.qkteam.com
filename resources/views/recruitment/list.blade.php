@extends('index.basic')

@section('title', '报名管理')

@section('main')
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>名字</th>
                    <th>学号</th>
                    <th>邮箱</th>
                    <th>扣扣</th>
                    <th>电话</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($recruitments as $recruitment)
                <tr>
                    <td><a href="{{ route('recruitment.item',[$recruitment->id])}}">
                        <i style="vertical-align: middle" class="fa fa-{{ $recruitment->gender ? 'mars' : 'venus' }}"></i>
                        {{$recruitment->name}}
                    </a></td>
                    <td>{{$recruitment->school_number}}</td>
                    <td>{{$recruitment->email}}</td>
                    <td>{{$recruitment->qq}}</td>
                    <td>{{$recruitment->phone}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

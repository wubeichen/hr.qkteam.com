{{--
    member item
        $meber[...]
--}}



@extends('index.basic')
@section('main')
    <div class="row">
        <table class="table table-hover">
            <caption>会员列表</caption>
            <thead>
                <tr>
                <th>名字</th>
                <th>性别</th>
                <th>生日</th>
                <th>学号</th>
                <th>email</th>
                <th>QQ</th>
                <th>电话号码</th>
                <th>银行卡号</th>
                <th>状态</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{$member->name}}</td>
                <td>{{$member->gender}}</td>
                <td>{{$member->birthday}}</td>
                <td>{{$member->school_number}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->qq}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->bank_number}}</td>
                <td>{{$member->active}}</td>
                </tr>
            </tbody>
        </table>
@endsection
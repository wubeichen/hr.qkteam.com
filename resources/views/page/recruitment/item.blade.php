{{--
    recruitment item
        $recruitment[...]

    route('member.import',[$recruitment->id])

--}}

@extends('index.basic')
@section('main')
    <div class="row">
        <table class="table table-hover">
            <caption>申请列表</caption>
            <thead>
                <tr>
                <th>名字</th>
                <th>性别</th>
                <th>生日</th>
                <th>学号</th>
                <th>email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{$recruitment->name}}</td>
                <td>{{$recruitment->gender}}</td>
                <td>{{$recruitment->birthday}}</td>
                <td>{{$recruitment->school_number}}</td>
                <td>{{$recruitment->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <th>QQ</th>
                <th>phone</th>
                <th>个人简介</th>
                <th>个人期望</th>
                <th>技能</th>
            </thead>
            <tbody>
                <tr>
                <td>{{$recruitment->qq}}</td>
                <td>{{$recruitment->phone}}</td>
                <td>{{$recruitment->introduction}}</td>
                <td>{{$recruitment->expectation}}</td>
                <td>{{$recruitment->skill}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
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
                <td>{{$recruiment->name}}</td>
                <td>{{$recruiment->gender}}</td>
                <td>{{$recruiment->birthday}}</td>
                <td>{{$recruiment->school_number}}</td>
                <td>{{$recruiment->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <table class="table table-hover">
            <caption>申请列表</caption>
            <thead>
                <th>QQ</th>
                <th>phone</th>
                <th>个人简介</th>
                <th>个人期望</th>
                <th>技能</th>
            </thead>
            <tbody>
                <tr>
                <td>{{$recruiment->qq}}</td>
                <td>{{$recruiment->phone}}</td>
                <td>{{$recruiment->introduction}}</td>
                <td>{{$recruiment->expectation}}</td>
                <td>{{$recruiment->skill}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
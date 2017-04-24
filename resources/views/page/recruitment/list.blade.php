{{--
    $recruitments as $recruitment [
        'name'
        'gender'
        'bithday'
        'school_number'
        'qq'
        'phone'
        'email'
        'introduction'
        'expectation'
        'skill'
    ]

--}}

@extends('index.basic')
@section('main')
    <div>
        <table class="table table-hover">
            <caption>申请列表</caption>
            <thead>
                <tr>
                <th>名字</th>
                <th>学号</th>
                <th>email</th>
                <th>QQ</th>
                <th>phone</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($recruitments as $recruitment)
                <tr>
                <td><a href="{{ route('recruitment.item',[$recruitment->id])}}">{{$recruitment->name}}</a></td>
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
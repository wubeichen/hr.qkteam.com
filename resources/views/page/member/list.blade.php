{{--
    $members as $member [
        'name'
        'gender'
        'bithday'
        'school_number'
        'qq'
        'phone'
        'email'
        'bank_number'
        'active'
    ]

--}}

@extends('index.basic')
@section('main')
    <div>
        <table class="table table-hover">
            <caption>成员列表</caption>
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
            @foreach ($members as $member)
                <tr>
                <td><a href="{{route('member.item', [$member->id])}}">{{$member->name}}</a></td>
                <td>{{$member->school_number}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->qq}}</td>
                <td>{{$member->phone}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


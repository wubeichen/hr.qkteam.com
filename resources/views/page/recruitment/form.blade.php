{{--
    recruitment form[POST]
    $recruitment = new \App\Models\Recruitment;
    $recruitment->name = $request->name;
    $recruitment->gender = $request->gender;
    $recruitment->birthday = $request->birthday;
    $recruitment->school_name = $request->school_name;
    $recruitment->qq = $request->qq;
    $recruitment->phone = $request->phone;
    $recruitment->email = $request->email;
    $recruitment->introduction = $request->introduction;
    $recruitment->expectation = $request->expectation;
    $recruitment->skill = $request->skill;
    $recruitment->save();
    action:route(index:action)
--}}

@extends('index.basic')

@section('main')
    <form action="{{ route('recruitment.index') }}" method="POST">
    {{ csrf_field() }}
        <p>姓名：</p><input type="text"name="name" class="form-control">
        <p>学号：</p><input type="text"name="school_number" class="form-control">
        <p>选择性别：</p><label><input name="gender" type="radio" value="0">男</label> 
                        <label><input name="gender" type="radio" value="1">女</label> 
        <p>生日：</p><input name=  "birthday" type="date" class="form-control">
        <p>QQ：</p><input name="qq" type="text" class="form-control">
        <p>电话号码：</p><input name="phone" type="text" class="form-control">
        <p>邮箱：</p><input name="email" type="text" class="form-control">
        <p>个人简介：</p><input name="introduction" type="text" class="form-control">
        <p>个人期望：</p><input name="expectation" type="text" class="form-control">
        <p>技能：</p><input name="skill" type="text" class="form-control">
        <div><input type="submit" class="btn btn-default" value="提交" ></div>
        
    </form>
@endsection
{{--
    create From[POST]
    $member = new \App\Models\Member;
    $member->name = $request->name;
    $member->gender = $request->gender;
    $member->birthday = $request->birthday;
    $member->school_name = $request->school_name;
    $member->qq = $request->qq;
    $member->phone = $request->phone;
    $member->email = $request->email;
    $member->bank_number = $request->bank_number;
    $member->active = $request->active;
    action:route('new:action')
--}}



@extends('index.basic')

@section('main')
    <form action="{{ route('member.new') }}" method="POST">
    {{ csrf_field() }}
        <p>姓名：</p><input type="text"name="name" class="form-control">
        <p>学号：</p><input type="text"name="school_number" class="form-control">
        <p>选择性别：</p><label><input name="gender" type="radio" value="0">男</label> 
                        <label><input name="gender" type="radio" value="1">女</label> 
        <p>生日：</p><input name="birthday" type="date" class="form-control">
        <p>QQ：</p><input name="qq" type="text" class="form-control">
        <p>电话号码：</p><input name="phone" type="text" class="form-control">
        <p>邮箱：</p><input name="email" type="text" class="form-control">
        <P>银行卡号：</P><input name="bank_number" type="text" class="form-control">
        <p>状态：</p><label><input name="active" type="radio" value="1">在工作室</label>
                    <label><input name="active" type="radio" value="0">已退休</label>             
        <div><input type="submit" class="btn btn-default" value="提交" ></div>
        
    </form>
@endsection
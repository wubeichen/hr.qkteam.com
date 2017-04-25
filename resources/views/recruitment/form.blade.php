@extends('index.basic')

@section('title', '招新报名系表')

@section('main')
    {!! Form::open(['route' => 'recruitment.apply:action']) !!}
        <div class="columns">
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="name" placeholder="姓名">
                </p></div>
            </div>
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="birthday" placeholder="生日">
                </p></div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <label class="radio"><input type="radio" name="gender" value="0">男</label>
                        <label class="radio"><input type="radio" name="gender" value="1">女</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="school_number" placeholder="学号">
                </p></div>
            </div>
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="qq" placeholder="QQ">
                </p></div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="phone" placeholder="联系电话">
                </p></div>
            </div>
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="email" placeholder="常用邮箱">
                </p></div>
            </div>
        </div>
        <div class="field"><p class="control">
            <textarea class="textarea" name="introduction" placeholder="个人简介"></textarea>
        </p></div>
        <div class="field"><p class="control">
            <textarea class="textarea" name="expectation" placeholder="个人期望"></textarea>
        </p></div>
        <div class="field"><p class="control">
            <textarea class="textarea" name="skill" placeholder="技能"></textarea>
        </p></div>
        <button type="submit" class="button is-primary">确认提交</button>
    {!! Form::close() !!}
@endsection

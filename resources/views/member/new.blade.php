@extends('index.basic')

@section('title', '成员管理')

@section('main')
    {!! Form::open(['route' => 'member.new']) !!}
        <div class="columns">
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="name" placeholder="姓名">
                </p></div>
            </div>
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="school_number" placeholder="学号">
                </p></div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <label class="radio"><input type="radio" name="gender" value="0" checked>男</label>
                        <label class="radio"><input type="radio" name="gender" value="1">女</label>
                    </p>
                </div>
            </div>
        </div>
        <input type="text" class="input" style="width: 200px" name="time" value="{{ date('Y-m-d', time()) }}">
        <button type="submit" class="button is-danger">新建</button>
    {!! Form::close() !!}
@endsection

@extends('index.basic')

@section('title', '成员管理')

@section('main')
{!! Form::open(['route' => ['member.password:action', $member->id], 'method' => 'put']) !!}
    <div class="field">
        <p class="control">
            <input
                class="input @if ($errors->has('password_old')) is-danger @endif"
                type="password"
                name="password_old"
                placeholder="原密码">
            @if ($errors->has('password_old'))
                <p class="help is-danger">{{ $errors->first('password_old') }}</p>
            @endif
        </p>
    </div>
    <div class="field">
        <p class="control">
            <input
                class="input @if ($errors->has('password')) is-danger @endif"
                type="password"
                name="password"
                placeholder="新密码">
            @if ($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </p>
    </div>
    <div class="field">
        <p class="control">
            <input
                class="input @if ($errors->has('password_confirmation')) is-danger @endif"
                type="password"
                name="password_confirmation"
                placeholder="确认密码">
            @if ($errors->has('password_confirmation'))
                <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </p>
    </div>
    <button type="submit" class="button is-primary">修改密码</button>
{!! Form::close() !!}
    <script>
    $('form')[0].onsubmit = function () {
        $('input[type=password]').each(function (idx, el) {
            if (el.value) {
                el.value = md5(el.value);
            }
        });
    }
    </script>
@endsection

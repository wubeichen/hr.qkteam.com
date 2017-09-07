@extends('index.basic')

@section('main')
    <div class="columns">
        <div class="column is-9">
            <div class="columns">
                <div class="column">
                    <div class="notification is-warning">
                        <div class="title">招新报名系统</div>
                        <a class="button is-danger" href="{{ route('recruitment.apply') }}">填写报名表，加入我们</a>
                    </div>
                </div>
                <div class="column">
                @if (\Auth::check())
                    <div class="notification is-primary">
                        <div class="title">总结系统</div>
                        <a class="button is-warning" href="{{ route('summary.index') }}">立即前往</a>
                    </div>
                @endif
                </div>
                <div class="column">
                @if (\Auth::check())
                    <div class="notification is-warning">
                        <div class="title">考核系统</div>
                        <a class="button is-danger" disabled>暂未开放</a>
                    </div>
                @endif
                </div>
            </div>
            <div class="columns">
                <div class="column">
                @can ('list', \App\Models\Recruitment::class)
                    <div class="notification is-primary">
                        <div class="title">报名管理系统</div>
                        <a class="button is-warning" href="{{ route('recruitment.list') }}">立即前往</a>
                    </div>
                @endcan
                </div>
                <div class="column">
                @can ('list', \App\Models\Member::class)
                    <div class="notification is-danger">
                        <div class="title">成员管理系统</div>
                        <a class="button is-warning" href="{{ route('member.list') }}">立即前往</a>
                    </div>
                @endcan
                </div>
            </div>
        </div>
        <div class="column is-3">
        @if (\Auth::check())
            <div class="notification is-success">
                <div class="title">{{ \Auth::user()->name }}</div>
                <div class="subtitle">已登录</div>
                <a class="button" href="{{ route('member.item', \Auth::user()->id) }}">个人信息</a>
                <a class="button" href="{{ route('auth.signout:action') }}">个人信息</a>
            </div>
        @else
            <div class="notification is-default">
                <div class="title">成员入口</div>
                {!! Form::open(['route' => 'auth.signin:action']) !!}
                    <div class="field"><p class="control">
                        <input class="input" type="text" name="school_number" placeholder="用户">
                    </p></div>
                    <div class="field"><p class="control">
                        <input class="input" type="password" name="password" placeholder="密码">
                    </p></div>
                    <button type="submit" class="button is-primary">登录</button>
                {!! Form::close() !!}
            </div>
        @endif
            <script>
            $('form')[0].onsubmit = function () {
                var el = $('input[type=password]')[0];
                el.value = md5(el.value);
            }
            </script>
        </div>
    </div>
@endsection

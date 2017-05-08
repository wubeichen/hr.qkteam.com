@extends('index.basic')

@section('title', '成员管理')

@section('main')
    <div class="title">
        <i style="vertical-align: middle" class="fa fa-{{ $member->gender ? 'mars' : 'venus' }}"></i>
        <span>{{$member->name}}</span>
    </div>
    <div class="subtitle">{{ $member->school_number }}</div>
    {!! Form::open(['route' => ['member.edit:action', $member->id], 'method' => 'put']) !!}
        <div class="columns">
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('birthday')) is-danger @endif"
                            type="text"
                            name="birthday"
                            placeholder="生日"
                            value="{{ old('birthday', $member->birthday) }}">
                    </p>
                @if ($errors->has('birthday'))
                    <p class="help is-danger">{{ $errors->first('birthday') }}</p>
                @endif
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('department')) is-danger @endif"
                            type="text"
                            name="department"
                            placeholder="学院"
                            value="{{ old('department', $member->department) }}">
                    </p>
                @if ($errors->has('department'))
                    <p class="help is-danger">{{ $errors->first('department') }}</p>
                @endif
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('major')) is-danger @endif"
                            type="text"
                            name="major"
                            placeholder="专业"
                            value="{{ old('major', $member->major) }}">
                    </p>
                @if ($errors->has('major'))
                    <p class="help is-danger">{{ $errors->first('major') }}</p>
                @endif
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('phone')) is-danger @endif"
                            type="text"
                            name="phone"
                            placeholder="联系电话"
                            value="{{ old('phone', $member->phone) }}">
                    </p>
                @if ($errors->has('phone'))
                    <p class="help is-danger">{{ $errors->first('phone') }}</p>
                @endif
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('email')) is-danger @endif"
                            type="text"
                            name="email"
                            placeholder="常用邮箱"
                            value="{{ old('email', $member->email) }}">
                    </p>
                @if ($errors->has('email'))
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                @endif
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('qq')) is-danger @endif"
                            type="text"
                            name="qq"
                            placeholder="扣扣"
                            value="{{ old('qq', $member->qq) }}">
                    </p>
                @if ($errors->has('qq'))
                    <p class="help is-danger">{{ $errors->first('qq') }}</p>
                @endif
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('bank')) is-danger @endif"
                            type="text"
                            name="bank"
                            placeholder="学校银行卡开户行"
                            value="{{ old('bank', $member->bank) }}">
                    </p>
                @if ($errors->has('bank'))
                    <p class="help is-danger">{{ $errors->first('bank') }}</p>
                @endif
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <p class="control">
                        <input
                            class="input @if ($errors->has('bank_number')) is-danger @endif"
                            type="text"
                            name="bank_number"
                            placeholder="卡号"
                            value="{{ old('bank_number', $member->bank_number) }}">
                    </p>
                @if ($errors->has('bank_number'))
                    <p class="help is-danger">{{ $errors->first('bank_number') }}</p>
                @endif
                </div>
            </div>
        </div>
        <button type="submit" class="button is-primary">保存</button>
        <a class="button" href="{{ route('member.item', [$member->id]) }}">返回</a>
    {!! Form::close() !!}
@endsection

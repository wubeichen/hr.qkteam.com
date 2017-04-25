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
                <div class="field"><p class="control">
                    <input class="input" type="text" name="birthday" placeholder="生日">
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
        <div class="columns">
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="bank" placeholder="学校银行卡开户行">
                </p></div>
            </div>
            <div class="column">
                <div class="field"><p class="control">
                    <input class="input" type="text" name="bank_number" placeholder="卡号">
                </p></div>
            </div>
        </div>
        <button type="submit" class="button is-primary">保存</button>
    {!! Form::close() !!}
@endsection

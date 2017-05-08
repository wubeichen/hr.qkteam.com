@extends('index.basic')

@section('title', '恭喜你，报名成功')

@section('main')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title" align="center">恭喜你，报名成功</h1>
                <h2 class="subtitle" align="center">
                    <small>请加入工作室大群，并在加群验证注明</small>
                    <span class="has-text-danger">招新</span>
                    <small>及</small>
                    <span class="has-text-danger">自己姓名</span>
                </h2>
            </div>
        </div>
    </section>
    <div class="container" align="center">
        <img src="/images/qrcode.jpg" style="max-width: 90%; width: 400px;">
    </div>
@endsection

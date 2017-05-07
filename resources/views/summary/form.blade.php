@extends('index.basic')

@section('title','总结系统')

@section('main')
<div class="columns">
    <div class="column is-three-quarters">
                        <form action = route('') method = POST>
                            <div class="field">
                                <strong>写总结</strong>
                                <input type="date" name="date">
                                <input class="button is-prinmary" type="submit" value="提交">
                                <textarea class="textarea" placeholder="内容"></textarea>
                            </div>
                        </form>
                            {{--@foreach ($tasks as $task) 
                        <div class="box">
                            <div class="content">
                            <p>
                                <strong>{{$task.date}}</strong><br>
                                {{$task.content}}
                            </p>
                            </div>
                        </div>
                            @endforeach--}}
                                    <div>&nbsp</div>
                                    <div class="box">
                                        <div class="content">
                                            <p>
                                                <strong>五月一号</strong><br>
                                                今天吃了火锅，很开心
                                            </p>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="content">
                                            <p>
                                                <strong>五月二号</strong><br>
                                                昨天吃了火锅，很开心
                                            </p>
                                        </div>
                                    </div>
    </div>
    <div class="column is-offset-one-quater">
        <table class="table">
            <thead>
                <tr>
                    <td><a href =#>五月，正在进行</a></td>
                    {{--<a href=#>{{$task.id}}</a>--}}
                </tr>
                <tr>
                    <td><a href =#>四月</a></td>
                    {{--<a href=#>{{$task.id}}</a>--}}
                </tr>
            </thead>
        </table>
    </div>

</div>


@endsection



@extends('head')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="media">
            <div class="media-left">
                <a href="">
                    {{--占位符--}}
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                        <a class="btn btn-lg btn-success pull-right" href="/articles/{{$article->id}}/edit" role="button">修改贴子</a>
                </h4>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9" role="main" id="post">
            <div class="blog-post">
                {{--占位符--}}
            </div>
            <hr>
            @foreach($article->comments as $comment)
                <div class="media">
                    <div class="media-left">
                        <a href="">
                            <img class="media-object img-circle" alt="64x64" src="{{$comment->user->avatar}}" style="width:64px; height:64px;" >
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}</h4>
                        {{$comment->body}}
                    </div>
                </div>
            @endforeach

            <div class="media" v-for="comment in comments">
                <div class="media-left">
                    <a href="">
                        <img class="media-object img-circle" alt="64x64" src="@{{comment.avatar}}" style="width:64px; height:64px;" >
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">@{{comment.name}}</h4>
                    @{{comment.body}}
                </div>
            </div>

            <hr>
        </div>
    </div>
</div>
@stop
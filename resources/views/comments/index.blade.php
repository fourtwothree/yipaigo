@extends('head')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>这里是文章评论列表
                <a class="btn btn-lg btn-success pull-right" href="/articles/create" role="button">发布新的贴子</a>
            </h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">

                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{$comment->body}}
                                <div class="media-conversation-meta">

                        该条评论对应的文章标题：<a href="/articles/show/{{$comment->article->id}}">{{$comment->article->title}}</a>

                                </div>
                            </h4>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
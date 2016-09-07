@extends('head')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>欢迎来到益拍go
                <a class="btn btn-lg btn-success pull-right" href="/articles/create" role="button">发布新的贴子</a>
            </h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($articles as $article)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">

                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="/articles/show/{{$article->id}}">{{$article->title}}</a>
                                <div class="media-conversation-meta">
                  <span class="media-conversation-replies">
                    {{count($article->comments)}}
                    回复
                  </span>
                                </div>
                            </h4>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
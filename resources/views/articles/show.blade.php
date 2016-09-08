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
                <h4 class="media-heading">{{$article->title}}
                    <a class="btn btn-lg btn-danger pull-right" href="/articles/delete/{{$article->id}}" role="button">删除贴子</a>
                    <a class="btn btn-lg btn-success pull-right" href="/articles/edit/{{$article->id}}" role="button">修改贴子</a>
                </h4>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9" role="main" id="post">
            <div class="blog-post">
                {{$article->body}}
            </div>
            <hr>
            @foreach($article->comments as $comment)
                <div class="media">
                    <div class="media-left">
                        <a href="">
                            {{--占位符--}}
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"></h4>
                        {{$comment->body}}
                        <a class="btn btn-sm btn-danger pull-right" href="/comments/delete/{{$comment->id}}" role="button">删除评论</a>
                    </div>
                </div>

                <hr>
            @endforeach

            <form method="POST" action="/comments" accept-charset="UTF-8">
                <input name="article_id" type="hidden" value="{{$article->id}}">
                <div class="form-group">
                    <textarea class="form-control" name="body" cols="50" rows="10"></textarea>
                </div>
                <div>
                    <input class="btn btn-success pull-right" type="submit" value="发表评论">
                </div>
            </form>


        </div>
    </div>
</div>
@stop
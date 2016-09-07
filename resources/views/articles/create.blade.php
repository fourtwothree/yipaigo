@extends('head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" role="main">
                <form method="POST" action="/articles" accept-charset="UTF-8">
                    <div class="form-group">
                        <label for="title">标题:</label>
                        <input class="form-control" name="title" type="text" id="title">
                    </div>

                    <div class="form-group">
                        <label for="myEditor">内容:</label>
                        <textarea class="form-control" id="myEditor" name="body" cols="50" rows="10"></textarea>
                    </div>

                    <div>
                        <input class="btn btn-primary pull-right" type="submit" value="发表贴子">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
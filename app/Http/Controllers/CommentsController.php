<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
//        dd($comments);
        /*$comment = Comment::find(2);
        dd($comment);
        $article = $comment->article;
        dd($article);*/

        /*foreach($comments as $k=>$comment)
        {
            $data[$k]['article'] = $comment->article;
            $data[$k]['comment'] = $comment;
        }

        dd($data);*/

        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
//        dd($input);
        $validator = Validator::make($input, [
            'body' => 'required',
        ]);

        if($validator->fails())
        {
            return $validator->errors()->all();
        }

        Comment::create($input);
        return redirect('/articles');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        if($comment->delete()){
           return redirect('/articles');
        }else{
            echo '删除评论失败！';
        }
    }
}

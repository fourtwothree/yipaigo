<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    /**
     * 论评列表展示页
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
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

    /**
     * 发表评论
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
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
//        return redirect('/articles');
        return redirect()->back();
    }

    /**
     * 删除指定评论
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
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

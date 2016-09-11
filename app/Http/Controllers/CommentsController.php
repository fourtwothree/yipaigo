<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Comment;
use App\Http\Requests\StoreCommentsRequest;

class CommentsController extends Controller
{
    /**
     * 论评列表展示页
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        $comment = new Comment();
        $comments = $comment->getLatestComments();
        return view('comments.index', compact('comments'));
    }

    /**
     * 发表评论
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store(StoreCommentsRequest $request)
    {
        $input = $request->all();
        $comment = new Comment();
        $comment->createComment($input);
        return redirect()->back();
    }

    /**
     * 删除指定评论
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function delete($id)
    {
        $comment = new Comment();

        if($comment->deleteComment($id)){
           return redirect()->back();
        }else{
            echo '删除评论失败！';
        }
    }
}

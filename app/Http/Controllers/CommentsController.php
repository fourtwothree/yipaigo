<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreCommentsRequest;

use App\Contracts\CommentContract;

class CommentsController extends Controller
{
    protected $comment;

    /**
     * 依赖注入接口
     * CommentsController constructor.
     * @param CommentContract $comment
     */
    public function __construct(CommentContract $comment)
    {
        $this->comment = $comment;
    }

    /**
     * 论评列表展示页
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        $comments = $this->comment->getLatestComments();
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
        $this->comment->createComment($input);
        return redirect()->back();
    }

    /**
     * 删除指定评论
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function delete($id)
    {
        if($this->comment->deleteComment($id)){
            return redirect()->back();
        }else{
            echo '删除评论失败！';
        }
    }
}

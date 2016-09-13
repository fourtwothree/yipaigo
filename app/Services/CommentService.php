<?php

namespace App\Services;

use App\Contracts\CommentContract;
use App\Dao\CommentDao;

class CommentService implements CommentContract
{
    /**
     * 按时间降序获取评论列表
     * @return mixed
     */
    public function getLatestComments()
    {
        $dao = new CommentDao();
        return $dao->getLatestList();
    }

    /**
     * 发表评论
     * @param $input
     * @return mixed
     */
    public function createComment($input)
    {
        $dao = new CommentDao();
        return $dao->insert($input);
    }

    /**
     * 删除评论
     * @param $id
     * @return bool
     */
    public function deleteComment($id)
    {
        $dao = new CommentDao();
        return $dao->delete($id);
    }
}


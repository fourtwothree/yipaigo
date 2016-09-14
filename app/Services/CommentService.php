<?php

namespace App\Services;

use App\Contracts\CommentContract;
use App\Dao\CommentDao;

class CommentService implements CommentContract
{
    /**
     * 按时间降序获取评论列表
     * @param null
     * @return object
     */
    public function getLatestComments()
    {
        $dao = new CommentDao();
        return $dao->getLatestList();
    }

    /**
     * 发表评论并插入数据库
     * @param array $input
     * @return object
     */
    public function createComment($input)
    {
        $dao = new CommentDao();
        return $dao->insert($input);
    }

    /**
     * 根据id删除指定评论
     * @param int $id
     * @return bool
     */
    public function deleteComment($id)
    {
        $dao = new CommentDao();
        return $dao->delete($id);
    }
}


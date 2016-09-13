<?php

namespace App\Contracts;

interface CommentContract
{
    /**
     * 按时间降序获取评论列表
     * @return mixed
     */
    public function getLatestComments();

    /**
     * 发表评论
     * @param $input
     * @return mixed
     */
    public function createComment($input);

    /**
     * 删除评论
     * @param $id
     * @return bool
     */
    public function deleteComment($id);
}

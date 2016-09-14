<?php

namespace App\Contracts;

interface CommentContract
{
    /**
     * 按时间降序获取评论列表
     * @param null
     * @return object
     */
    public function getLatestComments();

    /**
     * 发表评论并插入数据库
     * @param array $input
     * @return object
     */
    public function createComment($input);

    /**
     * 根据id删除指定评论
     * @param $id
     * @return bool
     */
    public function deleteComment($id);
}

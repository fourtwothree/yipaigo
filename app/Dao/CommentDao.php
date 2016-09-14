<?php

namespace App\Dao;

use App\Models\Comment;

class CommentDao
{
    /**
     * 按时间降序得到所有记录
     * @param null
     * @return object
     */
    public function getLatestList()
    {
        $dao = Comment::latest()->get();
        return $dao;
    }

    /**
     * 插入记录
     * @param  array $input
     * @return object
     */
    public function insert($input)
    {
        $dao = Comment::create($input);
        return $dao;
    }

    /**
     * 删除记录
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $dao = Comment::where('id', $id)->first();
        return $dao->delete();
    }
}


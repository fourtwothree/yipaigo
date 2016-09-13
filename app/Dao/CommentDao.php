<?php

namespace App\Dao;

use App\Models\Comment;

class CommentDao
{
    /**
     * 按时间降序得到所有记录
     * @return mixed
     */
    public function getLatestList()
    {
        $dao = Comment::latest()->get();
        return $dao;
    }

    /**
     * 插入记录
     * @param $input
     * @return static
     */
    public function insert($input)
    {
        $dao = Comment::create($input);
        return $dao;
    }

    /**
     * 删除记录
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $dao = Comment::where('id', $id)->first();

        if($dao->delete()){
            return true;
        }else{
            return false;
        }
    }
}


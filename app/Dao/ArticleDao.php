<?php

namespace App\Dao;

use App\Models\Article;

class ArticleDao
{
    /**
     * 按时间降序得到所有记录
     * @return object
     */
    public function getLatestList()
    {
        return Article::latest()->get();
    }

    /**
     * 插入记录
     * @param $input
     * @return object
     */
    public function insert($input)
    {
        return Article::create($input);
    }

    /**
     * 根据id得到指定记录
     * @param $id
     * @return object
     */
    public function getOneById($id)
    {
        return Article::where('id', $id)->first();
    }

    /**
     * 根据id更新指定记录
     * @param int $id
     * @param array $input
     * @return bool
     */
    public function update($id, $input)
    {
        $dao = $this->getOneById($id);
        return $dao->update($input);
    }

    /**
     * 根据id删除指定记录
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $dao = $this->getOneById($id);
        return $dao->delete();
    }
}
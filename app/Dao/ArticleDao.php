<?php

namespace App\Dao;

use App\Models\Article;

class ArticleDao
{
    /**
     * 按时间降序得到所有记录
     * @return mixed
     */
    public function getLatestList()
    {
        $dao = Article::latest()->get();
        return $dao;
    }

    /**
     * 插入记录
     * @param $input
     * @return static
     */
    public function insert($input)
    {
        $dao = Article::create($input);
        return $dao;
    }

    /**
     * 根据id得到指定记录
     * @param $id
     * @return mixed
     */
    public function getOneById($id)
    {
        $dao = Article::where('id', $id)->first();
        return $dao;
    }

    /**
     * 更新记录
     * @param $id
     * @param $input
     * @return bool
     */
    public function update($id, $input)
    {
        $dao = $this->getOneById($id);

        if($dao->update($input)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 删除记录
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $dao = $this->getOneById($id);

        if($dao->delete()){
            return true;
        }else{
            return false;
        }
    }
}
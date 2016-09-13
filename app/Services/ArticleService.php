<?php

namespace App\Services;

use App\Contracts\ArticleContract;
use App\Dao\ArticleDao;

class ArticleService implements ArticleContract
{
    /**
     * 按时间降序获取文章列表
     * @return mixed
     */
    public function getLatestArticles()
    {
        $dao = new ArticleDao();
        $articles = $dao->getLatestList();
        return $articles;
    }

    /**
     * 发表文章
     * @param $input
     * @return static
     */
    public function createArticle($input)
    {
        $dao = new ArticleDao();
        $article = $dao->insert($input);
        return $article;
    }

    /**
     * 根据id获取指定文章
     * @param $id
     */
    public function getArticleById($id)
    {
        $dao = new ArticleDao();
        $article = $dao->getOneById($id);
        return $article;
    }

    /**
     * 更新文章
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateArticle($id, $input)
    {
        $dao = new ArticleDao();
        return $dao->update($id, $input);
    }

    /**
     * 删除文章
     * @param $id
     * @return bool
     */
    public function deleteArticle($id)
    {
        $dao = new ArticleDao();
        return $dao->delete($id);
    }

    /*public function test()
    {
        dd('test');
    }*/
}
<?php

namespace App\Models;

use App\Dao\Dao;

class Article extends Dao
{
    protected $fillable = ['title', 'body'];

    /**
     * 获取文章的所有评论
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * 按时间降序获取文章列表
     * @return mixed
     */
    public function getLatestArticles()
    {
        $articles = $this->getLatestList();
        return $articles;
    }

    /**
     * 发表文章
     * @param $input
     * @return static
     */
    public function createArticle($input)
    {
        $article = $this->insert($input);
        return $article;
    }

    /**
     * 根据id获取指定文章
     * @param $id
     */
    public function getArticleById($id)
    {
        $article = $this->getOneById($id);
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
        $article = $this->getArticleById($id);

        if($article->update($input)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteArticle($id)
    {
        $article = $this->getArticleById($id);

        if($article->delete()){
            return true;
        }else{
            return false;
        }
    }
}

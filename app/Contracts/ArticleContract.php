<?php

namespace App\Contracts;

interface ArticleContract
{
    /**
     * 按时间降序获取文章列表
     * @return mixed
     */
    public function getLatestArticles();

    /**
     * 发表文章
     * @param $input
     * @return static
     */
    public function createArticle($input);

    /**
     * 根据id获取指定文章
     * @param $id
     */
    public function getArticleById($id);

    /**
     * 更新文章
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateArticle($id, $input);

    /**
     * 删除文章
     * @param $id
     * @return bool
     */
    public function deleteArticle($id);
}
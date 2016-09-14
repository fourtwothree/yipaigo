<?php

namespace App\Contracts;

interface ArticleContract
{
    /**
     * 按时间降序获取文章列表
     * @param null
     * @return object
     */
    public function getLatestArticles();

    /**
     * 发表文章并插入数据库
     * @param array $input
     * @return object
     */
    public function createArticle($input);

    /**
     * 根据id获取指定文章
     * @param int $id
     * @return object
     */
    public function getArticleById($id);

    /**
     * 根据id更新指定文章
     * @param int $id
     * @param array $input
     * @return bool
     */
    public function updateArticle($id, $input);

    /**
     * 根据id删除指定文章
     * @param int $id
     * @return bool
     */
    public function deleteArticle($id);
}
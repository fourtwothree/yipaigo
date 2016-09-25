<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Services\ArticleService;


class ArticleServiceTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * 测试方法 按时间降序获取文章列表
     *
     * @return void
     */
    public function testGetLatestArticles()
    {
        factory(App\Models\Article::class, 10)->create();

        $articleService = new ArticleService();
        $articles = $articleService->getLatestArticles();

        $this->assertEquals(10, count($articles));
    }

    /**
     * 测试方法 发表文章
     *
     * @return void
     */
    public function testCreateArticle()
    {
        $articleService = new ArticleService();
        $articleService->createArticle([
            'title' => 'phpunit title',
            'body' => 'phpunit body',
        ]);

        $this->seeInDatabase('articles', ['id'=>1, 'title'=>'phpunit title', 'body'=>'phpunit body']);
    }

    /**
     * 测试方法 根据id获取指定文章
     *
     * @return void
     */
    public function testGetArticleById()
    {
        $articleService = new ArticleService();
        $articleService->createArticle([
            'title' => 'phpunit title',
            'body' => 'phpunit body',
        ]);

        $article = $articleService->getArticleById(1);

        $this->assertEquals($article->title, 'phpunit title');
        $this->assertEquals($article->body, 'phpunit body');
    }

    /**
     * 测试方法 删除文章
     *
     * @return void
     */
    public function testDeleteArticle()
    {
        $articleService = new ArticleService();
        $articleService->createArticle([
            'title' => 'phpunit title',
            'body' => 'phpunit body',
        ]);

        $articleService->deleteArticle(1);

        $this->notSeeInDatabase('article', ['id'=>1, 'title'=>'phpunit title', 'body'=>'phpunit body']);
    }
}

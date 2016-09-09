<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $this->assertTrue(true);
        $this->visit('/articles')
            ->see('益拍Go')
            ->dontSee('众筹');
    }

    /**
     * 测试文章列表页发布贴子跳转是否正常
     */
    public function testClick()
    {
        $this->visit('/articles')
            ->click('发布新的贴子')
            ->seePageIs('/articles/create');
    }

    /**
     * 测试文章创建表单
     */
    public function testArticleCreate(){
        $this->visit('/articles/create')
            ->type('test title 7', 'body') 
            ->press('发表贴子')
            ->seePageIs('/articles');
    }

}

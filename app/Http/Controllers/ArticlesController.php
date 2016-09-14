<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreArticlesRequest;

use App\Contracts\ArticleContract;

class ArticlesController extends Controller
{
    protected $article;

    /**
     * 依赖注入接口
     * ArticlesController constructor.
     * @param ArticleContract $article
     */
    public function __construct(ArticleContract $article){
        $this->article = $article;
    }

    /**
     * 文章列表页
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        $articles = $this->article->getLatestArticles();
        return view('articles.index', compact('articles'));
    }

    /**
     * 文章创建
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * 文章提交
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store(StoreArticlesRequest $request)
    {
        $input = $request->all();
        $this->article->createArticle($input);
        return redirect('/articles');
    }

    /**
     * 指定文章展示页
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function show($id)
    {
        $article = $this->article->getArticleById($id);
        return view('articles.show', compact('article'));
    }

    /**
     * 指定文章编辑页
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function edit($id)
    {
        $article = $this->article->getArticleById($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * 更新指定文章
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if($this->article->updateArticle($id, $input)){
            return redirect('/articles/show/'.$id);
        }else{
            echo '更新文章失败！';
        }
    }

    /**
     * 删除指定文章
     * @param $id
     */
    public function delete($id)
    {
        if($this->article->deleteArticle($id)){
            return redirect('/articles');
        }else{
            echo '删除文章失败！';
        }
    }
}

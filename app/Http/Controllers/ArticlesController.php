<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    /**
     * 文章列表页
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        $articles = Article::latest()->get();
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
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required|min:3',
            'body' =>'required',
        ]);

        if($validator->fails())
        {
            return $validator->errors()->all();
        }

        Article::create($input);
        return redirect('/articles');
    }

    /**
     * 指定文章展示页
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();
//        dd($article);
        return view('articles.show', compact('article'));
    }

    /**
     * 指定文章编辑页
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function edit($id)
    {
        $article = Article::where('id', $id)->first();
//        dd($article);
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
//        dd($input);
        $article = Article::where('id', '=', $id)->first();
//        dd($article);

        if($article->update($input)){
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
        $article = Article::find($id);

//        dd(count($article->comments));

        //1.文章下有评论不能删除
        /*if(count($article->comments)){
            exit('请先删除该文章下的所有评论！');
        }*/

        //2.未定义外键onDelete('cascade')，文章删除，文章下所有评论不会一并删除
        //3.已定义外键onDelete('cascade')，文章删除，文章下所有评论一并删除
        if($article->delete()){
            echo '删除文章成功！';
        }else{
            echo '删除文章失败！';
        }
    }
}

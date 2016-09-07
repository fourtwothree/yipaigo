<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * 发表文章
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     *
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

    public function show($id)
    {
        $article = Article::where('id', $id)->first();
//        dd($article);
        return view('articles.show', compact('article'));
    }
}
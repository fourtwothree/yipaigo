<?php
Route::get('/', function () {
    return view('welcome');
});
/*Route::group(['middleware' => ['web']], function () {
    //
});*/

//Route::resource('articles', 'ArticlesController');


Route::get('/articles','ArticlesController@index');
Route::post('/articles','ArticlesController@store');
Route::get('/articles/create','ArticlesController@create');
Route::get('/articles/show/{id}','ArticlesController@show');
Route::get('/articles/edit/{id}','ArticlesController@edit');
Route::post('/articles/update/{id}','ArticlesController@update');
Route::get('/articles/delete/{id}','ArticlesController@delete');


Route::get('/comments','CommentsController@index');
Route::post('/comments','CommentsController@store');
Route::get('/comments/delete/{id}','CommentsController@delete');

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\ArticleService;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //使用bind绑定实例到接口以便依赖注入
        $this->app->bind('App\Contracts\ArticleContract',function(){
            return new ArticleService();
        });
    }
}

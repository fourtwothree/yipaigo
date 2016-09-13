<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body'];

    /**
     * 获取文章的所有评论
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['article_id', 'body'];

    /**
     * 获取评论对应的文章
     */
    public function article()
    {
        return $this->belongsTo('App\article');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Dao\Dao;

class Comment extends Dao
{
    protected $fillable = ['article_id', 'body'];

    /**
     * 获取评论对应的文章
     */
    public function article()
    {
        return $this->belongsTo('App\Models\article');
    }

    public function getLatestComments()
    {
        $comments = $this->getLatestList();
        return $comments;
    }

    public function createComment($input)
    {
        $comment = $this->insert($input);
        return $comment;
    }

    public function deleteComment($id)
    {
        $comment = $this->getOneById($id);

        if($comment->delete()){
            return true;
        }else{
            return false;
        }
    }
}

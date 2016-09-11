<?php

namespace App\Dao;

use Illuminate\Database\Eloquent\Model;

class Dao extends Model
{
    /**
     * 按时间降序得到所有记录
     * @return mixed
     */
    public function getLatestList()
    {
        $dao = Self::latest()->get();
        return $dao;
    }

    /**
     * 插入记录
     * @param $input
     * @return static
     */
    public function insert($input)
    {
        $dao = Self::create($input);
        return $dao;
    }

    /**
     * 根据id得到指定记录
     * @param $id
     * @return mixed
     */
    public function getOneById($id)
    {
        $dao = Self::where('id', $id)->first();
        return $dao;
    }
}
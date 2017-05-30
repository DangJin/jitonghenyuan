<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/29
 * Time: 上午10:18
 */

namespace Home\Model;

use Think\Model;

class ArticleModel extends Model
{
    /**
     * @param     $id 分类id
     * @param int $page 页数
     *
     * @return mixed|string 返回数据
     */
    public function getNews($id = 15, $page = 1)
    {

        $result = $this->where('cate_id = %d and status=1', $id)->page($page, 8)->select();

        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }

    public function getProducts($id, $page = 1)
    {

        $result = $this->where('cate_id = %d and status=1', $id)->page($page, 8)->select();

        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }

    public function getExamples($id = 3, $page = 1)
    {
        if (3 == $id) {
            $result = $this->alias('a')
                ->join('category c on a.cate_id = c.id', 'RIGHT')
                ->where('pid=3 and a.status=1')
                ->page($page, 8)
                ->field('a.id,a.image,a.title')
                ->select();
        } else {
            $result = $this->where('cate_id = %d and status=1', $id)->page($page, 8)->select();
        }
        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }

    public function getOneById($id)
    {
        $result = $this->where("id=%d", $id)->find();
        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }

    public function getOneByCid($id)
    {
        $result = $this->where("cate_id=%d", $id)->find();
        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }


    public function getChildren($id, $num)
    {
        $result = $this->alias('a')
            ->join('category c on a.cate_id = c.id', 'RIGHT')
            ->where('pid=%d and a.status=1', $id)
            ->limit($num)
            ->field('a.id,a.image,a.title,a.describe')
            ->select();
        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }

    public function getPro()
    {
        $result = $this->alias('a')
            ->join('category c on a.cate_id = c.id')
            ->where('pid=17 or pid=18 or pid = 19 or pid = 20 and a.status=1')
            ->field('a.id,a.image,a.title,a.describe')
            ->order('id desc')
            ->limit(8)
            ->select();
        if ($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }
}
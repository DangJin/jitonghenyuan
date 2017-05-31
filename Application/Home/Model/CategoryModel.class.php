<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/29
 * Time: 下午4:47
 */

namespace Home\Model;


use Think\Model;

class CategoryModel extends Model
{
    public function getList($id)
    {
        $result = $this->where('pid=%d', $id)->select();
        if($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }

    public function getTree($id)
    {
        $result = $this->where('pid=%d', $id)->select();
        if (!$result) {
            return ;
        } else {
            for ($i = 0; $i < count($result); $i++) {
                $result[$i]['child'] = $this->getTree($result[$i]['id']);
            }
        }
        return $result;
    }

    public function getOneById($id)
    {
        $result = $this->where('id=%d', $id)->select();
        if($result) {
            return $result;
        } else {
            return '没有数据';
        }
    }
}
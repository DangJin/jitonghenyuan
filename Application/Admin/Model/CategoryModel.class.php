<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/29
 * Time: 10:31
 */

namespace Admin\Model;


use const true;
use function var_dump;

class CategoryModel extends BaseModel
{
    public function allCategory($field = '*')
    {
        return $this->field($field)->select();
    }

    public function tree($cate, $pid = 0, $level = 0,$html='--')
    {
        static $tree = [];
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                //说明找到，保存
                $v['html'] = str_repeat($html,$level);
                $v['level']=$level;
                $tree[]     = $v;
                //继续找
                $this->tree($cate, $v['id'], $level + 1);
            }
        }
        return $tree;
    }


}

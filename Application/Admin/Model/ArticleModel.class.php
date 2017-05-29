<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 18:10
 */

namespace Admin\Model;


use Think\Model;
use function var_dump;

class ArticleModel extends Model
{

    protected $tableName = 'Article';

    public function ArticleList($keywords, $page, $limit)
    {
        $map = [];
        if ($keywords) {
            $map['title|name'] = ['like', '%' . $keywords . '%'];
        }

        $list = $this
            ->where($map)
            ->alias('article')
            ->join('__CATEGORY__ ON __ARTICLE__.cate_id=__CATEGORY__.id', 'LEFT');

        // 若有分页
        if ($page && $limit) {
            $list = $list->page($page, $limit);
        }

        $list = $list->field('article.*,category.pid,category.name')->select();
        $data = $list;
        return $data;
    }

}
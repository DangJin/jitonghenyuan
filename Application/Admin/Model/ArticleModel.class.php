<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 18:10
 */

namespace Admin\Model;


use const false;
use Think\Exception;
use Think\Model;
use function var_dump;

class ArticleModel extends BaseModel
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
        $data['data'] = $list;
        $data['count']=$this->count();
        return $data;
    }

    public function GetArticleListByCat($cate_id, $page, $limit)
    {
        try {
            $data = $this->where(['cate_id' => $cate_id])->page($page, $limit)->select();
            return $data;
        } catch (\Exception $e) {
            $this->getDbError();
            return false;
        }
    }

}
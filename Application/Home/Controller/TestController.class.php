<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午10:46
 */

namespace Home\Controller;


use Home\Model\ArticleModel;
use Home\Model\CategoryModel;

class TestController
{
    public function index()
    {

        $result = D('Category')->getTree(2);
        dump($result);
    }
}
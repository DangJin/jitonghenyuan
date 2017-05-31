<?php

namespace Admin\Controller;


use Admin\Model\CategoryModel;
use function array_merge;
use function ksort;
use function print_r;
use function var_dump;

class CategoryController extends CommonController
{
    public function index()
    {
        $cat  = new CategoryModel();
        $list = $cat->allCategory();
        $data = $cat->tree($list);
        return $this->ajaxReturn($data);
    }

    public function addCategory()
    {
        $article = new CategoryModel();
        $params       = $_POST;
        $params['id'] = $article->count() + 1;
        $data         = $article->InsertData($params);
        $this->ajaxReturn($data);
    }

    public function delCategory()
    {
        if (empty(I('id'))) {
            $this->ajaxReturn(['msg' => '非法操作']);
            return false;
        }
        $article = new CategoryModel();
        $data    = $article->DelDataById($_GET['id']);
        return $this->ajaxReturn($data);
    }
}
<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $example = D('Article')->getChildren(3, 3);
        $aboutUs = D('Article')->getOneByCid(37);
        $product = D('Article')->getPro();
        $this->assign('product', $product);
        $this->assign('aboutUs', $aboutUs);
        $this->assign('example', $example);
        $this->display('index');
    }
}
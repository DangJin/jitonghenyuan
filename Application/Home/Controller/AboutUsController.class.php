<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午7:28
 */

namespace Home\Controller;

use Think\Controller;


class AboutUsController extends Controller
{

    public function index()
    {
        $result = D('Article')->getOneByCid(37);
        $this->assign('result', $result);
        $this->display('aboutUs');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:36
 */

namespace Home\Controller;


use Think\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $this->display('news');
    }
}
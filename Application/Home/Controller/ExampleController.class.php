<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:32
 */

namespace Home\Controller;


use Think\Controller;

class ExampleController extends Controller
{
    public function index()
    {
        $this->display('example');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:34
 */

namespace Home\Controller;


use Think\Controller;

class NetController extends Controller
{
    public function index()
    {
        $this->display('net');
    }
}
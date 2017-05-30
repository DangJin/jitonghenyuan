<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:29
 */

namespace Home\Controller;


use Think\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        $this->display('contactUs');
    }


    public function message()
    {
        $this->display();
    }

    public function board()
    {
        $board = M('Mboard');
        $board->create();
        $result = $board->add();
        if ($result) {
            $this->success('发送成功');
        } else {
            $this->error('发送失败');
        }
    }
}
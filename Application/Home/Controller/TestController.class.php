<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午10:46
 */

namespace Home\Controller;


class TestController
{
    public function index()
    {
        echo lcfirst(CONTROLLER_NAME);
    }
}
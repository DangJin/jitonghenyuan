<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 17:02
 */

namespace Admin\Controller;


use function p;
use Think\Think;
use function var_dump;

class IndexController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        p();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 17:02
 */

namespace Admin\Controller;


use Think\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Credentials', 'true');
        header('Access-Control-Allow-Methods:*');
    }
}
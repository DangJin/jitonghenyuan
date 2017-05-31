<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/30
 * Time: 19:50
 */

namespace Admin\Controller;


use Admin\Model\MboardModel;

class MboardController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function MsgList()
    {
        $msg   = new MboardModel();
        $param = $_GET;
        $page  = !empty($param['page']) ? $param['page'] : '1';
        $limit = !empty($param['limit']) ? $param['limit'] : '10';
        $data  = $msg->MsgList($page, $limit);
        $this->ajaxReturn($data);
    }

    public function delMsg()
    {
        if (empty($_GET['id'])) {
            $this->ajaxReturn(['msg' => '非法操作']);
            return false;
        }
        $article = new MboardModel();
        $data    = $article->DelDataById(I('id'));
        return $this->ajaxReturn($data);
    }
}
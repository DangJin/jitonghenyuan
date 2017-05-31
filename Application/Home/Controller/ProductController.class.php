<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:38
 */

namespace Home\Controller;


use Home\Model\ArticleModel;
use Think\Controller;

class ProductController extends Controller
{
    private $exam;
    private $list;
    private $pid;

    function __construct()
    {
        parent::__construct();
        $this->exam = new ArticleModel();
        $this->list = D('Category')->getTree(2);
    }

    public function index()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->pid = D('Category')->getOneById($id)[0]['pid'];
        } else {
            $this->pid = 17;
            $id = 7;
        }
        if (isset($_GET['p'])) {
            $p = $_GET['p'];
            $result = $this->exam->getProducts($id, $p);
        } else {
            $result = $this->exam->getProducts($id);
        }

        $count = D('Article')->where("cate_id = %d and status=1", $id)->count();

        $Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header', '');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false;//最后一页不显示为总页数
        $show       = bootstrap_page_style($Page->show());
        dump($count);

        $this->assign('id', $id);
        $this->assign('pid', $this->pid);
        $this->assign('result', $result);
        $this->assign('list', $this->list);
        $this->assign('page', $show);
        $this->display('product');
    }

    public function introduce()
    {
        $id = $_GET['id'];

        $this->pid = D('Category')->getOneById($id)[0]['pid'];
        $result = $this->exam->getOneById($id);
        $this->assign('id', $id);
        $this->assign('pid', $this->pid);
        $this->assign('list', $this->list);
        $this->assign('product', $result);
        $this->display();
    }
}
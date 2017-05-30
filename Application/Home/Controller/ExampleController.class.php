<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:32
 */

namespace Home\Controller;


use Home\Model\ArticleModel;
use Think\Controller;

class ExampleController extends Controller
{
    private $exam;
    private $list;

    function __construct()
    {
        parent::__construct();
        $this->exam = new ArticleModel();
        $this->list = D('Category')->getList(3);
    }

    public function index()
    {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
                $result = $this->exam->getExamples($id, $p);
            } else {
                $result = $this->exam->getExamples($id);
            }
            $count = M('Article')->where('cate_id = %d and status=1', $id)->count();
            $this->assign('id', $id);
        } else {
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
                $result = $this->exam->getExamples(3, $p);
            } else {
                $result = $this->exam->getExamples(3);
            }
            $count = M('Article')->alias('a')->join('category c on a.cate_id = c.id')->where('pid=3 and a.status=1')->count();
        }

        $Page       = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header', '');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false;//最后一页不显示为总页数
        $show       = bootstrap_page_style($Page->show());

        $this->assign('list', $this->list);
        $this->assign('images', $result);
        $this->assign('page', $show);
        $this->display('example');
    }

    public function introduce()
    {
        $id = $_GET['id'];
        $result = $this->exam->getOneById($id);
        $this->assign('product', $result);
        $this->assign('list', $this->list);
        $this->display();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 17/5/28
 * Time: 下午9:36
 */

namespace Home\Controller;


use Home\Model\ArticleModel;
use Think\Controller;

class NewsController extends Controller
{
    private $exam;
    private $list;

    function __construct()
    {
        parent::__construct();
        $this->exam = new ArticleModel();
        $this->list = D('Category')->getList(4);
    }

    public function index()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
                $result = $this->exam->getNews($id, $p);
            } else {
                $result = $this->exam->getNews($id);
            }
            $this->assign('id', $id);
            $count = M('Article')->where('cate_id = %d and status=1',$id)->count();
        } else {
            if (isset($_GET['p'])) {
                $p = $_GET['p'];
                $result = $this->exam->getNews(15, $p);
            } else {
                $result = $this->exam->getNews(15);
            }
            $count = M('Article')->where('cate_id=15 and status=1')->count();
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
        $this->assign('news', $result);
        $this->assign('list', $this->list);
        $this->assign('page', $show);
        $this->display('news');
    }

    public function content()
    {
        $id = $_GET['id'];
        $result = $this->exam->getOneById($id);
        $this->assign('new', $result);
        $this->assign('list', $this->list);
        $this->display();
    }
}
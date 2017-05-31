<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 18:56
 */

namespace Admin\Controller;


use Admin\Model\ArticleModel;
use const false;
use function I;
use function var_dump;

class ArticleController extends CommonController
{
    public function ArticleList()
    {
        $article  = new ArticleModel();
        $param    = $_GET;
        $keywords = !empty($param['keywords']) ? $param['keywords'] : '';
        $page     = !empty($param['page']) ? $param['page'] : '1';
        $limit    = !empty($param['limit']) ? $param['limit'] : '10';
        $data     = $article->ArticleList($keywords, $page, $limit);
        $this->ajaxReturn($data);
    }

    public function addArticle()
    {
        $article = new ArticleModel();
        $params  = $_POST;
        $data    = $article->InsertData($params);
        $this->ajaxReturn($data);
    }

    public function delArticle()
    {
        if (empty($_GET['id'])) {
            $this->ajaxReturn(['msg' => '非法操作']);
            return false;
        }
        $article = new ArticleModel();
        $data    = $article->DelDataById(I('id'));
        return $this->ajaxReturn($data);


    }

    public function UpdateArticle()
    {
        $params  = $_POST;
        $article = new ArticleModel();
        $data    = $article->UpdateData($params['id'], $params);
        return $this->ajaxReturn($data);

    }

    public function getArticleByCat()
    {
        $article = new ArticleModel();
        $param   = $_GET;
        $page    = !empty($param['page']) ? $param['page'] : '';
        $limit   = !empty($param['limit']) ? $param['limit'] : '';
        $cate_id   = !empty($param['cate_id']) ? $param['cate_id'] : '';
        $data    = $article->GetArticleListByCat($cate_id,$page, $limit);
        $this->ajaxReturn($data);
    }

}
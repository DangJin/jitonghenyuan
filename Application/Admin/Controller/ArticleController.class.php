<?php
/**
 * Created by PhpStorm.
 * User: DangJin
 * Date: 2017/5/28
 * Time: 18:56
 */

namespace Admin\Controller;


use Admin\Model\ArticleModel;
use function var_dump;

class ArticleController extends CommonController
{
    public function ArticleList()
    {
        $article = new ArticleModel();
        var_dump($article->ArticleList());
    }

}
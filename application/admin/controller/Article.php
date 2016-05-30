<?php
namespace app\admin\controller;

use \think\View;
class Article extends \think\Controller
{
    public function index()
    {
        $title = "文章管理后台";
        $view = new View();
        $view -> assign('title',$title);
        return $view -> fetch();
        //return $view -> display($title);
    }
    public function listAll()
    {
        $title = "文章列表";
        $article = new \app\admin\model\Article();
        $res = $article -> getList();
        var_dump($res);exit;
        return $view -> fetch();
    }
    public function listOne()
    {
        $title = "文章列表";
        $article = new \app\admin\model\Article();
        $res = $article -> getRow(2);
        var_dump($res);exit;
        return $view -> fetch();
    }
}

<?php
namespace app\index\controller;

use \think\View;
use \think\Input;
class Article extends \think\Controller
{
    public function index()
    {
        return 'hello thinkphp2';

    }
    public function detail()
    {
        $id = Input::request('id');
        $article = new \app\admin\model\Article();
        $res = $article -> getRow($id);
        $view = new View();
        $view -> assign('info',$res);
        return $view -> fetch();
    }
}

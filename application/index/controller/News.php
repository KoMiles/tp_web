<?php 
namespace app\index\controller;
use \think\Input;

class News
{
    public function index()
    {
        $view = new \think\View();
        return $view->fetch('index');

    }
    public function read() {
        $id = Input::get('id');
        $page = Input::get('page');
        var_dump($id,$page);exit;
        $str = "This is read action";
        return $str;
    }

    public function update() {
        if(IS_GET) {
            
            echo "is_get";
        } else {
            echo "no_get";
        }
        exit;
    }


}

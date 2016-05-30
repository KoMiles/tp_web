<?php
namespace app\admin\controller;

class Index
{
    public function index()
    {
        
        $rs = $_SERVER;
//var_dump($rs);
        return 'hello thinkphp2';

    }
    public function hello()
    {
        $res = $_SERVER['PATH_INFO'];
        var_dump($res);
        return 'hello world';
    }
    public function test()
    {
        //$view = new View();
        //$data = "你好";
        //$view->assign('data',$data);
        //$this->display('index.html','GBK');
        //Config::load(APP_PATH.'application/index/config.php');
    }
    public function info()
    {
        echo phpinfo();
        exit;
    }
    public function config()
    {
        //$config = \think\Config::get('default_return_type');
        echo "<pre>";
        $config = \think\Config::get('database');
        var_dump($config);
        exit;
    }
}

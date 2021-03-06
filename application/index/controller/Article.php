<?php
namespace app\index\controller;

use \think\View;
use \think\Input;
/**
 * Article 
 * 文章首页
 * @package 
 * @version $Id$
 * @author wangkongming <komiles@163.com> 
 * @date 2016-07-09 17:23:39
 */
class Article extends \think\Controller
{
    public function index()
    {
        return 'hello thinkphp2';

    }

    /**
     * detail 
     * 
     * @access public
     * @return void
     */
    public function detail()
    {
        $id = Input::request('id');
        $article = new \app\admin\model\Article();
        $res = $article -> getRow($id);
        $res['a'] = '4';
        $res['b'] = '3';
        $now = time();
        $view = new View();
        $view -> assign('info',$res) -> assign('now',$now);;
        return $view -> fetch();
    }

    /**
     * log 
     * 获取配置文件
     * @access public
     * @return void
     */
    public function log() {
        echo \think\Config::get('log');
        echo 11;
        exit;
    }

    /**
     * show 
     * 获取show 方法
     * @access public
     * @return void
     */
    public function show() {
        show1();
    }
}

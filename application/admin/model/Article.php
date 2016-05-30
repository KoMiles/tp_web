<?php
namespace app\admin\model;

/**
 * Article 
 * Article 操作类
 * @package 
 * @version $Id$
 * @author wangkongming <komiles@163.com> 
 * @date 2016-05-30 13:44:18
 */
class Article extends \think\Model
{
    //public function getRow($id) {
        //$res =  \think\Db::table('Article') -> where('id','1')->find();
        //var_dump($res);exit;
    //}

    //public function getList() {
        //$res =  \think\Db::table('Article') -> where('id','1')->select();
        //var_dump($res);exit;
    //}
    protected static $table = 'Article';

    /**
     * getRow 
     * 获取单条数据
     * @param mixed $id 
     * @access public
     * @return void
     */
    public function getRow($id) {
        $article_res = Article::get($id);
        if($article_res) {
            return $article_res-> toArray();
        } else {
            return array();
        }
    }

    public function getList() {
        $where = array('id','>','5');
        $res =  \think\Db::table('Article') -> where('id','>','5')->limit(2)->select();
        return $res;
        //var_dump($res);exit;
        //$list = Article::all($where);
        ////$list = Article::where('id','>',10)->select();
        //foreach($list as $k => $v) {
            //$list[$k] = $v -> toArray();
        //}
        //return $list;
    }
}

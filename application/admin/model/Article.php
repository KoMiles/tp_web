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
    private static $table_name = 'Article';
    /**
     * getRow 
     * 获取单条数据
     * @param mixed $id 
     * @access public
     * @return void
     */
    public function getRow($id) {
        return \think\Db::table(self::$table_name) -> where('id',$id)->find();
    }

    /**
     * getList 
     * 文章列表
     * @param int $limit 
     * @access public
     * @return void
     */
    public function getList($page= 1,$limit = 10) {
        return \think\Db::table(self::$table_name) -> limit($limit) -> page($page)->select();
    }

    /**
     * createArticle 
     * 添加文章
     * @param mixed $data 
     * @access public
     * @return void
     */
    public function createArticle($data) {
        $data['create_ts'] = time();
        $data['update_ts'] = time();
        return \think\Db::table(self::$table_name)->insert($data);
    }

    /**
     * updateArticle 
     * 修改文章
     * @param mixed $data 
     * @param mixed $id 
     * @access public
     * @return void
     */
    public function updateArticle($data,$id) {
        $data['update_ts'] = time();
        return \think\Db::table(self::$table_name) -> where('id',$id) -> update($data);
    }


}

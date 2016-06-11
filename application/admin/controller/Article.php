<?php
namespace app\admin\controller;

use \think\View;
use \think\Input;
use \app\common\Pager;
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

        $page = Input::request('page');
        $page  = $page > 1 ? $page : 1;
        $limit = 6;
        $title = "文章列表";
        $article = new \app\admin\model\Article();
        $article_list = $article -> getList($page,$limit);
        foreach ($article_list as $key => $row) {
            $article_list[$key]['date'] = date('Y-m-d H:i:s',$row['create_ts']);
            $article_list[$key]['statusCn'] = $row['status'] == 'normal' ? '正常' : '已删除';
        }
        $total = $article -> getCount();
        $myPage = new Pager($total,$page);
        $pageStr= $myPage->GetPagerContent();
        $view = new View();
        $view -> assign("article_list",$article_list) -> assign("page_string",$pageStr);
        $view -> assign("page_string",$pageStr);
        $view -> assign("num",8);
        return $view -> fetch("list");
        //return $view -> display("list");
    }

    /**
     * add 
     * 添加文章
     * @access public
     * @return void
     */
    public function add()
    {
        $id = Input::request('id');
        if($id > 0) {
            $article = new \app\admin\model\Article();
            $res = $article -> getRow($id);
        } else {
            $res['id'] = $res['title'] = $res['content'] = $res['author'] = "";
        }
        $view = new View();
        $view -> assign('info',$res);
        return $view -> fetch();
    }

    /**
     * modify_ajax 
     * 修改文章
     * @access public
     * @return void
     */
    public function modify_ajax()
    {
        $id = Input::request('id');
        $author = Input::request('author');
        $title = Input::request('title','','strip_tags');
        $content = Input::request('content','','strip_tags');
        if($id) {
            //修改
            $data['author'] = $author;
            $data['title'] = $title;
            $data['content'] = $content;
            $article = new \app\admin\model\Article();
            $result = $article -> updateArticle($data,$id);
        } else {
            //添加
            $data['author'] = $author;
            $data['title'] = $title;
            $data['content'] = $content;
            $article = new \app\admin\model\Article();
            $result = $article -> createArticle($data);
        }
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            return $this->success('操作成功', 'listall');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            return $this->error('操作失败');
        }
    }

    public function delete()
    {
        $id = Input::request('id');
        $article = new \app\admin\model\Article();
        $data['status'] = 'delete';
        $result = $article -> updateArticle($data,$id);
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            return $this->success('操作成功', '/admin/article/listall');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            return $this->error('操作失败');
        }
    }
}

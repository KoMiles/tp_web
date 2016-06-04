<?php
namespace app\admin\controller;

use \think\View;
use \think\Input;
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
        $article_list = $article -> getList(6);
        foreach ($article_list as $key => $row) {
            $article_list[$key]['date'] = date('Y-m-d H:i:s',$row['create_ts']);
            $article_list[$key]['statusCn'] = $row['status'] == 'normal' ? '正常' : '已删除';
        }

        $view = new View();
        $view -> assign("article_list",$article_list);
        return $view -> fetch("list");
    }
    public function listOne()
    {
        $title = "文章列表";
        $article = new \app\admin\model\Article();
        $res = $article -> getRow(1);
        var_dump($res);exit;
        return $view -> fetch();
    }

    /**
     * add 
     * 添加文章
     * @access public
     * @return void
     */
    public function add()
    {
        $article = new \app\admin\model\Article();
        $view = new View();
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
//$type = Input::post('type');
//$type = Input::param('type');
//$content = Input::request('content');

//var_dump($content);
//$content = Input::request('content','','strip_tags,strtoupper');
//var_dump($content);
        //post方式获取参数
        var_dump($_REQUEST);
exit;
        $type =  $_REQUEST['type'];
        $author =  $_REQUEST['author'];
        $content =  $_REQUEST['content'];
        $title = $this-> getRequest() -> getPost('title') ;
        $author = $this->getRequest() -> getPost('author') ;
        $content = $this->getRequest() -> getPost('content') ;
var_dump($type);exit;
        if($type == 'add') {
            //添加文章
            $result = $this->m_article->addArticle($title, $author, $content);
        } else if($type == 'edit') {
            $id = $this-> getRequest() -> getPost('id') ;
            //编辑文章
            $result = $this->m_article->updateArticle($id,$title, $author, $content, $status);
        }
        if($result) {
            Tool_Redirect::javascriptRedirect('操作成功','/admin/article/index');
        } else {
            Tool_Redirect::javascriptRedirect('操作失败','/admin/article/index');
        }
        exit;
    }

    public function update()
    {
        $article = new \app\admin\model\Article();
        $date = date("Y-m-d");
        $data['title'] = '测试文章添加'.$date;
        $data['author'] = '作者'.$date;
        $data['content'] = '文章内容'.$date;
        $res = $article -> updateArticle($data,55);
        var_dump($res);exit;
    }
}

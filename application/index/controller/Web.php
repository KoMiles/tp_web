<?php
namespace app\index\controller;
use \think\Request;

class web
{
    public function index()
    {
        // 获取当前域名
        echo 'domain: ' . Request::domain() . '<br/>';
        // 获取当前入口文件
        echo 'file: ' . Request::baseFile() . '<br/>';
        // 获取当前URL地址 不含域名
        echo 'url: ' . Request::url() . '<br/>';
        // 获取包含域名的完整URL地址
        echo 'url with domain: ' . Request::url(true) . '<br/>';
        // 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . Request::baseUrl() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root:' . Request::root() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root with domain: ' . Request::root(true) . '<br/>';
        // 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . Request::pathinfo() . '<br/>';
        // 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . Request::path() . '<br/>';
        // 获取URL地址中的后缀信息
        echo 'ext: ' . Request::ext() . '<br/>';

    }
    public function test()
    {
        return 'hello request';

    }
}

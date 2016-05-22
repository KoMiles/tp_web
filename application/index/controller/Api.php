<?php
namespace app\index\controller;

class Api
{
    public function index()
    {
        $data = array('name'=>'thinkphp','url'=>'thinkphp.cn');
        return array('data'=>$data,'code'=>1,'message'=>'操作完成');
    }
    public function test() {
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        return ['data'=>$data,'code'=>1,'message'=>'操作完成'];

    }
}

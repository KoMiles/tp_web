<?php
namespace app\index\controller;

class News
{
    public function index()
    {
        return 'hello thinkphp2';

    }
    public function read() {
        $str = "This is read action";
        return $str;
    }
}

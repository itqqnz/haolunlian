<?php

namespace Manage\Controller;

use Think\Controller;

class IndexController extends Controller
{
    function index()
    {
        new BaseAdminController(true);
        //header("location");
        $this->display();
    }
    
    function login()
    {
        $this->display();
    }
    
    function logout()
    {
        session(['start']);
        header("location:".U('Manage/Index/login'));
    }
}
?>
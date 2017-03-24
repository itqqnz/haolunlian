<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){       
         $d= M("")->query("show tables");
        $this->assign("title","tp hello");
        $this->assign("data",$d); 
        $this->display();
    }
}
<?php 
namespace Manage\Controller;

use Think\Controller;
use \Dao\Bll\RoleBll;

class BaseAdminController extends Controller
{
    function __construct($is_root_page=true)
    {
        $this->is_root_page=$is_root_page;
        $this->_checkLogin();
        $this->role=new RoleBll();
    }
    
    protected $user_id;
    protected $is_root_page=true;
    
    protected $role;
    
    
    private function _checkLogin()
    {
        $user_id=session("userid");
        if($user_id) $this->user_id=$user_id;
        return;
        session('[start]');
        if($this->is_root_page)
        {
            header("location:".U('Manage/Index/login'));
            exit();
        }
        exit(json_encode(["code"=>500,"msg"=>"您的登录会话已超期，请重新登录"]));
    }
    
    protected function verify_purview()
    {        
        
    }
}
?>
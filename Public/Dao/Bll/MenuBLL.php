<?php 
namespace Dao\Bll;

/**
 * 菜单管理
 * @author qin
 *
 */
class MenuBll extends BaseBLL
{    
    function __construct()
    {
       parent::__construct("sys_menu");
    }
    
    public function get_user_all_menu($user_id,$is_used=false)
    {
        if(!$user_id) return [];
        return $this->dal->join($this->table("sys_role_r_menu")." b on a.menu_id=b.menu_id")->join($this->table("sys_role")." as c");
    }
    
    public function get_user_all_used_menu($user_id)
    {
        if(!$user_id) return [];
        return $this->get_user_all_menu($user_id,true);
    }
}
?>
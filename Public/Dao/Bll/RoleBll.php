<?php 
namespace Dao\Bll;

/**
 * 角色管理
 * @author qin
 *
 */
class RoleBll extends BaseBLL
{    
    function __construct()
    {
       parent::__construct("sys_role");
    }
    
    /**
     * 获取该用户的所有角色
     * @param unknown $user_id
     */
    public function get_user_roles($user_id)
    {
        if(!$user_id) return [];        
        return $this->dal->join($this->prex."sys_admin_r_role on a.role_id=b.role_id and a.is_enable=1")
        ->where(["b.user_id"=>$user_id])->field("a.*")->order("c.order_by")->select();
    }
}
?>
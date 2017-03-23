<?php
namespace Home\Controller;
use Think\Controller;
use Controller\BaseAdminController;
use Dao\Bll\MenuBll;

class IndexController extends BaseAdminController {
    
    protected $menu_bll;
    
    function __construct()
    {
        parent::__construct();
        $this->menu_bll=new MenuBll();
    }
    
    /**
     * 菜单列表
     */
    public function index(){
        $data=$this->menu_bll->get();
        $this->assign("menus",$data);
        $this->display();
    }
    
    public function edit()
    {
        $menu_id=i('menuid');
        $title="添加";
        if($menu_id)
        {
            $title="编辑";
            $menu=$this->menu_bll->get(["menu_id"=>$menu_id]);
            if(!$menu)
            {
                $this->error("参数错误，该数据不存在");
                exit();
            }
            $this->assign("menu",$menu);
        }
        $this->assign("title",$title);
        $this->display();
    }

    public function save()
    {
        
    }
}
?>
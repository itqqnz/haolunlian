<?php
namespace Manage\Controller;
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
     * �˵��б�
     */
    public function index(){
        $data=$this->menu_bll->get();
        $this->assign("menus",$data);
        $this->display();
    }
    
    public function edit()
    {
        $menu_id=i('menuid');
        $title="���";
        if($menu_id)
        {
            $title="�༭";
            $menu=$this->menu_bll->get(["menu_id"=>$menu_id]);
            if(!$menu)
            {
                $this->error("�������󣬸����ݲ�����");
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
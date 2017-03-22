<?php 
namespace Dao\Bll;

class BaseBLL
{
    protected $dal;
    
    protected $table_name;
    
    private $prex;
    
    protected function table($table)
    {
        return $this->prex.$table;
    }
    
    function __construct($table)
    {
        if(!$table) $table='';
        $this->table_name=$table;
        $this->dal=M($this->table_name);
        $this->prex=C("DB_PREFIX");
    }

    function add($data)
    {
        if(!$this->table_name) return false;
        if($this->check_array($data)===false) return false;
        return $this->dal->add($data);
    }
    
    function add_muity($data_array)
    {
        if(!$this->table_name) return false;
        if($this->check_array($data_array)===false) return false;
        return $this->dal->addAll($data_array);
    }
    
    /**
     * 主键必须包含
     * @param unknown $data
     * @return boolean
     */
    function update($data)
    {
        if(!$this->table_name) return false;
        if($this->check_array($data)===false) return false;
        return $this->dal->save($data);
    }
    
    /**
     * 条件更新
     * @param unknown $where
     * @param unknown $data
     * @return boolean
     */
    function updateByCondition($where,$data)
    {
        if(!$this->table_name) return false;
        if($this->check_array($where)===false) return false;
        if($this->check_array($data)===false) return false;
        return $this->where($where)->save($data);
    }
    
    /**
     * 组合条件查询
     * @param unknown $data
     * @return boolean|mixed|boolean|NULL|string|unknown|object
     */
    function get($data)
    {
        if(!$this->table_name) return false;
        if($this->check_array($data)===false) return false;
        return $this->dal->where($data)->find();
    }
    
    /**
     * 批量删除
     * @param unknown $data
     * @return boolean|mixed|boolean|unknown
     */
    function delete($data)
    {
        if(!$this->table_name) return false;
        if($this->check_array($data)===false) return false;
        return $this->dal->where($data)->delete();
    }
    
    function query_page($page=1,$size=10,$where=[],&$total,$order=[])
    {
        $total=$this->dal->where($where)->count();        
        $end=$page*$size;
        $start=$end-$size;
        return $this->dal->where($where)->order($order)->limit($start,$end)->select();
    }
    
    protected function check_array($data)
    {
       if(!$data||!is_array($data)||count($data)==0) return false;
       return true;
    }
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/10/31
 * Time: 17:32
 */
class vacate_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public  function add($arr){
        $this->db->insert('t_aci_vacate',$arr);

    }

}
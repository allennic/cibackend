<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/10/13
 * Time: 16:16
 */
class attend_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function hand1($arr){
        $this->db->insert('t_aci_attend',$arr);
        //echo $this->db->last_query(); exit;
    }

    public function hand2($depart,$departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_attend');
        $this -> db -> where('depart',$depart);
        $this -> db -> where('departnum',$departnum);

        //$this -> db -> where('departnum',$departnum);

        $query = $this -> db -> get();
        //echo $this->db->last_query(); exit;
        //print_r($query);
        //exit;

        //print_r($query->result_array());
        //echo $query -> num_rows();
        //exit;
        if($query -> num_rows() >= 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }

    }
}
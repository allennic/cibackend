<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/27
 * Time: 18:04
 */
class Vu_model extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

    public function  login($username, $password){
        $this -> db -> select('user_id, username, password, group_id');
        $this -> db -> from('t_aci_user');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5(md5(trim($password))));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function getrand() {
        $fd = fopen("/dev/urandom","r");
        $data = fread($fd,16);
        fclose($fd);
        return md5($data);
    }

    function authuser($user_id){
        $this -> db -> select('*');
        //$this -> db -> select('user_id, depart, departnum');
        $this -> db -> from('t_aci_user');
        $this -> db -> where('user_id', $user_id);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u1($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_boss');
        $this -> db -> where('boss_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u2($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_adver');
        $this -> db -> where('adver_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u3($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_agent');
        $this -> db -> where('agent_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u4($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_hr');
        $this -> db -> where('hr_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u5($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_money');
        $this -> db -> where('money_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u6($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_tech');
        $this -> db -> where('tech_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function u7($departnum){
        $this -> db -> select('*');
        $this -> db -> from('t_aci_web');
        $this -> db -> where('web_id', $departnum);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

}
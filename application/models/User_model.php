<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/27
 * Time: 11:07
 */
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

    public function  login($username, $password){
        $this -> db -> select('user_id, username, password');
        $this -> db -> from('t_aci_user');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5(md5(trim($password))));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}
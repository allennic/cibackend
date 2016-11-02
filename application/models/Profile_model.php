<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/12
 * Time: 09:30
 */
class Profile_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function changpasswrd($pwd2,$usern) {
        $this->db->query("update t_sys_member set password = md5(md5(trim('".$pwd2."'))) where username='".$usern."'");
        //$this -> db -> update('t_sys_member', md5(md5(trim($pwd2))), "username = test");
        //$this -> db -> set('password',MD5(md5(trim($pwd2))));
        //$this -> db -> where('username', 'test');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/6
 * Time: 09:28
 */
class Admin_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function  login($username, $password){
        $this -> db -> select('user_id, username, password, group_id');
        $this -> db -> from('t_sys_member');
        $this -> db -> where('username', $username);
        $this -> db -> where('password', MD5(md5(trim($password))));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            //print_r($query->result_array());
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

    /*public function boss(){

        //$query = $this->db->query('select * from t_aci_boss');

        //return $query->result_array();

        //echo result_array();

    }*/

    public function record_count() {
        return $this->db->count_all("t_aci_boss");
    }

    public function fetch_boss($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("boss_id");
        $query = $this->db->get("t_aci_boss");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function delete($id){
        $this->db->where('boss_id', $id)->delete('t_aci_boss');
    }

    public function deletecheck($vid){
        //$this->db->where('Values', $vid)->delete('t_aci_boss');
        $this->db->query("DELETE FROM t_aci_boss WHERE boss_id in ($vid)");
    }

    public function editboss(){
        $gid = $this->input->get('gid');
        $this->db->from('t_aci_boss');
        $this->db->where('boss_id',$gid);

        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function bosspost($arr,$bid){
        $this->db->where('boss_id',$bid);
        $this->db->update('t_aci_boss',$arr);

    }

    public function add($_arr){
        $this->db->insert('t_aci_boss',$_arr);
    }

    public function ip(){
        $this->db-query("select * from t_sys_member");
    }

}
<?php

class tech_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $query = $this->db->query('select * from t_aci_tech');

        return $query->result_array();

        echo result_array();
    }

    public function add($arr){
        $this->db->insert('t_aci_tech',$arr);
    }

    public function delete($id){
        $this->db->where('tech_id', $id)->delete('t_aci_tech');
    }

    public function edittech(){
        $gid = $this->input->get('gid');
        $this->db->from('t_aci_tech');
        $this->db->where('tech_id',$gid);

        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function deletecheck($vid){
        $this->db->query("DELETE FROM t_aci_tech WHERE tech_id in ($vid)");
    }

    public function record_count() {
        return $this->db->count_all("t_aci_tech");
    }

    public function fetch_tech($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("tech_id");
        $query = $this->db->get("t_aci_tech");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function techpost($arr,$bid){
        $this->db->where('tech_id',$bid);
        $this->db->update('t_aci_tech',$arr);

    }
}
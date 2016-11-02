<?php

class Hr_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $query = $this->db->query('select * from t_aci_hr');

        return $query->result_array();

        echo result_array();
    }

    public function add($arr){
        $this->db->insert('t_aci_hr',$arr);
    }

    public function delete($id){
        $this->db->where('hr_id', $id)->delete('t_aci_hr');
    }

    public function edithr(){
        $gid = $this->input->get('gid');
        $this->db->from('t_aci_hr');
        $this->db->where('hr_id',$gid);

        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function deletecheck($vid){
        $this->db->query("DELETE FROM t_aci_hr WHERE hr_id in ($vid)");
    }

    public function record_count() {
        return $this->db->count_all("t_aci_hr");
    }

    public function fetch_hr($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("hr_id");
        $query = $this->db->get("t_aci_hr");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function hrpost($arr,$bid){
        $this->db->where('hr_id',$bid);
        $this->db->update('t_aci_hr',$arr);

    }
}
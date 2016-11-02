<?php

class web_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $query = $this->db->query('select * from t_aci_web');

        return $query->result_array();

        echo result_array();
    }

    public function add($arr){
        $this->db->insert('t_aci_web',$arr);
    }

    public function delete($id){
        $this->db->where('web_id', $id)->delete('t_aci_web');
    }

    public function editweb(){
        $gid = $this->input->get('gid');
        $this->db->from('t_aci_web');
        $this->db->where('web_id',$gid);

        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function delewebeck($vid){
        $this->db->query("DELETE FROM t_aci_web WHERE web_id in ($vid)");
    }

    public function record_count() {
        return $this->db->count_all("t_aci_web");
    }

    public function fetch_web($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("web_id");
        $query = $this->db->get("t_aci_web");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function webpost($arr,$bid){
        $this->db->where('web_id',$bid);
        $this->db->update('t_aci_web',$arr);

    }
}
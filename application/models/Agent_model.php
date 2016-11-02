<?php

class agent_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $query = $this->db->query('select * from t_aci_agent');

        return $query->result_array();

        echo result_array();
    }

    public function add($arr){
        $this->db->insert('t_aci_agent',$arr);
    }

    public function delete($id){
        $this->db->where('agent_id', $id)->delete('t_aci_agent');
    }

    public function editagent(){
        $gid = $this->input->get('gid');
        $this->db->from('t_aci_agent');
        $this->db->where('agent_id',$gid);

        $query = $this -> db -> get();
        return $query->result_array();
    }

    public function deletecheck($vid){
        $this->db->query("DELETE FROM t_aci_agent WHERE agent_id in ($vid)");
    }

    public function record_count() {
        return $this->db->count_all("t_aci_agent");
    }

    public function fetch_agent($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("agent_id");
        $query = $this->db->get("t_aci_agent");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function agentpost($arr,$bid){
        $this->db->where('agent_id',$bid);
        $this->db->update('t_aci_agent',$arr);

    }
}
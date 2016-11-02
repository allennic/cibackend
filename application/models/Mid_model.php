<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/4
 * Time: 13:46
 */
class Mid_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_data(){

        //$query = $this->db->query('select * from zdl_select_job j,zdl_address a where j.adr_id=a.adr_id');

        return $query->result_array();

        echo result_array();
    }
}
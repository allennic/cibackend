<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/10/28
 * Time: 16:07
 */
class Vacate extends CI_Controller{
    public function index(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data1['username'] = $session_data;
        $data['out'] = $this->db->select('*')->from('t_aci_vacate')->where('name',$session_data)->order_by('va_id','desc')->get();
        $this->load->view('user/uhead',$data1);
        $this->load->view('user/vacate',$data);
        $this->load->view('user/ufoot');
    }

    public function add(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data1['username'] = $session_data;

        $this->load->view('user/uhead',$data1);
        $this->load->view('user/vacateadd');
        $this->load->view('user/ufoot');

        if ($this->input->is_ajax_request()) {
            $vdepart = $this->input->post('va_depart');
            $vname = $this->input->post('va_name');
            $vtype = $this->input->post('va_type');
            $vnote = $this->input->post('va_note');
            $vbegin = $this->input->post('va_begin');
            $vend = $this->input->post('va_end');

            $arr = array(
                'name' => $session_data,
                'va_depart' => $vdepart,
                'va_name' => $vname,
                'va_type' => $vtype,
                'va_note' => $vnote,
                'va_begin' => $vbegin,
                'va_end' => $vend,
                'va_status' => '等待审批'
            );
            $this->load->model('vacate_model', 'vacate');
            $this->vacate->add($arr);
            redirect('user/vacate', 'refresh');
        }


    }
}
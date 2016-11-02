<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class adver extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        /*if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
        }
        else
        {
            redirect('admin/admin/index', 'refresh');
        }*/
        //$this->load->model('adver_model');
        //$data['adver_item']= $this->adver_model->index();
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->helper("url");
        $this->load->model("adver_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "/admin/adver/index";
        $config["total_rows"] = $this->adver_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['adver_item'] = $this->adver_model->fetch_adver($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/adver/list',$data);
        $this->load->view('admin/foot');
    }

    public function add(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->view('admin/head',$data);
        $this->load->view('admin/adver/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            $mjob = $this->input->post('adver_job');
            $mname = $this->input->post('adver_name');
            $mphone = $this->input->post('adver_phone');
            $mqq = $this->input->post('adver_qq');
            $memail = $this->input->post('adver_email');

            $arr = array(
                'adver_job' => $mjob,
                'adver_name' => $mname,
                'adver_phone' => $mphone,
                'adver_qq' => $mqq,
                'adver_email' => $memail
            );
            $this->load->model('adver_model', 'adver');
            $this->adver->add($arr);
            redirect('admin/adver', 'refresh');
        }
    }

    public function delete(){

        $this->load->model('adver_model', 'adver');
        $id = $this->input->post('adver_id');
        $this->adver->delete($id);
    }

    public function editadver(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->model('adver_model');
        $data['adver_item']= $this->adver_model->editadver();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/adver/edit',$data);
        $this->load->view('admin/foot');
    }

    public function deletecheck(){

        $this->load->model('adver_model', 'adver');
        $vid = $this->input->post('adver_id');
        $this->adver->deletecheck($vid);
        redirect('admin/adver','refresh');
    }
    public function adverpost(){

        $this->load->model('adver_model', 'adver');
        $bid = $this->input->post('adver_id');
        $bjob = $this->input->post('adver_job');
        $bname = $this->input->post('adver_name');
        $bphone = $this->input->post('adver_phone');
        $bqq = $this->input->post('adver_qq');
        $bemail = $this->input->post('adver_email');
        $arr = array(
            'adver_job'=>$bjob,
            'adver_name'=>$bname,
            'adver_phone'=>$bphone,
            'adver_qq'=>$bqq,
            'adver_email'=>$bemail
        );
        $this->adver->adverpost($arr,$bid);
        redirect('admin/adver', 'refresh');
    }

}
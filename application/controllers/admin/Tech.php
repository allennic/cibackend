<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class tech extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;
        //$this->load->model('tech_model');
        //$data['tech_item']= $this->tech_model->index();

        $this->load->helper("url");
        $this->load->model("tech_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "/admin/tech/index";
        $config["total_rows"] = $this->tech_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['tech_item'] = $this->tech_model->fetch_tech($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/tech/list',$data);
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
        $this->load->view('admin/tech/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            $mjob = $this->input->post('tech_job');
            $mname = $this->input->post('tech_name');
            $mphone = $this->input->post('tech_phone');
            $mqq = $this->input->post('tech_qq');
            $memail = $this->input->post('tech_email');

            $arr = array(
                'tech_job' => $mjob,
                'tech_name' => $mname,
                'tech_phone' => $mphone,
                'tech_qq' => $mqq,
                'tech_email' => $memail
            );
            $this->load->model('tech_model', 'tech');
            $this->tech->add($arr);
            redirect('admin/tech', 'refresh');
        }
    }

    public function delete(){

        $this->load->model('tech_model', 'tech');
        $id = $this->input->post('tech_id');
        $this->tech->delete($id);
    }

    public function edittech(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->model('tech_model');
        $data['tech_item']= $this->tech_model->edittech();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/tech/edit',$data);
        $this->load->view('admin/foot');
    }

    public function deletecheck(){

        $this->load->model('tech_model', 'tech');
        $vid = $this->input->post('tech_id');
        $this->tech->deletecheck($vid);
        redirect('admin/tech','refresh');
    }
    public function techpost(){

        $this->load->model('tech_model', 'tech');
        $bid = $this->input->post('tech_id');
        $bjob = $this->input->post('tech_job');
        $bname = $this->input->post('tech_name');
        $bphone = $this->input->post('tech_phone');
        $bqq = $this->input->post('tech_qq');
        $bemail = $this->input->post('tech_email');
        $arr = array(
            'tech_job'=>$bjob,
            'tech_name'=>$bname,
            'tech_phone'=>$bphone,
            'tech_qq'=>$bqq,
            'tech_email'=>$bemail
        );
        $this->tech->techpost($arr,$bid);
        redirect('admin/tech', 'refresh');
    }
}
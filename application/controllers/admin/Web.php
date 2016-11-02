<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class web extends CI_Controller{
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
        //$this->load->model('web_model');
        //$data['web_item']= $this->web_model->index();

        $this->load->helper("url");
        $this->load->model("web_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "/admin/web/index";
        $config["total_rows"] = $this->web_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['web_item'] = $this->web_model->fetch_web($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/web/list',$data);
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
        $this->load->view('admin/web/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            $mjob = $this->input->post('web_job');
            $mname = $this->input->post('web_name');
            $mphone = $this->input->post('web_phone');
            $mqq = $this->input->post('web_qq');
            $memail = $this->input->post('web_email');

            $arr = array(
                'web_job' => $mjob,
                'web_name' => $mname,
                'web_phone' => $mphone,
                'web_qq' => $mqq,
                'web_email' => $memail
            );
            $this->load->model('web_model', 'web');
            $this->web->add($arr);
            redirect('admin/web', 'refresh');
        }
    }

    public function delete(){

        $this->load->model('web_model', 'web');
        $id = $this->input->post('web_id');
        $this->web->delete($id);
    }

    public function editweb(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->model('web_model');
        $data['web_item']= $this->web_model->editweb();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/web/edit',$data);
        $this->load->view('admin/foot');
    }

    public function delewebeck(){

        $this->load->model('web_model', 'web');
        $vid = $this->input->post('web_id');
        $this->web->delewebeck($vid);
        redirect('admin/web','refresh');
    }
    public function webpost(){

        $this->load->model('web_model', 'web');
        $bid = $this->input->post('web_id');
        $bjob = $this->input->post('web_job');
        $bname = $this->input->post('web_name');
        $bphone = $this->input->post('web_phone');
        $bqq = $this->input->post('web_qq');
        $bemail = $this->input->post('web_email');
        $arr = array(
            'web_job'=>$bjob,
            'web_name'=>$bname,
            'web_phone'=>$bphone,
            'web_qq'=>$bqq,
            'web_email'=>$bemail
        );
        $this->web->webpost($arr,$bid);
        redirect('admin/web', 'refresh');
    }
}
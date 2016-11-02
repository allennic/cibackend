<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class Finace extends CI_Controller{
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
        //$data['finace_item']= $this->Finace_model->index();

        $this->load->helper("url");
        $this->load->model("finace_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "/admin/finace/index";
        $config["total_rows"] = $this->finace_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;

        //$config['use_page_numbers'] = TRUE;
        $config['num_links'] = $this->finace_model->record_count();
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['money_item'] = $this->finace_model->fetch_money($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        //$data['links'] = $this->pagination->create_links();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/finace/list',$data);
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
        $this->load->view('admin/finace/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            $mjob = $this->input->post('money_job');
            $mname = $this->input->post('money_name');
            $mphone = $this->input->post('money_phone');
            $mqq = $this->input->post('money_qq');
            $memail = $this->input->post('money_email');

            $arr = array(
                'money_job' => $mjob,
                'money_name' => $mname,
                'money_phone' => $mphone,
                'money_qq' => $mqq,
                'money_email' => $memail
            );
            $this->load->model('Finace_model', 'fa');
            $this->fa->add($arr);
            redirect('admin/finace', 'refresh');
        }
    }

    public function delete(){

        $this->load->model('finace_model', 'fa');
        $id = $this->input->post('money_id');
        $this->fa->delete($id);
    }

    public function editmoney(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->model('finace_model');
        $data['money_item']= $this->finace_model->editmoney();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/finace/edit',$data);
        $this->load->view('admin/foot');
    }

    public function deletecheck(){

        $this->load->model('finace_model', 'fa');
        $vid = $this->input->post('money_id');
        $this->fa->deletecheck($vid);
        redirect('admin/finace','refresh');
    }
    public function moneypost(){

        $this->load->model('finace_model', 'fa');
        $bid = $this->input->post('money_id');
        $bjob = $this->input->post('money_job');
        $bname = $this->input->post('money_name');
        $bphone = $this->input->post('money_phone');
        $bqq = $this->input->post('money_qq');
        $bemail = $this->input->post('money_email');
        $arr = array(
            'money_job'=>$bjob,
            'money_name'=>$bname,
            'money_phone'=>$bphone,
            'money_qq'=>$bqq,
            'money_email'=>$bemail
        );
        $this->fa->moneypost($arr,$bid);
        redirect('admin/finace', 'refresh');
    }
}
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class agent extends CI_Controller{
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

        $this->load->helper("url");
        $this->load->model("agent_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "/admin/agent/index";
        $config["total_rows"] = $this->agent_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['agent_item'] = $this->agent_model->fetch_agent($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/agent/list',$data);
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
        $this->load->view('admin/agent/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            $mjob = $this->input->post('agent_job');
            $mname = $this->input->post('agent_name');
            $mphone = $this->input->post('agent_phone');
            $mqq = $this->input->post('agent_qq');
            $memail = $this->input->post('agent_email');

            $arr = array(
                'agent_job' => $mjob,
                'agent_name' => $mname,
                'agent_phone' => $mphone,
                'agent_qq' => $mqq,
                'agent_email' => $memail
            );
            $this->load->model('agent_model', 'agent');
            $this->agent->add($arr);
            redirect('admin/agent', 'refresh');
        }
    }

    public function delete(){

        $this->load->model('agent_model', 'agent');
        $id = $this->input->post('agent_id');
        $this->agent->delete($id);
    }

    public function editagent(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->model('agent_model');
        $data['agent_item']= $this->agent_model->editagent();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/agent/edit',$data);
        $this->load->view('admin/foot');
    }

    public function deletecheck(){

        $this->load->model('agent_model', 'agent');
        $vid = $this->input->post('agent_id');
        $this->agent->deletecheck($vid);
        redirect('admin/agent','refresh');
    }
    public function agentpost(){

        $this->load->model('agent_model', 'agent');
        $bid = $this->input->post('agent_id');
        $bjob = $this->input->post('agent_job');
        $bname = $this->input->post('agent_name');
        $bphone = $this->input->post('agent_phone');
        $bqq = $this->input->post('agent_qq');
        $bemail = $this->input->post('agent_email');
        $arr = array(
            'agent_job'=>$bjob,
            'agent_name'=>$bname,
            'agent_phone'=>$bphone,
            'agent_qq'=>$bqq,
            'agent_email'=>$bemail
        );
        $this->agent->agentpost($arr,$bid);
        redirect('admin/agent', 'refresh');
    }
}
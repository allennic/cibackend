<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class Hr extends CI_Controller{
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
        $this->load->model("hr_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "/admin/hr/index";
        $config["total_rows"] = $this->hr_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['hr_item'] = $this->hr_model->fetch_hr($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/hr/list',$data);
        $this->load->view('admin/foot');

        /*$this->load->helper("url");
        $this->load->model("hr_model");
        $this->load->library('pear/pear/pager/pager');
        $num_products = $this->hr_model->record_count();
        $pager_options = array(
            'mode'       => 'Sliding',
            'perPage'    => 5,
            'delta'      => 2,
            'totalItems' => $num_products,
        );
        $pager = Pager::factory($pager_options);
        $data['getdata']  = $pager->getPageData();
        $data['links'] = $pager->getLinks();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/hr/list',$data);
        $this->load->view('admin/foot');*/
    }

    public function add(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->view('admin/head',$data);
        $this->load->view('admin/hr/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            $mjob = $this->input->post('hr_job');
            $mname = $this->input->post('hr_name');
            $mphone = $this->input->post('hr_phone');
            $mqq = $this->input->post('hr_qq');
            $memail = $this->input->post('hr_email');

            $arr = array(
                'hr_job' => $mjob,
                'hr_name' => $mname,
                'hr_phone' => $mphone,
                'hr_qq' => $mqq,
                'hr_email' => $memail
            );
            $this->load->model('hr_model', 'hr');
            $this->hr->add($arr);
        }
    }

    public function delete(){

        $this->load->model('hr_model', 'hr');
        $id = $this->input->post('hr_id');
        $this->hr->delete($id);
    }

    public function edithr(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->model('hr_model');
        $data['hr_item']= $this->hr_model->edithr();
        $this->load->view('admin/head',$data);
        $this->load->view('admin/hr/edit',$data);
        $this->load->view('admin/foot');
    }

    public function deletecheck(){

        $this->load->model('hr_model', 'hr');
        $vid = $this->input->post('hr_id');
        $this->hr->deletecheck($vid);
        redirect('admin/hr','refresh');
    }
    public function hrpost(){

        $this->load->model('hr_model', 'hr');
        $bid = $this->input->post('hr_id');
        $bjob = $this->input->post('hr_job');
        $bname = $this->input->post('hr_name');
        $bphone = $this->input->post('hr_phone');
        $bqq = $this->input->post('hr_qq');
        $bemail = $this->input->post('hr_email');
        $arr = array(
            'hr_job'=>$bjob,
            'hr_name'=>$bname,
            'hr_phone'=>$bphone,
            'hr_qq'=>$bqq,
            'hr_email'=>$bemail
        );
        $this->hr->hrpost($arr,$bid);
        redirect('admin/hr', 'refresh');
    }
}
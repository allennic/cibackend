<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
}

class Profile extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->view('admin/head',$data);
        $this->load->view('admin/profile');
        $this->load->view('admin/foot');

        if ($this->input->is_ajax_request()) {
            $usern = $data['username'];
            $pwd2 = $this->input->post('password2');
            $this->load->model('profile_model', 'pro');

            $this->pro->changpasswrd($pwd2,$usern);
        }

    }
}
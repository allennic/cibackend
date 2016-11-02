<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/8
 * Time: 10:53
 */
class My_controller extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/admin/index', 'refresh');
        }
    }
    /*function isLogin(){

        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            //$this->load->view('admin/home_view', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('admin/admin/index', 'refresh');
        }
    }*/
}
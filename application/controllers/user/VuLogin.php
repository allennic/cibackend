<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/27
 * Time: 18:01
 */

class VuLogin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vu_model','',TRUE);
    }

    function index()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            redirect('user/UserReg/index', 'refresh');
        }
        else
        {
            //Go to private area
            redirect('user/uindex', 'refresh');

        }
        echo $this->form_validation->run();

    }

    function check_database($password)
    {
        $this->load->library('redis1');


        $redis = $this->redis1->config();
        $sessHandler = $this->redis1->handle();

        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->Vu_model->login($username, $password);
        $authsecret = $this->Vu_model->getrand();
        //print_r($result);

        if($result)
        {
            foreach($result as $q)
            {
                $user_id =$q['user_id'];
                $username = $q['username'];
                //$redis->incr("user_id",$user_id);
                $set = $redis->hset('users',$username,$user_id);
                $hmset = $redis->hmset("uid:$user_id",
                    "username",$username,
                    "auth",$authsecret,
                    "low",1);
                $set1 = $redis->hset("auths",$authsecret,$user_id);

                setcookie("auth",$authsecret,time()+7200);

                session_set_save_handler($sessHandler);
                session_start();
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return FALSE;
        }
    }
}
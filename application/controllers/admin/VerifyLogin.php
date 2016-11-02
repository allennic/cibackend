<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model','',TRUE);
    }

    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            redirect('admin/admin/index', 'refresh');
        }
        else
        {
            //Go to private area
            redirect('admin/home', 'refresh');

        }

    }

    function check_database($password)
    {
        $this->load->library('redis1');


        $redis = $this->redis1->config();
        $sessHandler = $this->redis1->handle();

        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->admin_model->login($username, $password);

        $authsecret = $this->admin_model->getrand();

        if($result)
        {
            //$sess_array = array();
            foreach($result as $q)
            {
                /*$sess_array = array(
                    'user_id' => $row->user_id,
                    'username' => $row->username
                );
                //$this->session->set_userdata('logged_in', $sess_array);
                */


                $user_id =$q['user_id'];
                $username = $q['username'];
                //$redis->incr("user_id",$user_id);
                $set = $redis->hset('users',$username,$user_id);
                $hmset = $redis->hmset("uid:$user_id",
                    "username",$username,
                    "auth",$authsecret,
                    "suproot",1);
                $set1 = $redis->hset("auths",$authsecret,$user_id);

                setcookie("auth",$authsecret,time()+1800);


                //$this->session->set_userdata('user_id',$q['user_id']);
                //$this->session->set_userdata('user_name',$username);
                //$this->session->set_userdata('group_id',$q['group_id']);
                //session_start();



                session_set_save_handler($sessHandler);
                session_start();

                //$_SESSION['test'] = "test";
                //$w = $sessHandler->write($session_id,$session_data);
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
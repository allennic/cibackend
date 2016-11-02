<?php

class UserReg extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->view('user/ulogin');
    }

    function test(){
        $this->load->library('redis1');

        $redis = $this->redis1->config();

        //$set = $this->redis->set('data1', 'hello');

        //$get = $this->redis->get('data1');
        $a='hello';
        $b=1;
        $set = $redis->hset('data2',$a,$b);

        $get = $redis->hget('data2',$a);

        echo $get;
    }
}
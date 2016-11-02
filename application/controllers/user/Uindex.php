<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/27
 * Time: 18:07
 */
class Uindex extends CI_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;
        //$this->load->view('admin/home_view',$data);

        $this->load->model('Vu_model','',TRUE);
        $ret = $this->Vu_model->authuser($user_id);

        foreach($ret as $out){
            $depart= $out['depart'];//哪个部门
            $departnum = $out['departnum'];//部门人员编号
        }
        switch($depart){
            case 1:
                $data['web_item']= $this->Vu_model->u1($departnum);
                $this->load->view('user/uindex', $data);
                break;
            case 2:
                $data['web_item']= $this->Vu_model->u2($departnum);
                $this->load->view('user/uindex', $data);
                break;
            case 3:
                $data['web_item']= $this->Vu_model->u3($departnum);
                $this->load->view('user/uindex', $data);
                break;
            case 4:
                $data['web_item']= $this->Vu_model->u4($departnum);
                $this->load->view('user/uindex', $data);
                break;
            case 5:
                $data['web_item']= $this->Vu_model->u5($departnum);
                $this->load->view('user/uindex', $data);
                break;
            case 6:
                $data['web_item']= $this->Vu_model->u6($departnum);
                $this->load->view('user/uindex', $data);
                break;
            case 7:
                $data['web_item']= $this->Vu_model->u7($departnum);
                $this->load->view('user/uindex', $data);
                break;
        }
    }

    function logout()
    {
        //$this->session->unset_userdata('logged_in');
        session_start();
        session_destroy();
        redirect('user/userreg/index', 'refresh');
    }

    function attend(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;
        $this->load->model('Vu_model','',TRUE);

        $this->load->model('attend_model', 'atd');

        $ret = $this->Vu_model->authuser($user_id);
        //print_r($ret);
        //exit;
        foreach($ret as $out){
            $depart= $out['depart'];//哪个部门
            $departnum = $out['departnum'];//部门人员编号
        }

        $data['qret']=$this->atd->hand2($depart,$departnum);
        //echo $data['qret'];exit;
        //print_r($data['qret']);
        //exit;
        //var_dump($data['qret']);
        //exit;

        //$this->load->view('user/attendance', $data);

        $this->load->view('user/uhead',$data);
        $this->load->view('user/attendance',$data);
        $this->load->view('user/ufoot');
    }

    function attendpost(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);

        $this->load->model('attend_model', 'atd');
        if($date1= $this->input->post('data1post')){
            date_default_timezone_set('UTC');
            $date3= date('m/d/y 09:00');
            if(strtotime($date1) < strtotime($date3)){
                $judge = "正常";
            }else{
                $judge = "迟到";
            }
            $this->load->model('Vu_model','',TRUE);
            $ret = $this->Vu_model->authuser($user_id);

            foreach($ret as $out){
                $depart= $out['depart'];//哪个部门
                $departnum = $out['departnum'];//部门人员编号
            }
            $arr = array(
                'depart'=>$depart,
                'departnum'=>$departnum,
                'work'=>$date1,
                'off'=>'',
                'judge'=>$judge

            );
            $this->atd->hand1($arr);
            redirect('user/uindex/attend', 'refresh');
        }


        if($date2= $this->input->post('data2post')) {
            //echo $date2;
            date_default_timezone_set('UTC');
            $date4 = date('m/d/y 18:00');
            //echo $date4;
            if (strtotime($date2) < strtotime($date4)) {
                $judge = "早退";
            } else {
                $judge = "正常";
            }
            $this->load->model('Vu_model', '', TRUE);
            $ret = $this->Vu_model->authuser($user_id);

            foreach ($ret as $out) {
                $depart = $out['depart'];//哪个部门
                $departnum = $out['departnum'];//部门人员编号
            }
            $arr = array(
                'depart' => $depart,
                'departnum' => $departnum,
                'work' => $date1,
                'off' => $date2,
                'judge' => $judge

            );
            $this->atd->hand1($arr);
            redirect('user/uindex/attend', 'refresh');
        }

        redirect('user/uindex/attend', 'refresh');



        /*$date4= date('m/d/y 18:00');
        if($date1 < $date3){
            $judge = "迟到";
        }else{
            $judge = "正常";
        }
        if($date2 < $date4){
            $judge = "早退";
        }else{
            $judge = "正常";
        }*/





        //print_r($arr);
        //$data['qret']=$this->atd->hand2($depart,$departnum);
        //$this->load->view('user/attendance', $data);

    }
}
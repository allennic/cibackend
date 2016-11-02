<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION)){
    //session_start();
} //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        /*$this->load->library('redis1');
        $r = $this->redis1->config();
        $redis = $this->redis1->handle();
        //$p = $r->keys('*');
        $a = $_COOKIE['PHPSESSID'];
        //print_r($a);
        //foreach($a as $k => $v)
        //$session_data = $r->hget("uid:1","username");
        //echo $session_data;
            //$opense = $redis->open('tcp://127.0.0.1:6379?database=1',$v);
            //echo $opense;
            //echo $v;
        $exi = $r->exists($a);
            //echo $exi;
        //if($opense = $redis->open('tcp://127.0.0.1:6379?database=0',$v))
        //if(isset($aaa))
        if($exi == 1)
        {
            //$session_data = $this->session->userdata('logged_in');
            if (isset($_COOKIE['auth'])) {
                $authcookie = $_COOKIE['auth'];
                if ($user_id = $r->hget("auths",$authcookie)) {
                    if ($r->hget("uid:$user_id","auth") != $authcookie)
                    {
                        echo "<script>alert('账号从另外地点登录,请重新登录');</script>";
                        redirect('admin/admin/index', 'refresh');
                    }
                    else
                    {
                        $session_data = $r->hget("uid:$user_id","username");
                        $data['username'] = $session_data;
                        $this->load->view('admin/home_view', $data);
                    }
                    //loadUserInfo($userid);
                }
            }
        }
        else
        {
            //If no session, redirect to login page
            redirect('admin/admin/index', 'refresh');
        }*/

        /*if(isset($ret))
        //if($get = $redis->hget('uid'))
        {
            //$session_data = $this->session->userdata('logged_in');
            $session_data = $r->hget("uid:1","username");
            $data['username'] = $session_data['username'];
            $this->load->view('admin/home_view', $data);
        }
        else
        {
            //If no session, redirect to login page
            //redirect('admin/admin/index', 'refresh');
        }*/
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;
        $this->load->view('admin/home_view',$data);

    }

    function logout()
    {
        //$this->session->unset_userdata('logged_in');
        session_start();
        session_destroy();
        redirect('admin/admin/index', 'refresh');
    }

    function boss(){

        //$this->load->model('Admin_model');
        //$data['boss_item']= $this->Admin_model->boss();
        //$this->load->view('admin/boss',$data);
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->helper("url");
        $this->load->model("Admin_model");
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "admin/home/boss";
        $config["total_rows"] = $this->Admin_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['boss_item'] = $this->Admin_model->fetch_boss($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view("admin/boss", $data);
    }

    public function delete(){

        $this->load->model('admin_model', 'am');
        $id = $this->input->post('boss_id');
        $this->am->delete($id);
        //redirect('admin/home/boss');
    }

    public function deletecheck(){

        $this->load->model('admin_model', 'am');
        $vid = $this->input->post('boss_id');
        $this->am->deletecheck($vid);
        redirect('admin/home/boss','refresh');
    }

    public function editboss(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        //$gid = $this->uri->segment(4, 0);
        //parse_str($_SERVER[$url], $_GET);

        //$this->load->model('admin_model','am');
        //$gid = $this->input->get('gid');
        //$this->am->editboss($gid);

        $this->load->model('Admin_model');
        $data['boss_item']= $this->Admin_model->editboss();
        $this->load->view('admin/editboss',$data);
    }

    public function bosspost(){

        $this->load->helper('htmlpurifier');
        //$this->htmlpurifier->load('htmlpurifier/library/HTMLPurifier.auto.php');
        //$config = HTMLPurifier_Config::createDefault();
        //$purifier = new HTMLPurifier($config);
        //$clean_html = html_purify($dirty_html);
        $this->load->model('admin_model', 'am');
        $bid = $this->input->post('boss_id');
        $bjob = $this->input->post('boss_job');
        $bname = $this->input->post('boss_name');
        $bphone = $this->input->post('boss_phone');
        $bqq = $this->input->post('boss_qq');
        $bemail = $this->input->post('boss_email');
        //$cbid = $purifier->purify($bid);
        $cbjob = html_purify($bjob);
        $cbname = html_purify($bname);
        $cbphone = html_purify(htmlentities($bphone));
        $cbqq = html_purify($bqq);
        $cbemail = html_purify($bemail);
        $arr = array(
                    'boss_job'=>$cbjob,
                    'boss_name'=>$cbname,
                    'boss_phone'=>$cbphone,
                    'boss_qq'=>$cbqq,
                    'boss_email'=>$cbemail
        );
        $this->am->bosspost($arr,$bid);
        redirect('admin/home/boss', 'refresh');
    }

    public function add(){
        $this->load->library('redis1');
        $r = $this->redis1->config();
        $authcookie = $_COOKIE['auth'];
        $user_id = $r->hget("auths", $authcookie);
        $session_data = $r->hget("uid:$user_id", "username");
        $data['username'] = $session_data;

        $this->load->view('admin/head',$data);
        $this->load->view('admin/add');
        $this->load->view('admin/foot');
        if ($this->input->is_ajax_request()) {
            //$bid = $this->input->post('boss_id');
            $bjob = $this->input->post('boss_job');
            $bname = $this->input->post('boss_name');
            $bphone = $this->input->post('boss_phone');
            $bqq = $this->input->post('boss_qq');
            $bemail = $this->input->post('boss_email');

            $arr = array(
                'boss_job' => $bjob,
                'boss_name' => $bname,
                'boss_phone' => $bphone,
                'boss_qq' => $bqq,
                'boss_email' => $bemail
            );

            $this->load->model('admin_model', 'am');
            $this->am->add($arr);
            redirect('admin/home/boss', 'refresh');
        }
    }


}
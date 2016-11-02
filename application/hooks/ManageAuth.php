<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/10/9
 * Time: 10:37
 */
class ManageAuth{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }


    //public function auth(){
    //    $this->CI->load->helper('url');
    //    if ( preg_match("/admin.*/i", uri_string()) ){
    //        $this->CI->load->library('session');
    //
    //        if( !$this->CI->session->userdata('username') ){
    //            redirect('login');
    //            return;
    //        }
    //    }
    //}

    public function auth()
    {
        $this->CI->load->helper('url');
        if ( preg_match("/admin\/home|\/adver|\/agent|\/finace|\/hr|\/profile|\/tech|\/web.*/i", uri_string()) ){

            $this->CI->load->library('redis1');
            $r = $this->CI->redis1->config();
            $a = $_COOKIE['PHPSESSID'];
            $authcookie = $_COOKIE['auth'];
            $user_id = $r->hget("auths", $authcookie);
            $exi = $r->exists($a);
            if ($exi == 1 && $r->hget("uid:$user_id", "suproot") == 1) {
                if (isset($_COOKIE['auth'])) {
                    $authcookie = $_COOKIE['auth'];
                    if ($user_id = $r->hget("auths", $authcookie)) {
                        if ($r->hget("uid:$user_id", "auth") != $authcookie) {
                            echo "<script>alert('账号从另外地点登录,请重新登录');</script>";
                            redirect('admin/admin/index', 'refresh');
                        }
                        //else {
                            //$session_data = $r->hget("uid:$user_id", "username");
                            //$data['username'] = $session_data;
                            //$this->CI->load->view('admin/home_view', $data);
                            //$this->load->view('admin/head',$data);
                            //$this->load->view('admin/profile');
                            //$this->load->view('admin/foot');
                        //}
                    }
                }
            }
            else
            {

                echo "<script>
                    alert('不能越权访问!!!');

                    </script>";
                //header("location:admin/index");
                //exit;


                redirect('admin/admin/index');
            }

            /*

            $this->CI->load->library('session');
            if($this->CI->session->userdata('user_id') && $this->CI->session->userdata('user_name') && $this->CI->session->userdata('group_id'))
            {
                $session_data = $this->session->userdata('user_name');
                $data['username'] = $session_data['user_name'];
                //$this->load->view('user/uindex', $data);
            }
             */
        }

        if ( preg_match("/user\/uindex|\/send|\/message|\/vacate.*/i", uri_string()) ){
            $this->CI->load->library('redis1');
            $r = $this->CI->redis1->config();
            $a = $_COOKIE['PHPSESSID'];
            $authcookie = $_COOKIE['auth'];
            $user_id = $r->hget("auths", $authcookie);
            $exi = $r->exists($a);
            if ($exi == 1 && $r->hget("uid:$user_id", "low") == 1) {
                if (isset($_COOKIE['auth'])) {
                    $authcookie = $_COOKIE['auth'];
                    if ($user_id = $r->hget("auths", $authcookie)) {
                        if ($r->hget("uid:$user_id", "auth") != $authcookie) {
                            echo "<script>alert('账号从另外地点登录,请重新登录');</script>";
                            redirect('user/UserReg/index', 'refresh');
                        }
                        //else {
                        //$session_data = $r->hget("uid:$user_id", "username");
                        //$data['username'] = $session_data;
                        //$this->CI->load->view('admin/home_view', $data);
                        //$this->load->view('admin/head',$data);
                        //$this->load->view('admin/profile');
                        //$this->load->view('admin/foot');
                        //}
                    }
                }
            }
            else
            {

                echo "<script>
                    alert('不能越权访问!!!');
                    </script>";

                //header("location:UserReg/index");


                redirect('user/UserReg/index');
            }
        }

    }

}
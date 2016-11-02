<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/3
 * Time: 11:17
 */
class Fend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mid_model');

    }

    public function index($page = 'mid')
    {
        if ( ! file_exists(APPPATH.'/views/front/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->load->model('Mid_model');

        $data['data_item']= $this->Mid_model->get_data();
        //print_r($data['data']);
        //$news = $this->Mid_model->get_data();
        //$data['job_name'] = $news['job_name'];
        //$data['label'] = $news['label'];

        $this->load->view('front/top', $data);
        $this->load->view('front/'.$page, $data);
        $this->load->view('front/foot', $data);
    }
}
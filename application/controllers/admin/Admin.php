<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/6
 * Time: 09:28
 */
 class Admin extends CI_Controller{

     public function __construct(){

         parent::__construct();
     }

     public function index(){

         $this->load->helper(array('form'));
         $this->load->view('admin/header');
     }


 }
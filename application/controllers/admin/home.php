<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/11/15
 * Time: 4:37 PM
 */
class home extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/LoginController/login','refresh');
        }
    }

    public function index()
    {
        $this->load->view('admin/index');
    }
}
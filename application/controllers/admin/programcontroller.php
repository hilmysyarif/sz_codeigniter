<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/14/15
 * Time: 12:35 AM
 */
class programcontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/LoginController','refresh');
        }
    }


}
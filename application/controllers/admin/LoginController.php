<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/30/15
 * Time: 1:28 AM
 */

class LoginController extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function Index(){
        $this->load->view('admin/login');
    }

    public function login(){
        $username=$this->input->post('username');
        $password=md5($this->input->post('password'));

        $data=$this->db->where('username',$username)->where('password',$password)->get('user')->result();
        if(count($data)>0){

            $sess_array=array(
                'username'=>$username
            );
            $this->session->set_userdata('logged_in', $sess_array);
            $this->load->view('admin/index');

        } else{
            $this->session->set_flashdata('failure','Invalid User');
            redirect('admin/LoginController');
        }
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        redirect('admin/LoginController');
    }

     public function change(){
         $this->load->view('admin/password_change');
     }

    /**
     * Update password
    */

    public function update(){

        $data=$this->db->where('password',md5($this->input->post('old')))->get('user')->result();
        if(count($data)>0){
            if($this->input->post('new')!=$this->input->post('confirm')){
                $this->session->set_flashdata('error','New and Confirm Password  Not Matched');
                redirect('admin/LoginController/change');
            } else {
                  $this->db->update('user',array(
                      'password'=>md5($this->input->post('new'))
                  ),array(
                      'password'=>md5($this->input->post('old'))
                  ));

                $this->session->set_flashdata('success','Password Successfully changed');
                redirect('admin/LoginController/change');
            }
        } else {
            $this->session->set_flashdata('error','Old Password Not Matched');
            redirect('admin/LoginController/change');
        }
    }
}
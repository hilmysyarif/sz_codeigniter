<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/14/15
 * Time: 12:33 AM
 */
class mediacontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/LoginController','refresh');
        }
    }

    /**
     * load media page from admin/media.php
     * */
    public function index()
    {
        $this->load->view('admin/media');
    }


    /**
     * show all media news with returning json data
     * asynchronous request
     * */
    public function media()
    {
        $data = $this->db->order_by('id')->get('media')->result();
        echo json_encode($data);
    }

    /**
     * load media_add.php page to add media news
     * */
    public function media_add_view()
    {
        $this->load->view('admin/media_add');
    }

    public function media_add()
    {
        /**
         * save to media posted data into media table using array
         * */
        $data = array(
            'link' => $this->input->post('link'),
            'description' => $this->input->post('description')
        );

        $this->db->insert('media', $data);
        $this->session->set_flashdata('success', 'Data Successfully Inserted');
        redirect('admin/mediacontroller/media_add_view');
    }

    /**
     * delete media news using id
     * @parme id
     * */
    public function media_delete($id)
    {

        $this->db->where('id', $id)->delete('media');
    }

}
<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/14/15
 * Time: 12:33 AM
 */
class NewsController extends CI_Controller
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
        $this->load->view('admin/news');
    }


    /**
     * show all media news with returning json data
     * asynchronous request
     * */
    public function news()
    {
        $data = $this->db->order_by('id')->get('news')->result();
        echo json_encode($data);
    }

    /**
     * load media_add.php page to add media news
     * */
    public function news_add_view()
    {
        $this->load->view('admin/news_add');
    }

    public function news_add()
    {
        /**
         * save to media posted data into media table using array
         * */
        $data = array(
            'link' => $this->input->post('link'),
            'description' => $this->input->post('description')
        );

        $this->db->insert('news', $data);
        $this->session->set_flashdata('success', 'Data Successfully Inserted');

        /*Redirecting to news_add_view*/
        redirect('admin/NewsController/news_add_view');
    }

    /**
     * delete media news using id
     * @parme id
     * */
    public function news_delete($id)
    {

        $this->db->where('id', $id)->delete('news');
    }

}
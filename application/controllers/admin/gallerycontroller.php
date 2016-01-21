<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/11/15
 * Time: 4:37 PM
 */
class gallerycontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(($this->session->userdata('logged_in'))){
            $this->load->model('gallery');
        } else {
            redirect('admin/LoginController','refresh');
        }

    }

    public function index()
    {
        $this->load->view('admin/photo');
    }

    public function getalbum()
    {
        $data = $this->db->query('select count(p.id) as count,a.id,a.name from album a left join photo p on p.album_id=a.id group by a.id');
        if ($data->num_rows > 0) {
            echo json_encode($data->result());
        } else {

            echo json_encode(array('status' => 'empty'));
        }
    }

    /**
     * create album
     */
    public function createalbum()
    {
        $this->gallery->create_album();
    }

    /**
     * update album
     */

    public function update_album()
    {
        $this->gallery->update_album();
    }

    /**
     * delete album
     */

    public function album_delete()
    {
        $this->gallery->album_delete();
    }

    /**
     * load upload photo page
     */

    public function load_photo_page()
    {
        $data['album'] = $this->db->query('select * from album')->result();
        $this->load->view('admin/upload_photo', $data);
    }

    public function photo_upload()
    {
        $this->gallery->photo_upload();
        redirect('admin/gallerycontroller/load_photo_page');

    }

    public function view_photos($id)
    {

        $this->db->where('album_id', $id);
        $data['photos'] = $this->db->get('photo')->result();

        $this->db->where('id', $id);
        $data['album'] = $this->db->get('album')->row();

        $this->load->view('admin/view_photos', $data);
    }


    /**
     * delete photo
     */

    public function delete_photo($id)
    {

        $data = $this->db->where('id', $id)->get('photo')->row();
        $this->db->where('id', $id);
        $this->db->delete('photo');
        $this->session->set_flashdata('success', 'Image successfully deleted');
        redirect('admin/gallerycontroller/view_photos/' . $data->album_id);

    }

    /**
     * load update photo page
     */
    public function edit_photo_view($id)
    {
        $data['photo'] = $this->db->where('id', $id)->get('photo')->row();
        $data['album'] = $this->db->where('id', $data['photo']->album_id)->get('album')->row();
        $data['albums'] = $this->db->get('album')->result();
        $this->load->view('admin/update_photo', $data);
    }

    /**
     * update done
     */
    public function update_photo_done()
    {
        $this->gallery->update_photo();
        redirect('admin/gallerycontroller/edit_photo_view/' . $this->input->post('id'));
    }

}
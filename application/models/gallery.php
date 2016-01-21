<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/12/15
 * Time: 8:32 PM
 */
class gallery extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * create album
     */
    public function create_album()
    {

        $data = json_decode(file_get_contents('php://input'));
        $this->name = $data->name;
        $this->db->insert('album', $this);
    }

    /**
     *  delete album
     */

    public function album_delete()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->db->where('id', $data->id);
        $this->db->delete('album');
    }


    /**
     * upload photo
     */

    public function photo_upload()
    {

        $this->load->library('upload');
        $files = $_FILES;
        $count = count($_FILES['files']['name']);
        for ($i = 0; $i < $count; $i++) {
            $_FILES['files']['name'] = $files['files']['name'][$i];
            $_FILES['files']['type'] = $files['files']['type'][$i];
            $_FILES['files']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['files']['error'] = $files['files']['error'][$i];
            $_FILES['files']['size'] = $files['files']['size'][$i];
            $config = $this->set_upload_options();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('files') == False) {
                $this->session->set_flashdata('failure', $this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $this->title = $this->input->post('title');
                $this->album_id = $this->input->post('album_id');

                $this->file = $data['file_name'];
                $this->db->insert('photo', $this);
            }
        }
        $this->session->set_flashdata('success', 'All the images has successfully uploaded,thanks');
    }

    private function set_upload_options()
    {
        $config = array();
        $config['upload_path'] = './web/admin/upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        $config['file_name'] = md5(uniqid("100_ID", true));
        return $config;
    }


    function update_album()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->name = $data->name;
        $this->db->update('album', $this, array('id' => $data->id));
    }

    /*update photo*/
    public function update_photo()
    {
        if (!empty($_FILES['file']['name'])) {

            $this->load->library('upload');
            $config = $this->set_upload_options();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file') == False) {

                $this->session->set_flashdata('failure', $this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $this->title = $this->input->post('title');
                $this->album_id = $this->input->post('album_id');
                $file_name = $data['file_name'];
                $this->file =  $data['file_name'];
                $this->db->update('photo', $this, array('id' => $this->input->post('id')));
                $this->session->set_flashdata('success', 'Image Successfully updated');
            }
        } else {
            $this->title = $this->input->post('title');
            $this->album_id = $this->input->post('album_id');
            $this->db->update('photo', $this, array('id' => $this->input->post('id')));
            $this->session->set_flashdata('success', 'Image Successfully updated');
        }
    }
}
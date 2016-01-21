<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/14/15
 * Time: 12:36 AM
 */
class case_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/LoginController','refresh');
        }
    }

    public function index()
    {
        $this->load->view('admin/case');
    }

    /*
     * asynchronous request
     * load special case in descending order
     * */

    public function cases()
    {
        $data = $this->db->order_by('id', 'desc')->get('cases')->result();
        echo json_encode($data);
    }

    /*
     * load add view
     * case table
     * */
    public function case_add_view()
    {
        $this->load->view('admin/case_add');
    }


    /*
     * add special case with image in
     * Cases table
     * */
    public function case_add()
    {
        $config['upload_path'] = './web/admin/upload';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = md5(uniqid('100_ID', true));
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->library->display_error();
            $this->session->set_flashdata('error', $error);
        } else {
            $data = $this->upload->data();
            $content = array(
                'name' => $this->input->post('name'),
                'file' => $data['file_name'],
                'description' => $this->input->post('description'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address')
            );
            $this->db->insert('cases', $content);
            $this->session->set_flashdata('success', 'data success fully inserted');
        }

        redirect('admin/case_controller/case_add_view');
    }

    /*
     * load case edit  view
     * */

    public function case_edit_view($id)
    {
        $data['data'] = $this->db->where('id', $id)->get('cases')->row();
        $this->load->view('admin/case_edit', $data);
    }

    /*
     * edit special case with image in
     * Cases table
     * */

    public function case_edit()
    {
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './web/admin/upload';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = md5(uniqid('100_ID', true));
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = $this->library->display_error();
                $this->session->set_flashdata('error', $error);
            } else {
                $data = $this->upload->data();
                $content = array(
                    'name' => $this->input->post('name'),
                    'file' => $data['file_name'],
                    'description' => $this->input->post('description'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'address' => $this->input->post('address')
                );
                $this->db->update('cases', $content, array('id' => $this->input->post('id')));
                $this->session->set_flashdata('success', 'data success fully inserted');
            }
        } else {
            $content = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address')
            );
            $this->db->update('cases', $content, array('id' => $this->input->post('id')));
            $this->session->set_flashdata('success', 'data success fully inserted');
        }

        redirect('admin/case_controller/case_edit_view/' . $this->input->post('id'));
    }

    /*
     * Delete special case with image from
     * Cases table
     * */

    public function case_delete($id)
    {
        $this->db->where('id', $id)->delete('cases');
    }

    /*
     * case view on model on case.php page
     * by id using asynchronous request
     * */
    public function case_view($id)
    {
        $data = $this->db->where('id', $id)->get('cases')->row();
        echo json_encode($data);
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/14/15
 * Time: 12:33 AM
 */
class partner_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/LoginController','refresh');
        }
    }

    /*load partner page which contain the only partner type list */
    public function index()
    {
        $this->load->view('admin/partner');
    }

    /*
     * request : angular http
     * To show link of partner through angular http request
     * */

    public function partner()
    {
        $data = $this->db->query('select count(p.id) as count,l.id,l.name from partner l left join partner_link p on p.partner_id=l.id group by l.id');
        if ($data->num_rows > 0) {
            echo json_encode($data->result());
        }
    }

    /*
     * request : angular http
     * To add partner through angular http request data
     * */

    public function partner_add()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->db->insert('partner', $data);
    }

    /*
     * request : angular http
     * To Delete partner through angular http request data
     * */

    public function partner_delete($id)
    {
        $this->db->where('id', $id)->delete('partner');
    }

    /*
     * request : angular http
     * To Edit partner through angular http request data
     * */

    public function partner_edit()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->db->update('partner', array('name' => $data->name), array('id' => $data->id));
    }


    /*
     * request : synchronous http
     * To show link of partner
     * param $id partner id
     * */

    public function partner_link($id)
    {
        $data['partner'] = $this->db->where('id', $id)->get('partner')->row();
        $data['partner_data'] = $this->db->where('partner_id', $id)->get('partner_link')->result();
        $this->load->view('admin/partner_link', $data);
    }

    /*
     * request : synchronous http
     * Load view to add partner link
     * param $id partner_link id
     * */

    public function partner_link_add_view()
    {
        $data['partners'] = $this->db->get('partner')->result();
        $this->load->view('admin/partner_link_add', $data);
    }

    /*
     * request : synchronous http
     * To Add link of partner and partner logo image     *
     * */

    public function partner_link_add()
    {

        $config['upload_path'] = "./web/admin/upload";
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = md5(uniqid("100_ID", true));
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            /*send error to view */
            $this->session->set_flashdata('failure', $this->upload->display_errors());
        } else {

            $data = $this->upload->data();
            $content = array(
                'partner_id' => $this->input->post('partner_id'),
                'link' => $this->input->post('link'),
                'file' => $data['file_name']
            );
            $this->db->insert('partner_link', $content);
            $this->session->set_flashdata('success', 'Image Successfully Uploaded');
        }
        redirect('admin/partner_controller/partner_link_add_view');
    }

    /*
     * request : synchronous http
     * Load edit view of partner_link
     * param $id partner_link id
     * */

    public function partner_link_edit_view($id)
    {
        $data['partner'] = $this->db->where('id', $id)->get('partner_link')->row();
        $data['partners'] = $this->db->get('partner')->result();
        $this->load->view('admin/partner_link_edit', $data);
    }

    /*
     * request : synchronous http
     * Edit view of partner_link
     * */

    public function partner_link_edit()
    {
        if (!empty($_FILES['file']['name'])) {

            $this->load->library('upload');
            $config['upload_path'] = './web/admin/upload';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = md5(uniqid("100_ID", true));
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file') == False) {

                $this->session->set_flashdata('failure', $this->upload->display_errors());
            } else {
                $data = $this->upload->data();
                $this->link = $this->input->post('link');
                $this->partner_id = $this->input->post('partner_id');
                $file_name = $data['file_name'];
                $this->file = $file_name;
                $this->db->update('partner_link', $this, array('id' => $this->input->post('id')));
                $this->session->set_flashdata('success', 'Image Successfully updated');
            }
        } else {
            $this->link = $this->input->post('link');
            $this->partner_id = $this->input->post('partner_id');
            $this->db->update('partner_link', $this, array('id' => $this->input->post('id')));
            $this->session->set_flashdata('success', 'Image Successfully updated');
        }
    }


    /*
     * request : synchronous http
     * To Delete link of partner
     * param $id partner_link id
     * */

    public function partner_link_delete($id)
    {
        $data = $this->db->where('id', $id)->get('partner_link')->row();
        $this->db->where('id', $id)->delete('partner_link');
        $this->session->set_flashdata('Deleted', 'Images Successfully Deleted');
        redirect('admin/partner_controller/partner_link/' . $data->partner_id);
    }


}
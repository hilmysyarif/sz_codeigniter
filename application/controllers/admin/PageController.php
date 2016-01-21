<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/21/15
 * Time: 11:50 PM
 */
class PageController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/LoginController','refresh');
        }
    }
    public function page($id)
    {
        $data['category'] = $this->db->where('id', $id)->get('category')->row();
        $this->load->view('admin/page', $data);
    }

    /*
     * load page category
     * asynchronous request
     * */

    public function page_category($id)
    {
        $data = $this->db->query('select count(p.id) as count,c.id,c.name from category c left join pages p on p.c_id=c.id where c.parent!=0 && c.parent="' . $id . '" group by c.id');
        if ($data->num_rows > 0) {
            echo json_encode($data->result());
        }

    }

    /*
     *add sub page
     */

    public function page_category_add()
    {
        $data = json_decode(file_get_contents('php://input', true));
        $this->db->insert('category', $data);
    }

    public function page_category_delete($id)
    {
        $this->db->where('id', $id)->delete('category');
    }

    public function page_category_update()
    {
        $data = json_decode(file_get_contents('php://input'));
        print_r($data);
        $this->db->update('category', array('name' => $data->name), array('id' => $data->id));
    }

    public function page_add_view($id)
    {
        $data['sub_category'] = $this->db->where('parent', $id)->get('category')->result();
        $data['page'] = $this->db->where('id', $id)->get('category')->row();
        $this->load->view('admin/page_add', $data);
    }

    /*editor image upload*/
    public function upload()
    {
        $config['upload_path'] = "./web/admin/upload";
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = md5(uniqid("100_ID", true));
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {

        } else {

            $data = $this->upload->data();
            $array = array(
                'filelink' => base_url('web/admin/upload') . '/' . $data['file_name']
            );
            echo json_encode($array);


        }
    }

    /*page add*/
    public function page_add()
    {
        $data = array(
            'c_id' => $this->input->get('category'),
            'title' => $this->input->get('title'),
            'description' => $this->input->get('description'),
        );

        $this->db->insert('pages', $data);
        $this->session->set_flashdata('success', 'Data Successfully Inserted');
        redirect('admin/PageController/page_add_view/' . $this->input->get('id'));
    }

    public function page_list($id)
    {
        $data['category'] = $this->db->where('id', $id)->get('category')->row();
        $data['pages'] = $this->db->where('c_id', $id)->get('pages')->result();
        $this->load->view('admin/page_list', $data);
    }

    /*page edit view*/
    public function page_edit_view($id)
    {
        $data['page'] = $this->db->where('id', $id)->get('pages')->row();
        $content = $this->db->where('id', $data['page']->c_id)->get('category')->row();

        $data['sub_category'] = $this->db->where('parent', $content->parent)->get('category')->result();
        $this->load->view('admin/page_edit', $data);
    }

    public function page_edit()
    {
        $data = array(
            'c_id' => $this->input->get('category'),
            'title' => $this->input->get('title'),
            'description' => $this->input->get('description'),
        );

        $this->db->update('pages', $data, array('id' => $this->input->get('id')));
        $this->session->set_flashdata('success', 'Data Successfully updated');
        redirect('admin/PageController/page_edit_view/' . $this->input->get('id'));
    }

    public function page_view($id)
    {
        $data['page'] = $this->db->where('id', $id)->get('pages')->row();
        $data['category'] = $this->db->where('id', $data['page']->c_id)->get('category')->row();
        $this->load->view('admin/page_view', $data);
    }

    public function page_delete($id)
    {
        $data = $this->db->where('id', $id)->get('pages')->row();
        $this->db->where('id', $id)->delete('pages');
        $this->session->set_flashdata('success', 'Page Successfully Deleted');
        redirect('admin/PageController/page_list/' . $data->c_id);
    }


}
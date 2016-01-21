<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/14/15
 * Time: 12:31 AM
 */
class videocontroller extends CI_Controller
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
        $this->load->view('admin/video_album');
    }

    /*get all albums */
    public function get_albums()
    {
        $data = $this->db->query('select count(v.album_id) as count,a.id,a.name from video_album a left join video v on  a.id=v.album_id group by v.album_id');
        if ($data->num_rows > 0) {
            echo json_encode($data->result());
        } else {

            echo json_encode(array('status' => 'empty'));
        }
    }

    /*add album*/
    public function add_album()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->db->insert('video_album', $data);
    }


    /**
     *  album update
     */
    public function album_update()
    {
        $data = json_decode(file_get_contents('php://input'));
        $content = array(
            'name' => $data->name
        );
        $this->db->update('video_album', $content, array('id' => $data->id));
    }


    /**
     *   album delete
     */

    public function album_delete()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->db->where('id', $data->id)->delete('video_album');
    }

    /**
     * add video view
     */

    public function add_video_view()
    {
        $data['albums'] = $this->db->get('video_album')->result();
        $this->load->view('admin/add_video', $data);
    }

    /**
     * add youtube url
     * */

    public function add_video()
    {

        $url = $this->input->post('url');
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        $data = array(
            'title' => $this->input->post('title'),
            'link' => $query['v'],
            'url' => $url,
            'album_id' => $this->input->post('album_id')
        );

        $this->db->insert('video', $data);
        $this->session->set_flashdata('success', 'Video Successfully uploaded');
        redirect('admin/videocontroller/add_video_view');

    }

    /*
     * video list
     * */
    public function video_list($id)
    {

        $data['videos'] = $this->db->where('album_id', $id)->get('video')->result();
        $data['album'] = $this->db->where('id', $id)->get('video_album')->row();
        $this->load->view('admin/video_list', $data);
    }

    /**
     * delete video
     */

    public function delete_video($id)
    {
        $data = $this->db->where('id', $id)->get('video')->row();
        $this->db->where('id', $id)->delete('video');

        $this->session->set_flashdata('success', 'video successfully deleted');
        redirect('admin/videocontroller/video_list/' . $data->album_id);
    }

}
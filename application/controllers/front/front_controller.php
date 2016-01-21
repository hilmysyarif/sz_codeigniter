<?php

/**
 * Created by PhpStorm.
 * User: john
 * Date: 5/17/15
 * Time: 9:47 PM
 */
class front_controller extends CI_Controller
{

    /*load front index page*/
    public function index()
    {
//        $data['media']=$this->db->order_by('id','desc')->get('media')->result();
//        $this->load->view('front/index',$data);


    }

    /*
     * About us page
     * view front/about
     */
    public function about()
    {
        $this->load->view('front/about');
    }

    /**
     * About page Category
     */
    public function about_category()
    {
        $data['category'] = $this->db->where('parent', '2')->get('category')->result();
        foreach ($data['category'] as $row) {
            $data['content'] = $this->db->where('c_id', $row->id)->get('pages')->row();
            break;
        }
        echo json_encode($data);
    }

    /**
     * about pages sub category & content
     */
    public function about_sub_cat($id)
    {
        $data = $this->db->where('c_id', $id)->get('pages')->result();
        echo json_encode($data);
    }


    public function program()
    {
        $this->load->view('front/program');
    }

    /**
     * program page Category
     */

    public function program_category()
    {
        $data['category'] = $this->db->where('parent', '1')->get('category')->result();
        foreach ($data['category'] as $row) {
            $data['content'] = $this->db->where('c_id', $row->id)->get('pages')->row();
            break;
        }
        echo json_encode($data);
    }

    /**
     * program pages sub category & content
     */

    public function program_sub_cat($id)
    {
        $data = $this->db->where('c_id', $id)->get('pages')->result();
        echo json_encode($data);
    }

    /**
     * media & news are two diff tables
     * one for media and other for news
     * but both have to show on one page
     */

    public function media()
    {
        $this->load->view('front/media');
    }

    /**
     * media content from media
     */

    public function media_news()
    {
        $data = $this->db->get('media')->result();
        echo json_encode($data);
    }

    /**
     * Salaam Zindagi News
     */

    public function news()
    {
        $data = $this->db->get('news')->result();
        echo json_encode($data);
    }

    /**
     * Partner
     */

    public function partner()
    {
        $this->load->view('front/partner');
    }

    public function partner_list()
    {
        $data['partners'] = $this->db->order_by('id', 'asc')->get('partner')->result();
        foreach ($data['partners'] as $row) {
            $data['list_content'] = $this->db->where('partner_id', $row->id)->get('partner_link')->result();
            $data['title'] = $this->db->where('id', $row->id)->get('partner')->row();
            break;
        }
        echo json_encode($data);

    }

    public function partner_img($id)
    {
        $data['list_content'] = $this->db->where('partner_id', $id)->get('partner_link')->result();
        $data['title'] = $this->db->where('id', $id)->get('partner')->row();
        echo json_encode($data);
    }

    /**
     * Youth page this is static page
     */
    public function youth()
    {
        $this->load->view('front/youth');
    }

    /**
     * contact us page
     */
    public function contact()
    {
        $this->load->view('front/contact');
    }

    /**
     * footer Links
     * */

    public function footer()
    {
        $data = $this->db->where('parent', '1')->get('category')->result();
        echo json_encode($data);
    }

    /**
     * Special case
     */

    public function special_case()
    {
        $data = $this->db->get('cases')->result();
        echo json_encode($data);
    }

    public function special_case_content($id)
    {
        $data['case'] = $this->db->where('id', $id)->get('cases')->row();
        $this->load->view('front/special_case', $data);
    }

    /**
     * Join As Individual
     */
    public function individual()
    {
        $this->load->view('front/join_as_individual');
    }

    public function organisation()
    {
        $this->load->view('front/organisation');
    }

    /**
     * Images
    */

    public function gallery_index(){
        $data=$this->db->get('photo',12)->result();
        echo json_encode($data);
    }

    /**
     *  Gallery Page
    */
    public function gallery(){
        $this->load->view('front/gallery');
    }

    /**
     * get Albums on gallery page
    */
    public function gallery_album(){
        $data['albums']=$this->db->order_by('id','desc')->get('album')->result();
        foreach($data['albums'] as $row){
            $data['photos']=$this->db->where('album_id',$row->id)->get('photo')->result();
            break;
        }
        echo json_encode($data);
    }

    public function album_photos($id){
        $data['photos']=$this->db->where('album_id',$id)->get('photo')->result();
        $data['albums']=$this->db->where('id',$id)->get('album')->row();
        echo json_encode($data);
    }

    /**
     * media link
    */
    public function media_index(){
        $data=$this->db->order_by('id','desc')->get('media')->result();
        echo json_encode($data);
    }

    public function program_index(){
        $data=$this->db->where('parent','1')->get('category')->result();
        foreach($data as $row){
            $content=$this->db->where('c_id',$row->id)->get('pages')->row();
            $row->description=$content->Description;
        }
        echo json_encode($data);
    }

    /**
     * Video page
     */

    public function video(){
        $this->load->view('front/video');
    }

    /**
     * get Albums on gallery page
     */
    public function video_album(){
        $data['albums']=$this->db->order_by('id','desc')->get('video_album')->result();
        foreach($data['albums'] as $row){
            $data['photos']=$this->db->where('album_id',$row->id)->get('video')->result();
            break;
        }
        echo json_encode($data);
    }

    public function video_list($id){
        $data['photos']=$this->db->where('album_id',$id)->get('video')->result();
        $data['albums']=$this->db->where('id',$id)->get('video_album')->row();
        echo json_encode($data);
    }

    public function contact_form(){

        $msg='Name: '.$this->input->post('name')."\r\n".' Email: '.$this->input->post('email')."\r\n".'
         Mobile :'.$this->input->post('mobile')."\r\n".' Message :'.$this->input->post('message');
        mail(" info@salaamzindagi.org","Salaam Zindagi Contact Us",$msg);

        $this->session->set_flashdata('success','Thanks to Contact us');
        redirect('front/front_controller/contact');
    }

    /*organistaion form*/
    public function form_organisation(){

        $msg='Name :'.$this->input->post('name');
        $msg.="\r\n".' Establishment year :'.$this->input->post('year');
        $msg.="\r\n".' Social :'.$this->input->post('social');
        $msg.="\r\n".' Chief Functionary :'.$this->input->post('chief');
        $msg.="\r\n".' Website Address :'.$this->input->post('address');
        $msg.="\r\n".' Personal Name :'.$this->input->post('pname');
        $msg.="\r\n".' Email :'.$this->input->post('email');
        $msg.="\r\n".' Designation :'.$this->input->post('designation');
        $msg.="\r\n".' Phone :'.$this->input->post('phone');
        $msg.="\r\n".' Mobile :'.$this->input->post('mobile');
        $msg.="\r\n".' Capacity :'.$this->input->post('capacity');


        mail(" info@salaamzindagi.org","Join As Organisation",$msg);
        $this->session->set_flashdata('success','Thanks For Being a Part Of Salaam Zindagi');
        redirect('front/front_controller/organisation');
    }

    /*individual form*/

    public function form_individual(){

        $msg='Name :'.$this->input->post('name');
        $msg.="\r\n Email".$this->input->post('email');
        $msg.="\r\n Qualification".$this->input->post('qualification');
        $msg.="\r\n Other Qualification".$this->input->post('other');
        $msg.="\r\n location".$this->input->post('location');
        $msg.="\r\n Phone".$this->input->post('phone');
        $msg.="\r\n Mobile".$this->input->post('mobile');
        $msg.="\r\n Capacity".$this->input->post('capacity');
        $msg.="\r\n Remark".$this->input->post('remark');

        mail(" info@salaamzindagi.org","Salaam Zindagi Contact Us",$msg);
        $this->session->set_flashdata('success','Thanks For Being a Part Of Salaam Zindagi');
        redirect('front/front_controller/individual');
    }
}
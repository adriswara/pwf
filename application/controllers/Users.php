<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(! $this->session->userdata('username')) redirect('auth/login');
        if($this->session->userdata('usertype')!='Manager') redirect('welcome');
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }
	public function index()
	{
        $this->load->helper('url');
        $this->load->view('home_menu');
	}
    public function list()
    {
        $data['users']=$this->Users_model->read();
        $this->load->view('user/user_list',$data);
    }
    public function add()
    {
        if($this->input->post('submit')){
            $this->Users_model->create();
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg','<p style="color:green">User Successfully Added !</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">User Add Failed !</p>');
            }
            redirect('users/list');
        }
        $this->load->view('user/user_form');
    }
    public function edit($id)
    {
        if($this->input->post('submit')){
            $this->Users_model->update($id);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg','<p style="color:green">User Successfully Updated !</p>');
            } else {
                $this->session->set_flashdata('msg','<p style="color:red">User Update Failed !</p>');
            }
            redirect('users/list');
        }
        $data['user']=$this->Users_model->read_by($id);
        $this->load->view('user/user_form',$data);
    }
    public function delete($id)
    {
        $this->Users_model->delete($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','<p style="color:green">User Successfully Deleted !</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red">User Delete Failed !</p>');
        }
        redirect('users/list');
    }
    public function reset($userid)
    {
        $user = $this->Users_model->read_by($userid);
        $this->Users_model->reset($userid,$user);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','<p style="color:green">Password Successfully Reset !</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red">Password Reset Failed !</p>');
        }
        redirect('users/list');
    }

    public function upload(){
        $data['users']=$this->Users_model->read();
        $this->load->view('user/form_photo',$data);
    }

}


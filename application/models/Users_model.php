<?php defined('BASEPATH') OR exit('No direct script access allowed ');

class users_model extends CI_Model{
    public function create()
    {
        $data = array (
            'username' => $this->input->post('username'),
            'usertype' => $this->input->post('usertype'),
            'fullname' => $this->input->post('fullname'),
            'password' => password_hash($this->input->post('usertype'), PASSWORD_DEFAULT)
        );
        $this->db->insert('users088', $data);
    }
    public function read()
    {
        $query = $this->db->get('users088');
        return $query->result();
    }
    public function read_by($userid)
    {
        $this->db->where('userid',$userid);
        $query = $this->db->get('users088');
        return $query->row();
    }
    public function update($userid)
    {
        $data = array (
            'username' => $this->input->post('username'),
            'usertype' => $this->input->post('usertype'),
            'fullname' => $this->input->post('fullname')
        );
        $this->db->where('userid',$userid);
        $this->db->update('users088',$data);
    }
    public function delete($userid)
    {
        $this->db->where('userid',$userid);
        $this->db->delete('users088');
    }

    public function reset($userid,$user)
    {
        $this->db->set('password', password_hash($user->usertype, PASSWORD_DEFAULT));
        $this->db->where('userid',$userid);
        $this->db->update('users088');
    } 
    public function validation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('usertype', 'User Type', 'required');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;    
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats_model extends CI_Model {

	public function create()
	{
    $data = array(
        'name' => $this->input->post('name'),
        'type' => $this->input->post('type'),
        'gender' => $this->input->post('gender'),
        'age' => $this->input->post('age'),
        'price' => $this->input->post('price')
    );
    $this->db->insert('cats088',$data);
        

	}
	public function read($limit,$start)
	{
      $this->db->limit($limit,$start);
      $query=$this->db->get('cats088');
      return $query->result();
    }
    
    public function read_by($id)
	{
        $this->db->where('id',$id);
        $query=$this->db->get('cats088');
        return $query->row();
    }
    public function update($id){
        $data = array(
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'gender' => $this->input->post('gender'),
            'age' => $this->input->post('age'),
            'price' => $this->input->post('price')
        );
        $this->db->where('id',$id);
        $this->db->update('cats088',$data);
    }

    public function delete($id){
        $this->db->where('id',$id); 
        $this->db->delete('cats088'); 
    }

    public function validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Cat name','required');
        $this->form_validation->set_rules('type','Cat type','required');
        $this->form_validation->set_rules('gender','Cat gender','required');
        $this->form_validation->set_rules('age','Cat age','required|numeric');
        $this->form_validation->set_rules('price','Cat price','required|numeric');
    
        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }

    public function sale($id){
        $data = array(
            'customer_name' => $this->input->post('customer_name'),
            'customer_address' => $this->input->post('customer_address'),
            'customer_phone' => $this->input->post('customer_phone'),
            'cat_id' => $id
        );
        $this->db->insert('catsales088',$data);

        $this->db->set('sold','1');
        $this->db->where('id',$id);
        $this->db->update('cats088',$sold);
    }

    public function sales(){
        // $query = $this->db->get('catsales088');
        $this->db->select('*');
        $this->db->from('catsales088');
        $this->db->join('cats088','catsales088.cat_id = cats088.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function changephoto($photo,$id){
        // $this->db->select('photo');
        // $this->db->from('cats088');
        $this->db->where('cats088.id',$id );
        $current = $this->db->get('cats088');
        $curphoto = $current->row()->photo;
        if ($curphoto !== 'default.png' ) unlink('./uploads/cats'.$curphoto);    
        $this->db->set('photo' , $photo);
        $this->db->where('id',$id);
        return $this->db->update('cats088');
    }

}

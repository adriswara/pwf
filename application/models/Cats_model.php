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
	public function read()
	{
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
    

}

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
	}
}

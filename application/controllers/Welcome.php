<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	/**
	* 
	* @deprecated
	* 
	*/
	 public function __construct()
	 {
			 parent::__construct();
			 $this->load->library('form_validation');
			 $this->load->model('Cats_model');
			 $this->load->model('Categori_model');
			 // Your own constructor code
	 }

	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->model('Cats_model');

		if(! $this->session->userdata('username')) redirect('auth/login');
		//start
		$this->load->library('pagination');
		//
		$config['base_url'] = site_url('welcome/index');
		$config['total_rows'] = $this->db->count_all('cats088');
		$config['per_page'] = 10;
		//
		$this->pagination->initialize($config);
		//
		$limit=$config['per_page'];
		$start=$this->uri->segment(3)?$this->uri->segment(3):0;
		//
		$data['i']=$start+1;
		$data['cats']=$this->Cats_model->read($limit,$start);
		$this->load->view('cats/cat_list',$data);
		//end
		
		//$this->load->view('home_menu_036');
		


	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->load->model('Cats_model');
			$this->Cats_model->create();
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Cat sucessfully added !');		
			}else {
				$this->session->set_flashdata('msg','Cat gagal added !');		
			}
			redirect('');
		}
		// $this->load->model('Cats_model');
		$data['categori'] = $this->Categori_model->read();
		$this->load->view('cats/cat_form',$data);
	}
	public function edit($id){
		if ($this->input->post('submit')) {
			$this->Cats_model->update($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Cat sucessfully updated !');		
			}else {
				$this->session->set_flashdata('msg','Cat gagal updated !');		
			}
			redirect('');
		}

		// $this->load->model('Cats_model');
		$data['cat']=$this->Cats_model->read_by($id);
		$data['categori'] = $this->Categori_model->read();
		$this->load->view('cats/cat_form',$data);
	}
	public function delete($id){
		$this->Cats_model->delete($id);
		if ($this->db->affected_rows()>0) {
			$this->session->set_flashdata('msg','Cat sucessfully deleted !');		
		}else {
			$this->session->set_flashdata('msg','Cat gagal deleted !');		
		}
		redirect('');
	}

	
	public function sale($id){

		if ($this->input->post('submit')) {
			$this->Cats_model->sale($id);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('msg','Cat Sold Sucess');
			}else {
				$this->session->set_flashdata('msg','Cat Sold Failed');
			}
			redirect('');
		}

		$data['cat']=$this->Cats_model->read_by($id);
		$this->load->view('cats/cat_sales',$data);
	}

	public function sales(){
		$data['sales']=$this->Cats_model->sales();
		$this->load->view('cats/sale_list',$data);
	}
	//controller
	public function changephoto($id){
        // if (! $this->session->userdata('username')) redirect('auth/login');
        $data['error']='';
        if ($this->input->post('upload')) {
            if ($this->upload()) {
                $this->Cats_model->changephoto($this->upload->data('file_name'),$id);
                // $this->session->set_userdata('photo',$this->upload->data('file_name'));
                $this->session->set_userdata('msg','<p style="color:green">Photo sucessfuly changed !</p>');
            }
            else $data['error'] = $this->upload->display_errors();
		}
		$data['cat']=$this->Cats_model->read_by($id);
        $this->load->view('cats/form_photo',$data);
	}
	
	private function upload(){
        $config['upload_path']          = './uploads/cats/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('photo');
    }

}

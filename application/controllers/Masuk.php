<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');

	}

	//Login pelanggan
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email/Username', 'required',
				array('required' => '%s Harus Diisi'));
		
		$this->form_validation->set_rules('password', 'Password', 'required',
				array('required' => '%s Harus Diisi'));
		//Proses Login
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->spelanggan->login($email,$password);

		}
		//end
		$data = array(	'title'	=> 'Login Pelangggan',
						'isi' => 'masuk/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	public function logout(){
		$this->spelanggan->logout();
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Login
	public function index()
	{
		//Validasi
		$this->form_validation->set_rules('username', 'Username', 'required',
				array('required' => '%s Harus Diisi'));
		
		$this->form_validation->set_rules('password', 'Password', 'required',
				array('required' => '%s Harus Diisi'));
		//Proses Login
		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->slogin->login($username,$password);

		}
		//End.
		$data = array (	'title'	=>'Login Administrator');
		$this->load->view('login/list', $data, FALSE);
	}

	public function logout()
	{
		$this->slogin->logout();
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');

	}

	//Halaman registrasi
	public function index()
	{	
		$status = $this->pelanggan_model->status();
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('email', 'Email','required|valid_email|is_unique[pelanggan.email]',
			array(	'required'	=>'%s Harus Diisi',
					'valid_email'	=>'%s Tidak Valid',
					'is_unique'	=> '%s Sudah terdaftar'));

		$valid->set_rules('password', 'Password','required',
			array('required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('alamat','Alamat','required',
			array('required'	=> '%s Harus Diisi')
		);
		$valid->set_rules('telepon','Nomor Telepon','required',
			array('required'	=> '%s Harus Diisi')
		);
		$valid->set_rules('status_pelanggan','Status Pelanggan','required',
			array('required'	=> '%s Harus Di isi'));
		if ($valid->run()===FALSE){
		
		$data = array(	'title' => 'Registrasi Pelanggan',
						'isi'	=>	'registrasi/list',
						'status' => $status
						);

		$this->load->view('layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
		$data = array(	
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'email' 			=> $i->post('email'),
						'password'			=> SHA1($i->post('password')),
						'telepon'			=> $i->post('telepon'),
						'alamat' 			=> $i->post('alamat'),
						'status_pelanggan'	=> $i->post('status_pelanggan'),
						'tanggal_daftar' => date('Y-m-d_H:i:s')	 
 						); 
		$this->pelanggan_model->tambah($data);
		//Membuat session
		$this->session->set_userdata('email',$i->post('email'));
		$this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
		//end session
		$this->session->set_userdata('status_pelanggan',$i->post('status_pelanggan'));
		$this->session->set_flashdata('sukses', 'Registrasi berhasil ditambahkan');
		redirect(base_url('registrasi/sukses'),'refresh');

	}
		
	}
	public function sukses(){
		$data = array(	'title'	=> 'Registrasi Berhasil',
						'isi' => 'registrasi/sukses'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */
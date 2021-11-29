<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	//Load Moder
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->slogin->cek_login();
		$this->session->keep_flashdata('sukses');
		$this->load->model('pelanggan_model');
		$this->load->model('transaksi_model');
	}
	// Data user
	public function index()
	{
		$user = $this->user_model->listing();
		$data = array(	'title' => 'Data Pengguna',
						'user' => $user,
						'isi' =>'admin/user/list'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Data user
	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('email', 'Email','required|valid_email',
			array(	'required'	=>'%s Harus Diisi',
					'valid_email'	>='%s Tidak Valid'));

		$valid->set_rules('username', 'Username','required|min_length[5]|max_length[32]|is_unique[users.username]',
			array(	'required'		=>	'%s Harus Diisi',
				 	'min_length'	=>	'%s Minimal 6 Karakter',
				 	'max_length'	=> 	'%s Maximal 32 Karakter',
				 	'is_unique'		=> 	'%s Data sudah ada, Silahkan membuat username baru'	));

		$valid->set_rules('password', 'password','required',
			array('required'	=>'%s Harus Diisi')
			);

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Tambah Pengguna',
						'isi' =>'admin/user/tambah'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
		$data = array(	'nama'		=> $i->post('nama'),
						'email' 	=> $i->post('email'),
						'username'	=> $i->post('username'),
						'password'	=> SHA1($i->post('password')),
						'akses_level' => $i->post('akses_level')
 						); 
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
		redirect(base_url('admin/user'),'refresh');

	}

}
//End Masuk database

//Edit User
public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('email', 'Email','required|valid_email',
			array(	'required'	=>'%s Harus Diisi',
					'valid_email'	>='%s Tidak Valid'));

		$valid->set_rules('password', 'password','required',
			array('required'	=>'%s Harus Diisi',)
			);

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Edit Pengguna',
						'user' => $user,
						'isi' =>'admin/user/edit'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
		$data = array(	'id_user' => $id_user,
						'nama'		=> $i->post('nama'),
						'email' 	=> $i->post('email'),
						'username'	=> $i->post('username'),
						'password'	=> SHA1($i->post('password')),
						'akses_level' => $i->post('akses_level')
 						); 
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah di mutakhirkan');
		redirect(base_url('admin/user'),'refresh');
	}

}
//Delete User
	public function delete ($id_user){
		$data = array('id_user'=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data berhasil dihapus');
		$this->session->mark_as_flash('sukses');
		redirect(base_url('admin/user'),'refresh');
	}
//Pelanggan
public function pelanggan(){
	$pelanggan = $this->pelanggan_model->listing();
	$status = $this->pelanggan_model->status();
	$data = array(	'title' => 'Data pelanggan',
					'pelanggan' => $pelanggan,
					'status_pelanggan' => $status,
					'isi' => 'admin/user/pelanggan'
	);
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}
public function edit_pelanggan($id_pelanggan)
	{
		$pelanggan = $this->pelanggan_model->detail($id_pelanggan);
		$status = $this->pelanggan_model->status();
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('email', 'Email','required|valid_email',
			array(	'required'	=>'%s Harus Diisi',
					'valid_email'	=>'%s Tidak Valid'));

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Edit Pengguna',
						'pelanggan' => $pelanggan,
						'status' => $status, 
						'isi' =>'admin/user/edit_pelanggan'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
		if(strlen($i->post('password')) > 6 ){
		$data = array(	'id_pelanggan'		=>	$id_pelanggan,
						'id_status' 		=> $i->post('id_status'),
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'password'			=> SHA1($i->post('password')),
						'telepon'			=> $i->post('telepon'),
						'alamat' 			=> $i->post('alamat'),
 						); 
	}else{
		$data = array(	'id_pelanggan'		=>	$id_pelanggan,
						'id_status' 		=> $i->post('id_status'),
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'telepon'			=> $i->post('telepon'),
						'alamat' 			=> $i->post('alamat'),
 						); 
	}	$this->pelanggan_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah di mutakhirkan');
		redirect(base_url('admin/user/pelanggan'),'refresh');
	}

}

public function status(){
	$status = $this->pelanggan_model->status();
	$valid = $this->form_validation;
		$valid->set_rules('status_pelanggan', 'Status Pelanggan','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('urutan', 'Urutan','required',
			array(	'required'	=>'%s Harus Diisi')
			);
	if ($valid->run()===FALSE){
	$data = array(	'title' => 'Data Status Pelanggan',
					'status' => $status,
					'isi' => 'admin/user/status_pelanggan'
	);
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
	$i = $this->input;
	$data = array(	'status_pelanggan '	=> $i->post('status_pelanggan'),
					'urutan' 			=> $i->post('urutan')
				);
		$this->pelanggan_model->tambah_status($data);
		$this->session->set_flashdata('sukses', 'status berhasil ditambahkan');
		redirect(base_url('admin/user/status'),'refresh');
	}
}

	public function edit_status($id_status){
		$status = $this->pelanggan_model->detail_status($id_status);
		$valid = $this->form_validation;
		$valid->set_rules('status_pelanggan', 'Status Pelanggan','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('urutan', 'Urutan','required',
			array(	'required'	=>'%s Harus Diisi')
			);
	if ($valid->run()===FALSE){
	$data = array(	'title' => 'Data Status Pelanggan',
					'status' => $status,
					'isi' => 'admin/user/edit_status');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
	$i = $this->input;
	$data = array(	'id_status'			=> $id_status,
					'status_pelanggan '	=> $i->post('status_pelanggan'),
					'urutan' 			=> $i->post('urutan')
				);
		$this->pelanggan_model->edit_status($data);
		$this->session->set_flashdata('sukses', 'status berhasil ditambahkan');
		redirect(base_url('admin/user/status'),'refresh');
	}
	}
	public function delete_status($id_status){
		$data = array('id_status'=> $id_status);
		$this->pelanggan_model->delete_status($data);
		$this->session->set_flashdata('sukses','Data berhasil dihapus');
		$this->session->mark_as_flash('sukses');
		redirect(base_url('admin/user/status'),'refresh');
	}
	public function belanja($id_pelanggan){
		$pelanggan = $this->header_transaksi_model->pelanggan($id_pelanggan); 
		$pel = $this->pelanggan_model->detail($id_pelanggan);
		$data = array( 'title'	=> 'Riwayat Belanja',
						'pelanggan' => $pelanggan,
						'pel' => $pel,
						'isi' =>'admin/user/det_belanja'	
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function cetak_transaksi($kode_transaksi){
		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$transaksi = $this->transaksi_model->detail_belanja($kode_transaksi);
		$site = $this->konfigurasi_model->listing();
		$data = array( 'title'	=> 'Detail Transaksi',
						'header_transaksi' => $header_transaksi,
						'transaksi' => $transaksi,
						'site'=> $site
		);
		$this->load->view('admin/rekening/cetak_transaksi', $data, FALSE);
	}
	public function cetak($id_pelanggan){
		$pelanggan = $this->header_transaksi_model->pelanggan($id_pelanggan); 
		$pel = $this->pelanggan_model->detail($id_pelanggan);
		$site = $this->konfigurasi_model->listing();

			$data = array( 'title'	=> 'Detail Transaksi',
						'pelanggan' => $pelanggan,
						'pel' => $pel,
						'site'=> $site
		);
		$this->load->view('admin/user/cetak', $data, FALSE);

	}
}


/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
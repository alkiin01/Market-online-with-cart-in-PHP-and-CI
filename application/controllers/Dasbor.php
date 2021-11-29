<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		//Validasi cek login
		$this->spelanggan->cek_login();
	}

	public function index()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan); 
		$data=array(
			'title' => 'Halaman Pelanggan Terdaftar',
			'header_transaksi' => $header_transaksi,
			'isi' => 'dasbor/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function belanja(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan); 

		$data = array( 'title'	=> 'Riwayat Belanja',
						'header_transaksi' => $header_transaksi,
						'isi' => 'dasbor/belanja'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function detail($kode_transaksi){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$transaksi = $this->transaksi_model->detail_belanja($kode_transaksi);

		if ($header_transaksi->id_pelanggan != $id_pelanggan){
			$this->session->set_flashdata('warning', 'Data anda tidak cocok untuk transaksi ini');
			redirect(base_url('masuk'));
			$this->session->destroy();
		 }else{

		$data = array( 'title'	=> 'Riwayat Belanja',
						'header_transaksi' => $header_transaksi,
						'transaksi' => $transaksi,
						'isi' => 'dasbor/detail'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

	public function profil(){
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$pelanggan = $this->pelanggan_model->detail($id_pelanggan);

		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap','required',
			array(	'required'	=>'%s Harus Diisi')
			);

		$valid->set_rules('alamat','Alamat','required',
			array('required'	=> '%s Harus Diisi')
		);
		$valid->set_rules('telepon','Nomor Telepon','required',
			array('required'	=> '%s Harus Diisi')
		);

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Profil Anda',
						'pelanggan'=>$pelanggan,
						'isi' => 'dasbor/profil'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;

		if(strlen($i->post('password')) > 6 ){
		$data = array(	'id_pelanggan'	=>	$id_pelanggan,
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'password'			=> SHA1($i->post('password')),
						'telepon'			=> $i->post('telepon'),
						'alamat' 			=> $i->post('alamat'),
 						); 
	}else{
		$data = array(	'id_pelanggan'		=>	$id_pelanggan,
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'telepon'			=> $i->post('telepon'),
						'alamat' 			=> $i->post('alamat'),
 						); 
	}
		$this->pelanggan_model->edit($data);
		$this->session->set_flashdata('sukses', 'Update profil berhasil');
		redirect(base_url('dasbor/profil'),'refresh');

	}
	}

	public function konfirmasi($kode_transaksi){

		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$rekening = $this->rekening_model->listing();
		$valid 		= $this->form_validation;
		
		$valid->set_rules('nama_bank', 'Nama Bank','required',
			array(	'required'	=>'%s Harus Diisi'));

		$valid->set_rules('rekening_pembayaran', 'Nomor Rekening','required',
			array(	'required'	=>'%s Harus Diisi'));	

		$valid->set_rules('rekening_pelanggan', 'Nama Pembeli','required',
			array(	'required'	=>'%s Harus Diisi'));

		$valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran','required',
			array(	'required'	=>'%s Harus Diisi'));

		$valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran','required',
			array(	'required'	=>'%s Harus Diisi'));

		if ($valid->run()){
			//Jika mengganti gambar
		if(!empty($_FILES['bukti_bayar']['name'])) {
		$config['upload_path'] 	 = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  	 = '2400';
		$config['max_width']  	 = '2024';
		$config['max_height']  	 = '2024';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('bukti_bayar')){

		$data = array(	'title' => 'Konfirmasi Pembayaran',
						'header_transaksi' => $header_transaksi,
						'rekening' => $rekening,
						'error'=> $this->upload->display_errors(),							
						'isi' => 'dasbor/konfirmasi'	
				);
		$this->load->view('layout/wrapper', $data, FALSE);
		//Masuk databtotalase
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		$i = $this->input;
		$kode = $i->post('status_bayar');
		
		$notif = array('status_bayar'=>$kode);
		$this->cart->insert($notif);
		$data = array(	'id_header'				=> $header_transaksi->id_header,
						'status_bayar'			=> 'Konfirmasi',
						'jumlah_bayar'			=> $i->post('jumlah_bayar'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
						'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
						'bukti_bayar '			=> $upload_gambar['upload_data']['file_name'],
						'id_rekening'			=> $i->post('id_rekening'),
						'tanggal_bayar' 		=> $i->post('tanggal_bayar'),
						'nama_bank' 			=> $i->post('nama_bank'),

					); 
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Pembayaran Berhasil');
		redirect(base_url('dasbor/konfirmasi/'.$kode_transaksi),'refresh');
	}}else{
		//Tidak ganti gambar
		$i = $this->input;
		$data = array(	'id_header'				=> $header_transaksi->id_header,
						'status_bayar'			=>'Konfirmasi',
						'jumlah_bayar'			=> $i->post('jumlah_bayar'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
						'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
						//'bukti_bayar'	=> $i->post('keterangan'),
						'id_rekening'			=> $i->post('id_rekening'),
						'tanggal_bayar' 		=> $i->post('tanggal_bayar'),
						'nama_bank' 			=> $i->post('nama_bank')
						
					); 
		$this->header_transaksi_model->edit($data);

		$this->session->set_flashdata('sukses', 'Pembayaran Berhasil');

		redirect(base_url('dasbor/konfirmasi/'.$kode_transaksi),'refresh');
	}}
	//End Masuk database
			$data = array(	'title' => 'Konfirmasi Pembayaran '.$header_transaksi->nama_pelanggan,
							'header_transaksi' => $header_transaksi,
							'rekening' => $rekening,
							'isi' => 'dasbor/konfirmasi'	
				);
		$this->load->view('layout/wrapper', $data, FALSE);

	}
	public function pengiriman($kode_transaksi){
		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$i=$this->input;
		$data = array(	'id_header'	=> $header_transaksi->id_header,
						'pengiriman'=>$i->post('pengiriman'));
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Terima Kasih sudah berbelanja');
		redirect(base_url('dasbor'));
	}
	public function pembatalan($kode_transaksi){

		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi);
		$data = array(	'id_header'	=>	$header_transaksi->id_header);
		$this->header_transaksi_model->delete($data);
				redirect(base_url('dasbor'));

	}
}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */

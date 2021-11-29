<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//Menambah Random String untuk kode transaksi
		$this->load->helper('string');
	}
	public function index()
	{
		$keranjang 	=	$this->cart->contents();

		$data = array(	'title' 	=> 'Keranjang Belanja',
						'keranjang'	=> $keranjang,
						'isi' 		=> 'belanja/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function sukses()
	{
		$keranjang 	=	$this->cart->contents();

		$data = array(	'title' 	=> 'Berhasil Cekout',
						
						'isi' 		=> 'belanja/sukses'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function check_stock(){
		//Ambil data dari form

		$id = $this->input->post('id_product');
		
		$produk_stok= $this->produk_model->cekstok($id);  
		$data['stock'] = $id ;
		print_r($produk_stok); 
		return json_encode($data['stock']);

		//Halaman redirect
	}

	public function add(){
		//Ambil data dari form
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$produk_stok= $this->produk_model->cekstok($id); 
		$redirect_page = $this->input->post('redirect_page');
		//Proses memasukan data belanja
		$data = array(	'id'      => $id,
				        'qty'     => $qty,
				        'price'   => $price,
				        'name'    => $name
					);
		$this->cart->insert($data);	
		$this->produk_model->ambil_stock($id, ($produk_stok - $qty));   
		redirect($redirect_page,'refresh');

		//Halaman redirect
	}
	//Update Keranjang belanja
	public function update_cart($rowid){
		if($rowid){
			$data=	array (	'rowid'	=> $rowid,
							'qty'	=> $this->input->post('qty')
							);
			$this->cart->update($data);
			$this->session->flashdata('sukses','Data berhasil di-update');
		  	redirect(base_url('belanja'),'refresh');

		}else{
			//
			redirect(base_url('belanja'),'refresh');
		}

	}

	public function cekout(){
		//Validasi login pelanggan
		if($this->session->userdata('email')){
		
		$email 			= $this->session->userdata('email');
		$nama_pelanggan = $this->session->userdata('nama_pelanggan');	
		$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

		$keranjang 	=	$this->cart->contents();

		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap','required',
			array(	'required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('telepon', 'Nomor Telepon','required',
			array('required'	=>'%s Harus Diisi')
			);

		$valid->set_rules('alamat', 'Alamat Lengkap','required',
			array('required'	=>'%s Harus Diisi')
			);
		$valid->set_rules('email', 'Email','required|valid_email',
			array(	'required'		=>'%s Harus Diisi',
					'valid_email'	=>'%s Tidak Valid'));
		if ($valid->run()===FALSE){
		$data = array(	'title' 	=> 'Beli produk',
						'keranjang'	=> $keranjang,
						'pelanggan' => $pelanggan,
						'isi' 		=> 'belanja/cekout'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
		}else{
		$i = $this->input;
		$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
						'email' 			=> $i->post('email'),
						'telepon'			=> $i->post('telepon'),
						'alamat' 			=> $i->post('alamat'),
						'kode_transaksi' 	=> $i->post('kode_transaksi'),
						'tanggal_transaksi' => $i->post('tanggal_transaksi'),
						'jumlah_transaksi' 	=> $i->post('jumlah_transaksi'),
						'status_bayar' 		=> 'Belum bayar',
						'tanggal_post' 		=> date('Y-m-d_H:i:s')	 
 						); 

		//Proses masuk header transaksi
		$this->header_transaksi_model->tambah($data);
		foreach($keranjang as $keranjang){
			$sub_total = $keranjang['price'] * $keranjang['qty'];
			$data = array(	'id_pelanggan'	=> $pelanggan->id_pelanggan,
							'kode_transaksi'=> $i->post('kode_transaksi'),
							'id_produk' 	=> $keranjang['id'],
							'harga' 		=> $keranjang['price'],
							'jumlah' 		=> $keranjang['qty'],
							'total_harga' 	=> $sub_total,
							'tanggal_transaksi' => $i->post('tanggal_transaksi')
			);
			$this->transaksi_model->tambah($data);
		
		}
		//end tabel transaksi
		$this->cart->destroy();
		$this->session->set_flashdata('sukses', 'Berhasil Cekout');
		redirect(base_url('belanja/sukses'),'refresh');

	}
		}else{
			$this->session->set_flashdata('sukses', 'Silakan registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');
		}

	}
	//Menghapus semua keranjang belanja
	public function hapus($rowid=''){
		if ($rowid){
		$this->cart->remove($rowid);
		$this->session->flashdata('sukses','Data berhasil dihapus');
		redirect(base_url('belanja'),'refresh');	

		}else{
		  $this->cart->destroy();
		  $this->session->flashdata('sukses','Data berhasil dihapus');
		  redirect(base_url('belanja'),'refresh');

		}
	}


}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */
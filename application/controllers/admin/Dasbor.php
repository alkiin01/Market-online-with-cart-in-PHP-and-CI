<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->slogin->cek_login();
		$this->load->model('produk_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
	}
	
	public function index()
	{
		$total = $this->produk_model->total_produk();
		$pelanggan = $this->pelanggan_model->total_pelanggan();
		$transaksi = $this->header_transaksi_model->total_transaksi();
		$site = $this->konfigurasi_model->listing();
		$data = array ('title' => 'Admininstrator',
						'total' => $total->total,
						'pelanggan'=> $pelanggan->total,
						'transaksi'=> $transaksi->total,
						'isi' => 'admin/dasbor/list'	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	//Load Model
public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->slogin->cek_login();
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('rekening_model');
	}
	// Data rekening
	public function index()
	{

		$rekening = $this->rekening_model->listing();
		$data = array(	'title' => 'Data Rekening',
						'rekening' => $rekening,
						'isi' =>'admin/rekening/list'	
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Data Rekening
public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank','required',
			array(	'required'	=> '%s Harus Diisi'
        ));
		
		$valid->set_rules('nomor_rekening', 'Nomor rekening','required|is_unique[rekening.nomor_rekening]',
			array(	'required'	=> '%s Harus Diisi',
                    'is_unique' => '%s Data sudah ada, Buat rekening baru'
        ));

		$valid->set_rules('nama_pemilik', 'Nama Pemilik','required',
			array(	'required'	=> '%s Harus Diisi'
        ));        

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Tambah Rekening',
						'isi' =>'admin/rekening/tambah'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
		$data = array(	'nama_bank'     => $i->post('nama_bank'),
						'nomor_rekening' => $i->post('nomor_rekening'),
                        'nama_pemilik'	=> $i->post('nama_pemilik')
 						); 
		$this->rekening_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
		redirect(base_url('admin/rekening'),'refresh');
	}

}
//End Masuk database

//Edit Rekening
public function edit($id_rekening){
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemilik', 'Nama rekening','required',
			array(	'required'	=>'%s Harus Diisi')
			);

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Edit Rekening',
						'rekening' => $rekening,
						'isi' =>'admin/rekening/edit'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
		$data = array(	'id_rekening'       => $id_rekening,
                        'nama_bank'     => $i->post('nama_bank'),
						'nomor_rekening' => $i->post('nomor_rekening'),
                        'nama_pemilik'		=> $i->post('nama_pemilik')
 						); 
		$this->rekening_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah di mutakhirkan');
		redirect(base_url('admin/rekening'),'refresh');
	}

}
//Delete rekening
public function delete ($id_rekening){
		$data = array('id_rekening'=> $id_rekening);
		$this->rekening_model->delete($data);
		$this->session->set_flashdata('Sukses','Data berhasil dihapus');
		redirect(base_url('admin/rekening'),'refresh');
	}

public function transaksi(){
		$header_transaksi = $this->header_transaksi_model->listing();
		$data=array(	'title'				=> 'Data transaksi',	
						'header_transaksi' 	=> $header_transaksi,
						'isi'				 => 'admin/rekening/transaksi'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
public function det_transaksi($kode_transaksi){
		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$transaksi = $this->transaksi_model->detail_belanja($kode_transaksi);


		$data = array( 'title'	=> 'Riwayat Belanja',
						'header_transaksi' => $header_transaksi,
						'transaksi' => $transaksi,
						'isi' => 'admin/rekening/det_transaksi'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	
public function cetak_transaksi($kode_transaksi){
		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$transaksi = $this->transaksi_model->detail_belanja($kode_transaksi);
		$site = $this->konfigurasi_model->listing();


		$data = array( 'title'	=> 'Riwayat Belanja',
						'header_transaksi' => $header_transaksi,
						'transaksi' => $transaksi,
						'site'=> $site
		);
		$this->load->view('admin/rekening/cetak_transaksi', $data, FALSE);
	}
	public function kurir()
	{
		$header_transaksi = $this->header_transaksi_model->listing();
		$data=array(	'title'				=> 'Data transaksi',	
						'header_transaksi' 	=> $header_transaksi,
						'isi'				 => 'admin/rekening/kurir'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function pengiriman($kode_transaksi){
		$header_transaksi = $this->header_transaksi_model->detail_belanja($kode_transaksi); 
		$i = $this->input;
		$data = array( 	'id_header'	=> $header_transaksi->id_header,
						'pengiriman' => $i->post('pengiriman'));
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil diperbarui');
		redirect(base_url('admin/rekening/kurir'),'refresh');
	}

	public function total_transaksi(){
		$header_transaksi = $this->header_transaksi_model->listing();
		
		$data = array( 'title'	=> 'Riwayat Belanja',
						'header_transaksi' => $header_transaksi,
						'isi' => 'admin/rekening/total_transaksi'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function total(){
	$valid = $this->form_validation;
	$valid->set_rules('tanggal_transaksi', 'Tanggal transaksi','required',
			array(	'required'	=>'%s Harus Diisi')
			);
	if ($valid->run()===TRUE){
	$i=$this->input;
	$tanggal_transaksi = $i->post('tanggal_transaksi');
	$tgl = $i->post('tanggal_transaksi');
	$harga = $this->header_transaksi_model->total($tanggal_transaksi);
	$total = $this->header_transaksi_model->tot($tanggal_transaksi);
	}
	$data = array( 'title'	=> 'Data transaksi tanggal : '.date('d-m-Y',strtotime($tanggal_transaksi)),
					'harga' => $harga,
					'total'=> $total,
					'isi' => 'admin/rekening/cetak_total'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
}
	public function cetak($tanggal_transaksi){
	$harga = $this->header_transaksi_model->total($tanggal_transaksi);
	$total = $this->header_transaksi_model->tot($tanggal_transaksi);
	$data = array( 'title'	=> 'Data transaksi tanggal : '.$tanggal_transaksi,
					'harga' => $harga,
					'total'=> $total,
		);
		$this->load->view('admin/rekening/cetak', $data, FALSE);
	}
}


/* End of file Rekening.php */
/* Location: ./application/controllers/admin/Rekening.php */
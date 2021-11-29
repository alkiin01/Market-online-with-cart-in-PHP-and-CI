<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$kategori = $this->kategori_model->listing();
		$produk = $this->produk_model->listing();
		$data = array(	
						'title' => $site->namaweb.'|'.$site->tagline, 
						'keywords'=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'=> $site,
						'kategori' => $kategori,
						'produk' => $produk,
						'sproduk'=> $produk,
						'isi' => 'home/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function tentang(){
		$site = $this->konfigurasi_model->listing();
		$kategori = $this->kategori_model->listing();
		$produk = $this->produk_model->listing();
		$data = array(	'title' => $site->namaweb.'|'.$site->tagline, 
						'keywords'=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'=> $site,
						'kategori' => $kategori,
						'produk' => $produk,
						'sproduk'=> $produk,
						'isi' => 'home/tentang');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function budidaya(){
		$site = $this->konfigurasi_model->listing();

		$data = array(	'title'=> 'Budidaya',
						'site'=> $site,
						'isi' => 'home/budidaya/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
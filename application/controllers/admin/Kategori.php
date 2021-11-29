<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
		$this->slogin->cek_login();
	}
	// Data kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();
		$data = array(	'title' => 'Data Ketegori Produk',
						'kategori' => $kategori,
						'isi' =>'admin/kategori/list'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Data Kategori
	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori', 'Nama kategori','required|is_unique[kategori.nama_kategori]',
			array(	'required'	=> '%s Harus Diisi',
                    'is_unique' => '%s Data sudah ada, Buat kategori baru')
        );
		

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Tambah Ketegori Produk',
						'isi' =>'admin/kategori/tambah'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
        $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data = array(	'slug_kategori'     => $slug_kategori,
                        'nama_kategori'		=> $i->post('nama_kategori'),
						'urutan'            => $i->post('urutan')
 						); 
		$this->kategori_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
		redirect(base_url('admin/kategori'),'refresh');
	}

}
//End Masuk database

//Edit Kategori
public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);

		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori', 'Nama kategori','required',
			array(	'required'	=>'%s Harus Diisi')
			);

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Edit Ketegori Produk',
						'kategori' => $kategori,
						'isi' =>'admin/kategori/edit'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
        $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data = array(	'id_kategori'       => $id_kategori,
                        'slug_kategori'     => $slug_kategori,
                        'nama_kategori'		=> $i->post('nama_kategori'),
                        'urutan'            => $i->post('urutan')
 						); 
		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah di mutakhirkan');
		redirect(base_url('admin/kategori'),'refresh');
	}

}
//Delete kategori
	public function delete ($id_kategori){
		$data = array('id_kategori'=> $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('Sukses','Data berhasil dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */
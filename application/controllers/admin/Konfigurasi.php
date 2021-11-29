
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }
    
    public function index()
    {
           $konfigurasi = $this->konfigurasi_model->listing();
           $valid = $this->form_validation;

		$valid->set_rules('nama_web', 'Nama Website',
			array(	'required'	=> '%s Harus Diisi'
                    )
        );
		

		if ($valid->run()===FALSE){
		$data = array(	'title' => 'Konfigurasi website',
                        'konfigurasi'=>$konfigurasi,
						'isi' =>'admin/konfigurasi/list'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
	}else{
		$i = $this->input;
        $data = array(  'id_konfigurasi' => $konfigurasi->id_konfigurasi,
                    	'namaweb'       =>  $i->post('namaweb'),
                        'tagline'	    => $i->post('tagline'),
						'website'       => $i->post('website'),
                        'email'         => $i->post('email'),
						'keywords'      => $i->post('keywords'),
						'metatext'      => $i->post('metatext'),
						'telepon'       => $i->post('telepon'),
						'alamat'        => $i->post('alamat'),
						'facebook'      => $i->post('facebook'),
						'instagram'     => $i->post('instagram'),
						'deskripsi'     => $i->post('deskripsi'),
						
 						); 
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah dimutakhirkan');
		redirect(base_url('admin/konfigurasi'),'refresh');
	}

}

    //Konfigurasi logo website
    public function logo(){
        $konfigurasi = $this->konfigurasi_model->listing();
        $valid 		= $this->form_validation;
		
		$valid->set_rules('namaweb', 'Nama Website','required',
			array(	'required'	=>'%s Harus Diisi'));	

		if ($valid->run()){
			//Jika mengganti gambar
			if(!empty($_FILES['logo']['name'])){
		$config['upload_path'] 	 = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  	 = '2400';
		$config['max_width']  	 = '2024';
		$config['max_height']  	 = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('logo')){
		$data = array(	'title' => 'Konfigurasi Logo ',
						'konfigurasi' =>$konfigurasi,
						'error'=> $this->upload->display_errors(),
						'isi' =>'admin/konfigurasi/logo'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk databtotalase
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
		
		//Bikin gambar thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image']  = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		$config['new_image']	= './assets/upload/image/thumbs/';							
		$config['create_thumb']  = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']          = 500; //ukuran pixel
		$config['height']         = 500;
		$config['thumb_marker']	='';

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		//end thumbnail
		
		$data = array('upload_data' =>$this->upload->data());
		$i = $this->input;
		
		$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
						'namaweb'       => $i->post('namaweb'),
						'logo' 		=> $upload_gambar['upload_data']['file_name'],
						); 
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupload');
		redirect(base_url('admin/konfigurasi/logo'),'refresh');
	}}else{
		//Tidak ganti gambar
        $i = $this->input;
		$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
						'namaweb'       => $i->post('namaweb'),
						//'logo' 		=> $upload_gambar['upload_data']['file_name'],
						); 
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupload');
		redirect(base_url('admin/konfigurasi/logo'),'refresh');
	}}
	//End Masuk database
	$data = array(	'title' => 'Konfigurasi Logo ',
                    'konfigurasi' =>$konfigurasi,
                    'isi' =>'admin/konfigurasi/logo'	
                );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Konfigurasi icon website
    public function icon(){
        $konfigurasi = $this->konfigurasi_model->listing();
        $valid 		= $this->form_validation;
		
		$valid->set_rules('namaweb', 'Nama Website','required',
			array(	'required'	=>'%s Harus Diisi'));	

		if ($valid->run()){
			//Jika mengganti gambar
			if(!empty($_FILES['icon']['name'])){
		$config['upload_path'] 	 = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  	 = '2400';
		$config['max_width']  	 = '2024';
		$config['max_height']  	 = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('icon')){
		$data = array(	'title' => 'Konfigurasi icon ',
						'konfigurasi' =>$konfigurasi,
						'error'=> $this->upload->display_errors(),
						'isi' =>'admin/konfigurasi/icon'	
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk databtotalase
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
		
		//Bikin gambar thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image']  = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		$config['new_image']	= './assets/upload/image/thumbs/';							
		$config['create_thumb']  = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']          = 500; //ukuran pixel
		$config['height']         = 500;
		$config['thumb_marker']	='';

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		//end thumbnail
		
		$data = array('upload_data' =>$this->upload->data());
		$i = $this->input;
		
		$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
						'namaweb'       => $i->post('namaweb'),
						'icon' 		=> $upload_gambar['upload_data']['file_name'],
						); 
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupload');
		redirect(base_url('admin/konfigurasi/icon'),'refresh');
	}}else{
		//Tidak ganti gambar
        $i = $this->input;
		$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
						'namaweb'       => $i->post('namaweb'),
						//'logo' 		=> $upload_gambar['upload_data']['file_name'],
						); 
		$this->konfigurasi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupload');
		redirect(base_url('admin/konfigurasi/icon'),'refresh');
	}}
	//End Masuk database
	$data = array(	'title' => 'Konfigurasi Icon ',
                    'konfigurasi' =>$konfigurasi,
                    'isi' =>'admin/konfigurasi/icon'	
                );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }



    public function berita(){
    	$valid = $this->form_validation;
    	$valid->set_rules('judul_berita', 'Judul Berita',
				array(	'required'	=> '%s Harus Diisi')
        );
		
		if ($valid->run()){
		if(!empty($_FILES['gambar']['name'])){
		$config['upload_path'] 	 = './assets/upload/image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  	 = '2400';
		$config['max_width']  	 = '2024';
		$config['max_height']  	 = '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
    	$data = array(	'title'	=> 'Konfigurasi Berita dan Komunitas',
    					'error' => $this->do_upload->display_errors(),
    					'isi' => 'admin/konfigurasi/berita',
    		    	);
    	$this->load->view('admin/layout/wrapper', $data, FALSE);
   		 
    }else{
    	$upload_gambar = array('upload_data' => $this->upload->data());
	 	$i = $this->input;
        $data = array(  'jenis_berita'   =>  $i->post('jenis_berita'),
                        'judul_berita'	 => $i->post('judul_berita'),
						'keterangan'     => $i->post('keterangan'),
                        'alamat_berita'  => $i->post('alamat_berita'),
						'gambar'      	=> $upload_gambar['upload_data']['file_name'],
						'tanggal_post' 	=> date('Y-m-d H:i:s') 						
 						); 
		$this->konfigurasi_model->tambah_berita($data);
		$this->session->set_flashdata('sukses', 'Data telah dimutakhirkan');
		redirect(base_url('admin/konfigurasi/berita'),'refresh');
	}}else{
		$i = $this->input;
        $data = array(  
                    	'jenis_berita'  =>  $i->post('jenis_berita'),
                        'judul_berita'	=> $i->post('judul_berita'),
						'	'    => $i->post('keterangan'),
                        'alamat_berita'	=> $i->post('alamat_berita'),
						'tanggal_post'	=> date('Y-m-d H:i:s') 						
 						); 
		$this->konfigurasi_model->tambah_berita($data);
		$this->session->set_flashdata('sukses', 'Data telah dimutakhirkan');
		redirect(base_url('admin/konfigurasi/berita'),'refresh');
	}}
		$data = array(	'title'	=> 'Konfigurasi Berita dan Komunitas',
    					'isi' => 'admin/konfigurasi/berita',
    		    	);
    	$this->load->view('admin/layout/wrapper', $data, FALSE);
		
    }
}

/* End of file Konfigruasi.php */

?>
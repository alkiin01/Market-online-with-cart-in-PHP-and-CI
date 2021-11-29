<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing
	public function listing(){
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah)AS total_item');
		$this->db->from('header_transaksi');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');	
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->group_by('header_transaksi.id_header');
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function pelanggan($id_pelanggan){
		$this->db->select('header_transaksi.*,
						SUM(transaksi.jumlah)AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');	
		$this->db->group_by('header_transaksi.id_header');
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->result();
	}	
	//detail_header_transaksi
	public function detail($id_header){
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('id_header',$id_header);
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function detail_belanja($kode_transaksi){
		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							rekening.nama_bank AS bank,
							rekening.nomor_rekening AS rek,
							rekening.nama_pemilik AS nama,
							SUM(transaksi.jumlah)AS total_item');
		$this->db->from('header_transaksi');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');	
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('rekening', 'rekening.id_rekening = header_transaksi.id_rekening', 'left');
		$this->db->group_by('header_transaksi.id_header');
		$this->db->where('transaksi.kode_transaksi',$kode_transaksi);
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//tambah
	public function tambah($data){
		$this->db->insert('header_transaksi',$data);
	}
	//Edit
	public function edit($data){
		$this->db->where('id_header',$data['id_header']);
		$this->db->update('header_transaksi',$data);
	}
	//Delete
	public function delete($data){
		$this->db->where('id_header',$data['id_header']);
		$this->db->delete('header_transaksi',$data);
		}

	//Session Header_transaksi
	public function sudah_login($email,$nama_header_transaksi){
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('email',$email);
		$this->db->where('nama_header_transaksi',$nama_header_transaksi);
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($email,$password){
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where(array( 'email'=>$email,
								'password'=> SHA1($password)));
		$this->db->order_by('id_header', 'desc');
		$query = $this->db->get();
		return $query->row();
		}
	public function total_transaksi(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('header_transaksi');
		$query = $this->db->get();
		return $query->row();
	}

	public function total($tanggal_transaksi){
		$this->db->select('header_transaksi.*,SUM(header_transaksi.jumlah_transaksi) AS total_harga,
			SUM(transaksi.jumlah)AS total_item');
		$this->db->from('header_transaksi');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->where('header_transaksi.tanggal_transaksi',$tanggal_transaksi);
		$this->db->group_by('header_transaksi.id_header');
	
		$query = $this->db->get();
		return $query->result();
	}
	public function tot($tanggal_transaksi){
		$this->db->select('header_transaksi.*,SUM(header_transaksi.jumlah_transaksi) AS total_harga');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.tanggal_transaksi',$tanggal_transaksi);
		
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */
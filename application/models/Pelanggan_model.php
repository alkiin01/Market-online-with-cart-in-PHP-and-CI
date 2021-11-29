<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing
	public function listing(){
		$this->db->select('pelanggan.*,
							status_pelanggan.status_pelanggan');
		$this->db->from('pelanggan');
		$this->db->join('status_pelanggan', 'status_pelanggan.id_status = pelanggan.id_status', 'left');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	//detail_pelanggan
	public function detail($id_pelanggan){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function komentar(){
		$this->db->select('komentar.*,
							produk.nama_produk,
							pelanggan.nama_pelanggan');
		$this->db->from('komentar');
		$this->db->join('produk', 'produk.id_produk = komentar.id_produk', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = komentar.id_pelanggan', 'left');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function tambah_komentar($data){
		$this->db->insert('komentar', $data);
	}

	//tambah
	public function tambah($data){
		$this->db->insert('pelanggan',$data);
	}
	//Edit
	public function edit($data){
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->update('pelanggan',$data);
	}
	//Delete
	public function delete($data){
		$this->db->where('id_pelanggan',$data['id_pelanggan']);
		$this->db->delete('pelanggan',$data);
		}

	//Session Pelanggan
	public function sudah_login($email,$nama_pelanggan){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('email',$email);
		$this->db->where('nama_pelanggan',$nama_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function status(){
		$this->db->select('*');
		$this->db->from('status_pelanggan');
		$this->db->order_by('id_status', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function tambah_status($data){
		$this->db->insert('status_pelanggan', $data);
	}
	public function detail_status($id_status){
		$this->db->select('*');
		$this->db->from('status_pelanggan');
		$this->db->where('id_status',$id_status);
		$this->db->order_by('id_status', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	public function edit_status($data){
		$this->db->where('id_status',$data['id_status']);
		$this->db->update('status_pelanggan',$data);
	}
	public function delete_status($data){
		$this->db->where('id_status',$data['id_status']);
		$this->db->delete('status_pelanggan',$data);
		}

	public function login($email,$password){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array( 'email'=>$email,
								'password'=> SHA1($password)));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
		}

	public function total_pelanggan(){
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pelanggan');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
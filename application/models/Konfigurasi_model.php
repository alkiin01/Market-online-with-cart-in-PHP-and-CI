<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class konfigurasi_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //Listing
    public function listing(){
        $query= $this->db->get('konfigurasi');
        return $query->row();
    }

    public function edit($data){
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('konfigurasi',$data);
    }

    //Load kategori produk
    public function nav_produk(){
        $this->db->select('produk.*,
                        kategori.nama_kategori,
                        kategori.slug_kategori');
        $this->db->from('produk');
        //join
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        //end join
        $this->db->group_by('produk.id_kategori');
        $this->db->order_by('kategori.urutan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function home(){
        $this->db->select('produk.*,
                        users.nama,
                        kategori.nama_kategori,
                        kategori.slug_kategori,
                        COUNT(gambar.id_gambar)AS total_gambar');
        $this->db->from('produk');
        //join
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        //end join
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function komunitas(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('id_Berita', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function berita(){
        $query= $this->db->get('berita');
        return $query->row();
    }
    public function tambah_berita($data)
    {
        $this->db->insert('berita', $data);
    }
    
    public function edit_berita($data){
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->update('berita', $data);
    }

    

}

/* End of file ModelName.php */

?>
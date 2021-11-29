<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spelanggan
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('pelanggan_model');  
    }

    //Fungsi Login
    public function login($email,$password){

        $cek = $this->CI->pelanggan_model->login($email,$password);
        //Memeriksa data login session
        if($cek){
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            $status = $cek->status_pelanggan;
        //Create Session
            $this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
            $this->CI->session->set_userdata('email',$email);
            $this->CI->session->set_userdata('status_pelanggan',$status);
        //redirect ke halaman utama
            redirect(base_url('dasbor'),'refresh');
        }else{
        //Jika ID atau password salah
        $this->CI->session->set_flashdata('salah','Username atau password salah');
            redirect(base_url('masuk'),'refresh');
        }

    }

    public function cek_login()
    {
        //Memeriksa session sudah ada atau belum
        if ($this->CI->session->userdata('email')=="" ) 
        {
            $this->CI->session->set_flashdata('warning','Anda Belum login');
            redirect(base_url('masuk'),'refresh');
        }
    }

    public function logout(){
        $this->CI->session->unset_userdata('id_pelanggan');
        $this->CI->session->unset_userdata('nama_pelanggan');
        $this->CI->session->unset_userdata('email');
        $this->CI->session->set_flashdata('sukses','Berhasil logout');
        redirect(base_url('masuk'),'refresh');
    }

}

    /* End of file LibraryName.php */
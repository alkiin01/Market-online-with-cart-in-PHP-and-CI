<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slogin
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('user_model');  
    }

    //Fungsi Login
    public function login($username,$password){

        $cek = $this->CI->user_model->login($username,$password);
        //Memeriksa data login session
        if($cek){
            $id_user = $cek->id_user;
            $nama = $cek->nama;
            $username = $cek->username;
            $akses_level = $cek->akses_level;
        //Create Session
            $this->CI->session->set_userdata('id_user',$id_user);
            $this->CI->session->set_userdata('nama',$nama);
            $this->CI->session->set_userdata('username',$username);
            $this->CI->session->set_userdata('akses_level',$akses_level);
        //redirect ke halaman utama
            redirect(base_url('admin/dasbor'),'refresh');
        }else{
        //Jika ID atau password salah
        $this->CI->session->set_flashdata('salah','Username atau password salah');
            redirect(base_url('login'),'refresh');
        }

    }

    public function cek_login()
    {
        //Memeriksa session sudah ada atau belum
        if ($this->CI->session->userdata('username') == "") 
        {
            $this->CI->session->set_flashdata('warning','Anda Belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    public function logout(){
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('akses_level');
        $this->CI->session->set_flashdata('sukses','Berhasil logout');
        redirect(base_url('login'),'refresh');
    }

}

    /* End of file LibraryName.php */
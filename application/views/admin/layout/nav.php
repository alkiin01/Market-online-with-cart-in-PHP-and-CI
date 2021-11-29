<!-- Main Sidebar Container -->
  <?php 
$site = $this->konfigurasi_model->listing();
   ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dasbor')?>" class="brand-link">
      <img src="<?php echo base_url('assets/upload/image/'.$site->logo)?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kamale Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Menu Dashboard -->
          </li>
           <?php if($this->session->userdata('akses_level')=='Kurir'){ ?>
                <li class="nav-item">
            <a href="<?php echo base_url('admin/rekening/kurir') ?>" class="nav-link">
              <i class="nav-icon fa fa-box "></i>
              <p>Pengiriman</p>
            </a>
          </li>
              <?php }elseif($this->session->userdata('akses_level')=='Admin'){ ?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt text-info"></i>
              <p>DASHBOARD</p>
            </a>
          </li>
          <!-- Menu User -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/produk')?>" class="nav-link">
                  <i class="fa fa-table"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/produk/tambah')?>" class="nav-link">
                  <i class="fa fa-plus"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/kategori')?>" class="nav-link">
                  <i class="fa fa-tags"></i>
                  <p>Kategori Produk</p>
                </a>
              </li> 
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Pengguna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user')?>" class="nav-link">
                  <i class="fa fa-table"></i>
                  <p>Data Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user/tambah')?>" class="nav-link">
                  <i class="fa fa-plus"></i>
                  <p>Tambah Pengguna</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user/pelanggan')?>" class="nav-link">
                  <i class="fa fa-table"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/user/status')?>" class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>Status Pelanggan</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-credit-card "></i>
              <p>Transaksi dan Rekening
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/rekening') ?>" class="nav-link">
                  <i class="fa fa-credit-card"></i>
                  <p>Rekening</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/rekening/transaksi') ?>" class="nav-link">
                  <i class="fa fa-check"></i>
                  <p>Transaksi</p>
                </a>
              </li>
            </ul>
          </li>
          <!--Konfigurasi-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Konfigurasi website
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi')?>" class="nav-link">
                  <i class="fa fa-home"></i>
                  <p>Data Website</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/logo')?>" class="nav-link">
                  <i class="fa fa-plus"></i>
                  <p>Konfigurasi image</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/icon')?>" class="nav-link">
                  <i class="fa fa-home"></i>
                  <p>Konfigurasi icon</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url('admin/konfigurasi/berita')?>" class="nav-link">
                  <i class="fa fa-group"></i>
                  <p>Konfigurasi Berita dan Komunitas</p>
                </a>
              </li> 
             
            </ul>
            <li class="nav-item">
            <a href="<?php echo base_url('admin/rekening/kurir') ?>" class="nav-link">
              <i class="nav-icon fa fa-box "></i>
              <p>Pengiriman</p>
            </a>
          </li>
          <?php } ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dasbor') ?>">Dasbor</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
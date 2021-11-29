<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('admin/dasbor')?>" class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <div class="image">
          <p class="text-sm">Masuk sebagai : <?php echo $this->session->userdata('nama'); ?>
            <i class="right fas fa-angle-left"></i>
          </p>

        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <a href="#" class="dropdown-item">
      <div class="media">
          <div class="media-body">
          <h3 class="dropdown-item-title">
          <?php echo $this->session->userdata('nama') ; ?>
          <?php echo " - "; echo $this->session->userdata('akses_level');?>
            </h3>
            <small><?php echo date('d M Y'); ?></small>
            <a href="<?php echo base_url('login/logout') ?>"><button class="btn btn-danger btn-block">
        Logout
        </button></a>    
          </div>
      </div>
      </a>
    </li> 
    <li class="nav-item dropdown">
      <?php $notif = $this->cart->contents(); ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo count($notif); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           <?php if(empty($notif)){?>
            <p class="alert alert-success">Tidak ada pemberitahuan</p>
           <?php }else{?>
            <a href="<?php echo base_url('admin/rekening/transaksi') ?>">
            <p class="bg bg-warning">Ada transaksi baru</p></a>
         <?php  } ?>
          </a>
          
      </li>
      </ul>
  </nav>
  <!-- /.navbar -->

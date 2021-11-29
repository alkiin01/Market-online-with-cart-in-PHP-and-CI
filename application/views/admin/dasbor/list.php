<section class="content">
      <div class="container-fluid">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="<?php echo base_url('admin/dasbor') ?>">Dashboard</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p>
                  Selamat datang <strong><?php echo $this->session->userdata('nama') ?></strong>
                </p>
                <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info elevation-5">
              <div class="inner">
              <center>
                <i class="fa fa-box fa-lg"></i></center> 
                <h3><?php echo $total; ?></h3>

                <p>Produk terpublikasi </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/produk') ?>" class="small-box-footer">Info Produk <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

         <div class="col-lg-3 col-6">
            <div class="small-box bg-warning elevation-5">
              <div class="inner">
              <center>
                <i class="fa fa-user fa-lg"></i></center> 
                <h3><?php echo $pelanggan; ?></h3>

                <p>Total Pelanggan </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/user/pelanggan') ?>" class="small-box-footer">Info pelanggan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success elevation-5">
              <div class="inner">
              <center>
                <i class="fa fa-credit-card fa-lg"></i></center> 
                <h3><?php echo $transaksi; ?></h3>

                <p>Total Transaksi </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('admin/user/pelanggan') ?>" class="small-box-footer">Info Produk <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

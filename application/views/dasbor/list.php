	<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
	<div class="row">
		<div class="col-sm-2 col-md-2 col-lg-2 p-b-20">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<h4 class="m-text14 p-b-7">
					<?php include 'menu.php'; ?>
				</h4>

				
				<!--  -->
				
			</div>
		</div>
		
		<div class="col-sm-6 col-md-8 col-lg-10 p-b-50">

			<div class="row">
				
				<div class="alert alert-success">
					<h1>Selamat datang di Kamale Store
						<i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i>
					</h1>
				</div>
			</div>
				<p>Berikut riwayat belanja anda</p>
				<?php if ($header_transaksi){ ?>
					<div class="wrap-table-shopping-cart">
					<table class="table table-shoping-cart">
						<thead>
							<tr>
								<th width="20%">No</th>
								<th>Kode</th>
								<th>Total Harga Item</th>
								<th>Jumlah item</th>
								<th>Tanggal Transaksi</th>
								<th>Status</th>
								<th>Pengiriman</th>
								<th>Action</th>


							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($header_transaksi as $header_transaksi){ ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $header_transaksi->kode_transaksi ?></td>
								<td><?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
								<td><?php echo $header_transaksi->total_item ?></td> 
								<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)); ?></td>
								<td><?php echo $header_transaksi->status_bayar ?></td>
<td>
									<?php if($header_transaksi->pengiriman=='Diterima' && $header_transaksi->status_bayar=="Konfirmasi"){ ?>
								<?php echo $header_transaksi->pengiriman ?>
								
								<?php } elseif ($header_transaksi->status_bayar=='Belum bayar'){?>
									<?php echo'Lakukan pembayaran' ?>
								<?php }else{ ?>
								<?php echo form_open('dasbor/pengiriman/'.$header_transaksi->kode_transaksi);
										echo form_hidden('pengiriman', 'Diterima');?>
								<button type="submit" class="btn-primary btn-sm">
								<i class="fa fa-arrow-circle-right"></i> Barang sudah diterima</button>
									 <?php form_close(); ?>
									<?php } ?>
								</td>

								<td>
								<a href="<?php echo base_url('dasbor/detail/').$header_transaksi->kode_transaksi ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail</a>
								<?php if($header_transaksi->status_bayar=="Belum bayar"){ ?>
								<a href="<?php echo base_url('dasbor/pembatalan/').$header_transaksi->kode_transaksi ?>" class="btn btn-danger btn-sm">Batalkan </a>
							<?php } ?>
								<a href="<?php echo base_url('dasbor/konfirmasi/').$header_transaksi->kode_transaksi ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Konfirmasi Pembayaran
								</a>
									
								</td>
							</tr>
						<?php $i++; } ?>
						</tbody>
					</table>

				<?php }else{ ?>
					<?php echo 'Belanja tidak ada'; ?>
				<?php } ?>

			<!-- Pagination -->
			
		</div>
	</div>
	</div>
	</div>
	</section>
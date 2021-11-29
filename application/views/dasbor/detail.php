<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<h4 class="m-text14 p-b-7">
					<?php include 'menu.php'; ?>
				</h4>			
				<!--  -->
		
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
		
				
				<h1><?php echo $title; ?></h1>
				<p>Berikut riwayat belanja anda</p>
				<?php if ($header_transaksi){ ?>
					<table class="table table-responsive table-hover">
						<thead>
							<tr>
								<th width="20%">Kode Transaksi</th>
								<th><?php echo $header_transaksi->kode_transaksi ?></th>
							</tr>
						</thead>
						<tbody class= >
							<tr>
								<td>Tanggal </td>
								<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi));  ?></td>
							</tr>
							<tr>
								<td>Jumlah total </td>
								<td><?php echo number_format($header_transaksi->jumlah_transaksi);;  ?></td>
							</tr>
							<tr>
								<td>Setatus Pembayaran </td>
								<td><?php echo $header_transaksi->status_bayar  ?></td>
							</tr>

						</tbody>
					</table>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Produk</th>
								<th>Nama Produk</th>
								<th>Jumlah item</th>
								<th>Harga Item</th>
								<th>Total Belanja</th>
								<th>Pengiriman</th>

							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($transaksi as $transaksi){ ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $transaksi->kode_produk ?></td>
								<td><?php echo $transaksi->nama_produk ?></td>
								<td><?php echo $transaksi->jumlah ?></td>
								<td><?php echo number_format($transaksi->harga) ?></td> 
								<td><?php echo number_format($transaksi->total_harga) ?></td>
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
	</section>
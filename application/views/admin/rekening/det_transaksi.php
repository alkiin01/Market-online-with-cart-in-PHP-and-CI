<div class="container-fluid">	
<div align="right">
<p class="pull-right col-sm-20">
	<div class="btn-group pull-right col-sm-3">
		<a href="<?php echo base_url('admin/rekening/cetak_transaksi/').$header_transaksi->kode_transaksi ?>"
			target="_blank" title="Cetak" class="btn btn-success btn-sm">
				<i class="fa fa-print"></i> Cetak
			</a> &nbsp;
		<a href="<?php echo base_url('admin/rekening/transaksi/') ?>" class="btn btn-info btn-sm">
			<i class="fa fa-backward"></i> Kembali
		</a>
	</div>
</p>
</div>
<div class="clearfix"><hr></div>

	<table class="table table-responsive table-hover" id="example2" >
		<thead>
			<tr>
				<th width="20%">Nama Pelanggan</th>
				<th><?php echo $header_transaksi->nama_pelanggan ?></th>
			</tr>
			<tr>
				<th width=>Kode Transaksi</th>
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
				<td>Status Pembayaran </td>
				<td><?php echo $header_transaksi->status_bayar  ?></td>
			</tr>
			<tr>
				<td>Bukti Bayar</td>
				<td><?php if ($header_transaksi->bukti_bayar==""){echo "Belum ada bukti bayar";}else{ ?>
					<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar); ?>"
						class="img img-thumbnail" width=20%>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Bayar </td>
				<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_bayar));  ?></td>
			</tr>
			<tr>
				<td>Jumlah Bayar</td>
				<td> Rp. <?php echo  number_format($header_transaksi->jumlah_bayar,'0',',','.');  ?></td>
			</tr>
			<tr>
				<td>Pembayaran Dari </td>
				<td><?php echo $header_transaksi->nama_bank; echo ' - ';  echo $header_transaksi->rekening_pembayaran ?> a.n <?php echo $header_transaksi->rekening_pelanggan ?> </td>
			</tr>
			<tr>
				<td>Ke Rekening</td>
				<td><?php echo $header_transaksi->bank ?> - <?php echo $header_transaksi->rek ?>
					a.n <?php echo $header_transaksi->nama ?>
				</td>
			</tr>
		</tbody>

<hr class="bg-info">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Produk</th>
				<th>Nama Produk</th>
				<th>Jumlah item</th>
				<th>Harga Item</th>

				<th>Total Belanja</th>

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
				
			</tr>
		<?php $i++; } ?>
		</tbody>
	</table>
</div>
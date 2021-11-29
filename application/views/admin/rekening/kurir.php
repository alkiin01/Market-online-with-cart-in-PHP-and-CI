<div class="container">
	<table class="table table-responsive" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
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
			
			<td><?php echo $i; ?></td>
			<td><strong><?php echo $header_transaksi->nama_pelanggan; ?><strong><br>
			<small>Telepon : <?php echo $header_transaksi->telepon  ?></small><br>
			<small>email :<?php echo $header_transaksi->email ?> </small><br>
			<small>Alamat kirim : <br><?php echo $header_transaksi->alamat ?></small>

			</td>
			<td><?php echo $header_transaksi->kode_transaksi; ?></td>
			<td><?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
			<td><?php echo $header_transaksi->total_item ?></td> 
			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)); ?></td>
			<td><?php echo $header_transaksi->status_bayar ?></td>
			<td><?php echo $header_transaksi->pengiriman ?></td>
			<td>
				<div class="btn-group">
				
				<?php  include 'pengiriman.php'; ?>
				</div>
				<br>
				
			</td>
		</tr>

	<?php $i++; } ?>
	</tbody>
</table>
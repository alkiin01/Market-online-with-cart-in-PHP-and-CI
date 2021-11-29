<div class="container">
		<?php foreach ($total as $total){  ?>
		
		<?php } ?>
	<a href="<?php echo base_url('admin/rekening/cetak/'.date($total->tanggal_transaksi))?>"
			target="_blank" title="Cetak" class="btn btn-success btn-sm">
				<i class="fa fa-print"></i> Cetak
		</a> 
	<table class="table table-responsive" id="example2">
<thead>
<tr>
	<th colspan= 2>Total jumlah pembayaran</th>
	<th><?php echo number_format($total->total_harga); ?></th>
</tr>

</thead>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Kode</th>
			<th>Total item
			<th>Total Harga Item</th>
			<th>Tanggal Transaksi</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
		
	<tbody>
		<?php $i=1; foreach($harga as $harga){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><strong><?php echo $harga->nama_pelanggan; ?></strong><br>
			<small>Telepon : <?php echo $harga->telepon  ?></small><br>
			<small>email :<?php echo $harga->telepon ?> </small><br>
			<small>Alamat kirim : <br><?php echo $harga->alamat ?></small>
			</td>
			<td><?php echo $harga->kode_transaksi; ?></td>
			<td><?php echo $harga->total_item ?></td>
			<td><?php echo number_format($harga->jumlah_transaksi); ?></td>
			
			<td><?php echo date('d-m-Y',strtotime($harga->tanggal_transaksi)); ?></td>
			<td><?php echo $harga->status_bayar ?></td>
		<td>
				<div class="btn-group">
				<a href="<?php echo base_url('admin/rekening/det_transaksi/').$harga->kode_transaksi ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail
				</a>
				<a href="<?php echo base_url('admin/rekening/cetak_transaksi/').$harga->kode_transaksi ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak
				</a>
				
				</div>
			</td>
		</tr>
		
	<?php $i++; } ?>
	

	</tbody>
</table>
</div>
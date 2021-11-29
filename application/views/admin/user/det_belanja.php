
<div class="container">

<?php 
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
	echo '<div class= alert alert-success>'.$sukses.'</div>';
	$this->session->unset_userdata('sukses');
}
?>
<div align="right">
<p class="pull-right col-sm-20">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/user/cetak/').$pel->id_pelanggan ?>"
			target="_blank" title="Cetak" class="btn btn-success btn-sm">
				<i class="fa fa-print"></i> Cetak
		</a> &nbsp;
		<a href="<?php echo base_url('admin/user/pelanggan/') ?>" class="btn btn-info btn-sm">
			<i class="fa fa-backward"></i> Kembali
		</a>
	</div>
</p>
</div>
<?php if ($pelanggan){ ?>
<table class="table table-hover" id="example2">	
	<thead>
	<tr>
		<th>Nama Pelanggan</th>
		<th>: <?php echo $pel->nama_pelanggan ?></th>
	</tr>
	<tr>
		<th>Email</th>
		<th>:<?php echo $pel->email ?></th>
	</tr>
	<tr>
		<th>Telepon</th>
		<th>: <?php echo $pel->telepon ?></th>
	</tr>
	<tr>
		<th>Alamat</th>
		<th>: <?php echo $pel->alamat ?></th>
	</tr>
	<tr>
		<th>Tanggal Daftar</th>
		<th>: <?php echo $pel->tanggal_daftar ?></th>
	</tr>
	
</thead>
	<tbody>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Total Harga Item</th>
		<th>Jumlah item</th>
		<th>Tanggal Transaksi</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>
	
	<?php $no=1; foreach($pelanggan as $pelanggan){?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $pelanggan->kode_transaksi ?></td>
		<td><?php echo number_format($pelanggan->jumlah_transaksi); ?></td>
		<td><?php echo $pelanggan->total_item ?></td> 
		<td><?php echo date('d-m-Y',strtotime($pelanggan->tanggal_transaksi)); ?></td>
		<td><?php echo $pelanggan->status_bayar ?></td>
		<td>
		<div class="btn-group pull-right col-sm-3">
		<a href="<?php echo base_url('admin/user/cetak_transaksi/').$pelanggan->kode_transaksi ?>"
			target="_blank" title="Cetak" class="btn btn-success btn-sm">
				<i class="fa fa-print"></i> Cetak
		</a> &nbsp;
		<div class="btn-group">
				<a href="<?php echo base_url('admin/rekening/det_transaksi/').$pelanggan->kode_transaksi ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail
				</a>
	</td>
	</tr>
	<?php $no++; }?>
	</tbody>
</table>
		<?php }else{ ?>
		<?php echo 'Belanja tidak ada'; ?>
		<?php } ?>
</div>
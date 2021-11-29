<div class="container">
	<?php  echo form_open(base_url('admin/rekening/total/'), 'class="form-horizontal"');?>

	<div class="form-group row">
 	<label class="col-md-2 control-label">Tanggal Transaksi</label>
    <div class="col-sm-5">
    <input type="date" name="tanggal_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?php echo set_value(date('d-m-Y',strtotime('tanggal_transaksi')))  ?>" required >
    </div>
    </div>

    <div class="form-group row">
 	<label class="col-md-2 control-label"></label>
    <div class="col-sm-5">
    	<button class="btn btn-success btn-md" name="submit" type="submit">
    		<i class="fa fa-save"></i> Cari
    	</button>
    </div>
 </div>
<?php form_close(); ?>

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
			<th>Action</th>


		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach($header_transaksi as $header_transaksi){ ?>
		<tr>
			<td><?php echo $i ?></td>
			<td><strong><?php echo $header_transaksi->nama_pelanggan; ?><strong><br>
			<small>Telepon : <?php echo $header_transaksi->telepon  ?></small><br>
			<small>email :<?php echo $header_transaksi->telepon ?> </small><br>
			<small>Alamat kirim : <br><?php echo $header_transaksi->alamat ?></small>

			</td>
			<td><?php echo $header_transaksi->kode_transaksi; ?></td>
			<td><?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
			<td><?php echo $header_transaksi->total_item ?></td> 
			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)); ?></td>
			<td><?php echo $header_transaksi->status_bayar ?></td>
			<td>
				<div class="btn-group">
				<a href="<?php echo base_url('admin/rekening/det_transaksi/').$header_transaksi->kode_transaksi ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail
				</a>
				<a href="<?php echo base_url('admin/rekening/cetak_transaksi/').$header_transaksi->kode_transaksi ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak
				</a>
				
				</div>
			</td>
		</tr>
	<?php $i++; } ?>
	</tbody>
</table>
</div>
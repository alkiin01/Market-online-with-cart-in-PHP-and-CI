
<div class="container">

<?php 
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
	echo '<div class= alert alert-success>'.$sukses.'</div>';
	$this->session->unset_userdata('sukses');
}
?>
<table class="table table-bordered" id="example1">
	<thead>
		<th>NO</th>
		<th>NAMA</th>
		<th>EMAIL</th>
		<th>STATUS PELANGGAN</th>
		<th>TELEPON</th>
		<th>ALAMAT</th>	
		<th>TANGGAL DAFTAR</th>		
		<th>ACTION</th>
	</thead>
	<tbody>
	<?php $no=1; foreach($pelanggan as $pelanggan){?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $pelanggan->nama_pelanggan ?></td>
		<td><?php echo $pelanggan->email ?></td>
		<td><?php echo $pelanggan->status_pelanggan ?></td>
		<td><?php echo $pelanggan->telepon ?></td>
		<td><?php echo $pelanggan->alamat ?></td>
		<td><?php echo $pelanggan->tanggal_daftar ?></td>

		<td>
			<div class="btn-group pull-right col-sm-3">
			<a href="<?php echo base_url('admin/user/edit_pelanggan/'.$pelanggan->id_pelanggan)?>" class=
			"btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
			<a href="<?php echo base_url('admin/user/belanja/'.$pelanggan->id_pelanggan)?>" class=
			"btn btn-info"><i class="fa fa-eye"></i>Detail</a>
		</div>
		</td>
		
	</tr>
	<?php $no++; }?>
	</tbody>
</table>
</div>
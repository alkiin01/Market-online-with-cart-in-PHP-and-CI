<div class="container-fluid"><p>
	<a href="<?php echo base_url('admin/rekening/tambah') ?>" class = "btn btn-success btn-lg"> 
		<i class="fa fa-plus"></i>
		Tambah Baru
	</a>
</p>
<?php
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
	echo '<div class= alert alert-success>';
	echo $sukses;
	echo '</div>';
	$this->session->unset_userdata('sukses');
}
?>
<div class="example2">
<table class="table table-bordered" id="example2">
	<thead>
		<tr>
			<th>No. </th>
			<th>NAMA Bank</th>
			<th>Nomor Rekening </th>
			<th>Nama Pemilik </th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($rekening as $rekening){ ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $rekening->nama_bank ?></td>
			<td><?php echo $rekening->nomor_rekening ?></td>
			<td><?php echo $rekening->nama_pemilik ?></td>	
			<td>
				<a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" class="btn btn-warning btn-sm">
			<i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/rekening/delete/'.$rekening->id_rekening) ?>" class="btn btn-danger btn-sm" onclick = "return confirm ('Yakin ingin menghapus data ini ?');">
				<i class="fa fa-trash"></i>Delete</a>
			</td>
		</tr>	
	<?php $no++; }?>
	</tbody>
</table>
</div>
</div>
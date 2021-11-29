<p>
	<a href="<?php echo base_url('admin/kategori/tambah') ?>" class = "btn btn-success btn-lg"> 
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
			<th width="20px">No. </th>
			<th>NAMA </th>
			<th>SLUG </th>
			<th width="20%">ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($kategori as $kategori){ ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $kategori->nama_kategori ?></td>
			<td><?php echo $kategori->slug_kategori ?></td>
			<td>
				<a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" class="btn btn-warning btn-sm">
			<i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori) ?>" class="btn btn-danger btn-sm" onclick = "return confirm ('Yakin ingin menghapus data ini ?');">
				<i class="fa fa-trash"></i>Delete</a>
			</td>
		</tr>	
	<?php $no++; }?>
	</tbody>
</table>
</div>
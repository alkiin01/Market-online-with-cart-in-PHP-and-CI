<div class="container">
<p>
	<a href="<?php echo base_url('admin/produk/tambah') ?>" class = "btn btn-success btn-lg"> 
		<i class="fa fa-plus"></i>
		Tambah Baru
	</a>
</p>
<?php 
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
	echo '<p class= alert alert-success>';
	echo $sukses;
	echo '</p>';
	$this->session->unset_userdata('sukses');
}
?>

<div class="example2">
<table class="table table-bordered table-hover" id="example1" >
	<thead>
		<tr>
			<th>NO. </th>
			<th>GAMBAR</th>
			<th>NAMA </th>
			<th>KATEGORI </th>
			<th>HARGA </th>
			<th>STOK</th>
			<th>STATUS </th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($produk as $produk){ ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar)?>" 
				class="img img-responsive img-thumbnail" width="60px"></td>
			<td><?php echo $produk->nama_produk ?></td>
			<td><?php echo $produk->nama_kategori ?></td>
			<td><?php echo number_format($produk->harga,'0',',','.') ?></td>
			<td><?php echo $produk->stok ?></td>
			<td><?php echo $produk->status_produk ?></td>
			<td>
			<a href="<?php echo base_url('admin/produk/gambar/'.$produk->id_produk) ?>" class="btn btn-success btn-sm">
			<i class="fa fa-image"></i>Gambar (<?php echo $produk->total_gambar ?>)</a>
				<a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-sm">
			<i class="fa fa-edit"></i>Edit</a>
				<?php include 'delete.php' ?>
			</td>
		</tr>
		
	<?php $no++; }?>
	</tbody>
</table>
</div>
</div>

<div class="container">
<p>
	<a href="<?php echo base_url('admin/user/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru
	</a>
</p>

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
		<th>USERNAME</th>
		<th>LEVEL</th>
		<th>ACTION</th>
	</thead>
	<tbody>
	<?php $no=1; foreach($user as $user){?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $user->nama ?></td>
		<td><?php echo $user->email ?></td>
		<td><?php echo $user->username ?></td>
		<td><?php echo $user->akses_level ?></td>
		<td>
			<a href="<?php echo base_url('admin/user/edit/'.$user->id_user)?>" class=
			"btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
			<?php include 'delete.php'; ?>
		</td>
	</tr>
	<?php $no++; }?>
	</tbody>
</table>
</div>
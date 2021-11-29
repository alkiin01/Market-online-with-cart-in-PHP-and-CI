<?php 
if (isset($error)){
   echo '<p class=alert alert-warning>';
   echo $error;
   echo '</p>';
}

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk), 'class="form-horizontal"');
 ?>
 <div class="form-group form-group-lg row">
 	<label class="col-md-2 control-label">Judul Gambar</label>
    <div class="col-md-6">
    <input type="text" name="judul_gambar" class="form-control" placeholder="Judul/Nama Gambar"
    value="<?php echo set_value('judul_gambar')  ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Gambar</label>
    <div class="col-sm-2">
    <input type="file" name="gambar" class="form-control" placeholder="Gambar" 
    value="<?php echo set_value('gambar')  ?>" required >
    </div>
 </div>

<div class="form-group row">
 	<label class="col-md-2 control-label"></label>
    <div class="col-sm-5">
    	<button class="btn btn-success btn-md" name="submit" type="submit">
    		<i class="fa fa-save"></i> Simpan dan Unggah Gambar
    	</button>
    	<button class="btn btn-info btn-md" name="reset" type="reset">
    		<i class="fa fa-times"></i> Reset
    	</button>
    </div>
</div>
    

<?php echo form_close();?>
<?php 
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
	echo '<div class= alert alert-success>'.$sukses.'</div>';
	$this->session->unset_userdata('sukses');
}
?>
<table class="table table-bordered table-hover" id="example1" >
	<thead>
		<tr>
			<th>NO. </th>
			<th>GAMBAR</th>
			<th>Judul </th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
    <tr>   
    <td>1</td> 
			<td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar)?>" 
				class="img img-responsive img-thumbnail" width="60px"></td>
			<td><?php echo $produk->nama_produk ?></td>
		</tr>
		<?php $no=2; foreach ($gambar as $gambar){ ?>
		<tr>
			<td><?php echo $no ?></td>
			<td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar)?>" 
				class="img img-responsive img-thumbnail" width="60px"></td>
			<td><?php echo $gambar->judul_gambar ?></td>
			<td>
				<a href="<?php echo base_url('admin/produk/delete_gambar/'.$produk->id_produk.'/'
                .$gambar->id_gambar) ?>" class="btn btn-danger btn-sm" onclick=
                "return confirm('Yakin ingin menghapus gambar ini ?')"> 
			    <i class="fa fa-trash-o"></i>Hapus</a>
			
            </td>
		</tr>
		
	<?php $no++; }?>
	</tbody>
</table>
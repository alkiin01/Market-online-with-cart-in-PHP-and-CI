<?php 
if (isset($error)){
   echo '<p class=alert alert-warning>';
   echo $error;
   echo '</p>';
}

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open_multipart(base_url('admin/konfigurasi/berita'), 'class="form-horizontal"');
 ?>
 
 <?php
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
	echo '<div class= alert alert-success>'.$sukses.'</div>';
	$this->session->unset_userdata('sukses');
}
?>
 <div class="container">
 <div class="form-group form-group-lg row">
 	<label class="col-md-2 control-label">Judul berita</label>
    <div class="col-md-8">
    <input type="text" name="judul_berita" class="form-control" placeholder="Nama Website"
    value="<?php echo set_value('judul_berita') ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Jenis Berita</label>
    <div class="col-sm-8">
    <input type="text" name="jenis_berita" class="form-control"
    value="<?php echo set_value('jenis_berita')  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Keterangan</label>
    <div class="col-sm-8">
    <input type="text" name="keterangan" class="form-control"  
    value="<?php echo set_value('keterangan')  ?>" required >
    </div>
 </div>


 <div class="form-group row">
 	<label class="col-md-2 control-label">Alamat web</label>
    <div class="col-sm-8">
    <input type="text" name="alamat_berita" class="form-control" 
    value="<?php echo set_value('alamat_berita') ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Gambar</label>
    <div class="col-sm-8">
    <input type="file" name="gambar" class="form-control">
    </div>
 </div>


<div class="form-group row">
 	<label class="col-md-2 control-label"></label>
    <div class="col-sm-5">
    	<button class="btn btn-success btn-md" name="submit" type="submit">
    		<i class="fa fa-save"></i> Simpan
    	</button>
    	<button class="btn btn-info btn-md" name="reset" type="reset">
    		<i class="fa fa-times"></i> Reset
    	</button>
    </div>
 </div>
</div>
</div>

<?php echo form_close();?>
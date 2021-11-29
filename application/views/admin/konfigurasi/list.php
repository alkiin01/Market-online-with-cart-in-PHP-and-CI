<?php 
if (isset($error)){
   echo '<p class=alert alert-warning>';
   echo $error;
   echo '</p>';
}

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open_multipart(base_url('admin/konfigurasi'), 'class="form-horizontal"');
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
 	<label class="col-md-2 control-label">Nama Website</label>
    <div class="col-md-8">
    <input type="text" name="namaweb" class="form-control" placeholder="Nama Website"
    value="<?php echo $konfigurasi->namaweb ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Tagline/ Moto</label>
    <div class="col-sm-8">
    <input type="text" name="tagline" class="form-control" placeholder="Tagline / Moto" 
    value="<?php echo $konfigurasi->tagline  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">email</label>
    <div class="col-sm-8">
    <input type="text" name="email" class="form-control" placeholder="Email" 
    value="<?php echo $konfigurasi->email  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Website</label>
    <div class="col-sm-8">
    <input type="text" name="website" class="form-control" placeholder="Website" 
    value="<?php echo $konfigurasi->website  ?>" required ></div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Telepon/HP</label>
    <div class="col-sm-8">
    <input type="text" name="telepon" class="form-control" placeholder="Telepon" 
    value="<?php echo $konfigurasi->telepon  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Alamat Kantor </label>
    <div class="col-sm-8">
    <input type="text" name="alamat" class="form-control" placeholder="Alamat Kantor" 
    value="<?php echo $konfigurasi->alamat  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Alamat facebook</label>
     <div class="col-sm-8">
    <input type="url" name="facebook" class="form-control" placeholder="Alamat facebook" 
    value="<?php echo $konfigurasi->facebook  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Alamat Instagaram</label>
     <div class="col-sm-8">
    <input type="url" name="instagram" class="form-control" placeholder="Alamat instagram" 
    value="<?php echo $konfigurasi->instagram  ?>" required >
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Deskripsi website</label>
     <div class="col-sm-8">
    <textarea name="deskripsi" class="form-control" fixed>
    <?php echo $konfigurasi->deskripsi ?>
    </textarea>
    </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Kata Kunci</label>
    <div class="col-md-8">
    <textarea name="keywords" class="form-control"><?php echo $konfigurasi->keywords; ?></textarea>
 </div>
 </div>

 <div class="form-group row">
 	<label class="col-md-2 control-label">Metatext</label>
    <div class="col-sm-8">
    <input type="text" name="metatext" class="form-control" placeholder="Metatext" 
    value="<?php echo $konfigurasi->metatext  ?>" required >
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
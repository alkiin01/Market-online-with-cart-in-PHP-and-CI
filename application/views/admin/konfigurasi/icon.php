<?php 
if (isset($error)){
   echo '<p class=alert alert-warning>';
   echo $error;
   echo '</p>';
}

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open_multipart(base_url('admin/konfigurasi/icon'), 'class="form-horizontal"');
 ?>
 
 <?php
$sukses= $this->session->flashdata('sukses');
if(isset($sukses)){
echo '<div class= alert alert-success>';
echo $sukses;
echo '</div>';
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
 	<label class="col-md-2 control-label">Upload icon baru</label>
    <div class="col-sm-8">
    <input type="file" name="icon" class="form-control" placeholder="Upload icon baru" 
    value="<?php echo $konfigurasi->icon  ?>" required >
    Icon lama : <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>"
        class="img img-responsive img-thumbnail" width="50px" height="50px">
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
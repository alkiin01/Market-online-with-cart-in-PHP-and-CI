<div class="container-fluid">
<?php 
echo validation_errors('<div class="alert-warning>"','</div>');
if($this->session->flashdata('sukses')){
echo '<p class="alert alert-success">';
echo $this->session->flashdata('sukses');

echo '</p>';
}
echo form_open(base_url('admin/user/status/').$status->id_status, 'class="form-horizontal"');
 ?>
 <div class="form-group row">
 	<label class="col-md-2 control-label">Nama Status</label>
    <div class="col-sm-5">
    <input type="text" name="status_pelanggan" class="form-control" placeholder="Status Pelanggan" value="<?php echo $status->status_pelanggan; ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Urutan</label>
    <div class="col-sm-5">
    <input type="number" name="urutan" class="form-control" placeholder="urutan" value="<?php echo $status->urutan?>" required >
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
<?php echo form_close();?>
</div>
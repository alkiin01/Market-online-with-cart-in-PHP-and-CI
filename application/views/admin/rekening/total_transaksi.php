<div class="container">
	<?php  echo form_open(base_url('admin/rekening/total/'), 'class="form-horizontal"');?>

	<div class="form-group row">
 	<label class="col-md-2 control-label">Tanggal Transaksi</label>
    <div class="col-sm-5">
    <input type="date" name="tanggal_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="<?php echo set_value('tanggal_transaksi')  ?>" required >
    </div>
    </div>

    <div class="form-group row">
 	<label class="col-md-2 control-label"></label>
    <div class="col-sm-5">
    	<button class="btn btn-success btn-md" name="submit" type="submit">
    		<i class="fa fa-save"></i> Cari
    	</button>
    </div>
 </div>
<?php form_close(); ?>
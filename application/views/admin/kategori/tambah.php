<?php 

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open(base_url('admin/kategori/tambah'), 'class="form-horizontal"');
 ?>
 <div class="form-group row">
 	<label class="col-md-2 control-label">Nama Kategori</label>
    <div class="col-sm-5">
    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kateogri" value="<?php echo set_value('nama')  ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Urutan</label>
    <div class="col-sm-5">
    <input type="number" name="urutan" class="form-control" placeholder="urutan" value="<?php echo set_value('email')  ?>" required >
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
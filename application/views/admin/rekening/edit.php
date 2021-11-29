<?php 

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open(base_url('admin/rekening/edit/'.$rekening->id_rekening ), 'class="form-horizontal"');
 ?>
 <div class="form-group row">
 	<label class="col-md-2 control-label">Nama Bank</label>
    <div class="col-sm-5">
    <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $rekening->nama_bank  ?>" required >
    </div>
    </div>

<div class="form-group row">
    <label class="col-md-2 control-label">Nomor Rekening</label>
    <div class="col-sm-5">
    <input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?php echo $rekening->nomor_rekening  ?>" required >
    </div>
    </div>
<div class="form-group row">
    <label class="col-md-2 control-label">Nama Pemilik Rekening</label>
    <div class="col-sm-5">
    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik" value="<?php echo $rekening->nama_pemilik  ?>" required >
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
<?php echo form_close();?>
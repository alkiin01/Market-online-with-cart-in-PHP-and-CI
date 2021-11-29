<?php 

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open(base_url('admin/user/edit_pelanggan/'.$pelanggan->id_pelanggan ), 'class="form-horizontal"');
 ?>
 <div class="form-group row">
 	<label class="col-md-2 control-label">Nama Pengguna</label>
    <div class="col-sm-5">
    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pengguna" value="<?php echo $pelanggan->nama_pelanggan  ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Email</label>
    <div class="col-sm-5">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email  ?>" required >
    </div>
 </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Password</label>
    <div class="col-sm-5">
    <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password')  ?>" >
    </div>
 </div>


<div class="form-group row">
 	<label class="col-md-2 control-label">Status</label>
    <div class="col-sm-5">
    	<select name="id_status" class="form-control">
      <?php foreach($status as $status) { ?>
      <option value="<?php echo $status->id_status ?>" 
      <?php if($pelanggan->id_status==$status->id_status)
      { echo "selected";}?> > 
         <?php echo $status->status_pelanggan; ?>
      </option>
  <?php } ?>
    </select>

 </div>
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">Telepon</label>
    <div class="col-sm-5">
    <input type="text" name="telepon" class="form-control" placeholder="Masukan nomor telepon" value="<?php echo $pelanggan->telepon ?>">
    </div>
 </div>
<div class="form-group row">
    <label class="col-md-2 control-label">Alamat</label>
    <div class="col-sm-5">
    <textarea name="alamat" class="form-control" placeholder="Masukan lengkap alamat anda"><?php echo $pelanggan->alamat ?></textarea>
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
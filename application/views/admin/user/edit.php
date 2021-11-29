<?php 

echo validation_errors('<div class="alert-warning>"','</div>');

echo form_open(base_url('admin/user/edit/'.$user->id_user ), 'class="form-horizontal"');
 ?>
 <div class="form-group row">
 	<label class="col-md-2 control-label">Nama Pengguna</label>
    <div class="col-sm-5">
    <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama  ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Email</label>
    <div class="col-sm-5">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email  ?>" required >
    </div>
 </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Username</label>
    <div class="col-sm-5">
    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username  ?>" readonly >
    </div>
 </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Password</label>
    <div class="col-sm-5">
    <input type="password" name="password" class="form-control" placeholder="Ketik ulang password anda" value="<?php echo set_value('password') ?>" required >
    </div>
 </div>


<div class="form-group row">
 	<label class="col-md-2 control-label">Akses</label>
    <div class="col-sm-5">
    <select name="akses_level" class="form-control">
    	<option value="Admin">Admin</option>
    	<option value="User"<?php if($user->akses_level=="User") {echo "selected";} ?>>User</option>
        <option value="Kurir"<?php if($user->akses_level=="Kurir") {echo "selected";} ?>>Kurir</option> 
    </select>
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
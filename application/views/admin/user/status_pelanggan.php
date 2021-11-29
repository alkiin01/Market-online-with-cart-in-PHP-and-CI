<div class="container-fluid"><?php 
echo validation_errors('<div class="alert-warning>"','</div>');
if($this->session->flashdata('sukses')){
echo '<p class="alert alert-success">';
echo $this->session->flashdata('sukses');

echo '</p>';
}
echo form_open(base_url('admin/user/status'), 'class="form-horizontal"');
 ?>
 <div class="form-group row">
 	<label class="col-md-2 control-label">Nama Status</label>
    <div class="col-sm-5">
    <input type="text" name="status_pelanggan" class="form-control" placeholder="Status Pelanggan" value="<?php echo set_value('status_pelanggan')  ?>" required >
    </div>
    </div>

<div class="form-group row">
 	<label class="col-md-2 control-label">Urutan</label>
    <div class="col-sm-5">
    <input type="number" name="urutan" class="form-control" placeholder="urutan" value="<?php echo set_value('urutan')?>" required >
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
 <hr>
<div class="example1">
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama Status </th>
            <th>URUTAN </th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($status as $status){ ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $status->status_pelanggan ?></td>
            <td><?php echo $status->urutan?></td>
            <td>
                <a href="<?php echo base_url('admin/user/edit_status/'.$status->id_status) ?>" class="btn btn-warning btn-sm">
            <i class="fa fa-edit"></i>Edit</a>
                <a href="<?php echo base_url('admin/user/delete_status/'.$status->id_status) ?>" class="btn btn-danger btn-sm" onclick = "return confirm ('Yakin ingin menghapus data ini ?');">
                <i class="fa fa-trash"></i>Delete</a>
            </td>
        </tr>   
    <?php $no++; }?>
    </tbody>
</table>
</div>
</div>
</div>
</div>

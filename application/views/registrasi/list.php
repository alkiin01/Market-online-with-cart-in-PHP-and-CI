

<section class="bgwhite p-t-70 p-b-100">
<div class="container">

<div class="pos-relative">
	<div class="bgwhite">
		<h1><?php echo $title ?></h1><hr>
		<div class="clearfix"></div>
		<?php 
		$sukses= $this->session->flashdata('sukses');
		if(isset($sukses)){
			echo '<div class= alert alert-success>'.$sukses.'</div>';
			$this->session->unset_userdata('sukses');
		}
		?>
		<div class="alert alert-success">
			Sudah memiliki akun ? <a href="<?php echo base_url('masuk') ?>" class="btn btn-info">&nbsp;Login di sini !</a>
		</div>
		<div class="col-md-12">

			<?php
			// Validasi Error
				echo validation_errors('<div class="alert alert-warning">','</div>');
			//Form open
			 echo form_open(base_url('registrasi'),'class = "leave-comment"'); ?>
			<table class="table table-responsive p-0">
				<tbody>
					<tr>
						<td >Nama  </td>
						<td><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" value="<?php echo set_value('email') ?>"></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password" class="form-control" placeholder="Masukan Password" value="<?php echo set_value('password') ?>"></td>
					</tr>
					<tr>
						<td>Telepon </td>
						<td><input type="text" name="telepon" class="form-control" placeholder="Masukan nomor telepon" value="<?php echo set_value('telepon') ?>"></td>
					</tr>
					<tr>
						<td>Alamat </td>
						<td><textarea name="alamat" class="form-control" placeholder="Masukan lengkap alamat anda" value="<?php echo set_value('alamat') ?>"></textarea></td>
					</tr>
					<tr>
						<td>Daftar sebagai :  </td>
						<td>
							<select name="status_pelanggan" class="form-control">
							<?php foreach($status as $status){ ?>
							<option value="<?php echo $status->id_status ?>">
								<?php echo $status->status_pelanggan ?>
							</option>
							<?php } ?>
									
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
						<button type="reset" class="btn btn-warning"><i class="fa fa-times"></i> Bersihkan</button></td>
					</tr>
				</tbody>
			</table>
		</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
	<div class="size10 trans-0-4 m-t-10 m-b-10">
		
		
	</div>
</div>


</div>
</section>

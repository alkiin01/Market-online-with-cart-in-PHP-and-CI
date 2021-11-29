<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<h4 class="m-text14 p-b-7">
					<?php include 'menu.php'; ?>
				</h4>
			</div>
		</div>
		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
		
				
				<h1><?php echo $title; ?></h1>
				
		<?php 
		$sukses = $this->session->flashdata('sukses');
		if($sukses){
			echo '<div class="alert alert-success">';
			echo $this->session->flashdata('sukses');
			$this->session->unset_userdata('sukses');
			echo '</div>';
		}
		 ?>

				<?php
			// Validasi Error
				echo validation_errors('<div class="alert alert-warning">','</div>');
			//Form open
			 echo form_open(base_url('dasbor/profil'),'class = "leave-comment"'); ?>
			<table class="table table-responsive p-0">
				<tbody>
					<tr>
						<td >Nama  </td>
						<td><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" value="<?php echo $pelanggan->email ?>" readonly></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password" class="form-control" placeholder="Masukan Password" value="<?php echo set_value('password') ?>">
							<span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru</span>
						</td>
					</tr>
					<tr>
						<td>Telepon </td>
						<td><input type="text" name="telepon" class="form-control" placeholder="Masukan nomor telepon" value="<?php echo $pelanggan->telepon ?>"></td>
					</tr>
					<tr>
						<td>Alamat </td>
						<td><textarea name="alamat" class="form-control" placeholder="Masukan lengkap alamat anda"><?php echo $pelanggan->alamat ?></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Profil</button>
						<button type="reset" class="btn btn-warning"><i class="fa fa-times"></i> Bersihkan</button></td>
					</tr>
				</tbody>
			</table>

			<?php echo form_close(); ?>
				<!--  -->
				</div>
			
		
	</div>
	</div>
	</section>
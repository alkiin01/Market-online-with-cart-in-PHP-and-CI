

<section class="bgwhite p-t-70 p-b-100">
<div class="container">

<div class="card">
	<div class="card-body ">
	<div class="bgwhite">
		<h1 class="text-center"><?php echo $title ?></h1><hr>
		<div class="clearfix"></div>
		<?php 
		$sukses= $this->session->flashdata('sukses');
		if(isset($sukses)){
			echo '<div class= alert alert-success>'.$sukses.'</div>';
			$this->session->unset_userdata('sukses');
		}
		?>
		<div class="alert alert-success">
			Belum memiliki akun ? <a href="<?php echo base_url('registrasi') ?>" class="btn btn-info">Daftar di sini !</a>
		</div>
		<div class="col-md-12 col-md-offset-2">

			<?php
			// Validasi Error
				echo validation_errors('<div class="alert alert-warning">','</div>');

			//Notifi
		 if($this->session->flashdata('salah')){
			echo '<div class="alert alert-warning alert-dismissable fade show" role="alert">';
			echo $this->session->flashdata('salah');
			echo '</div>';
			$this->session->sess_destroy();
		}
		//Notifkasi Logout
		  if($this->session->flashdata('sukses')){
		    echo '<p class="alert alert-warning alert-dismissable fade show" role="alert">';
		    echo $this->session->flashdata('sukses');
		    echo '</p>';
		    $this->session->sess_destroy();
		  }

		  	 if($this->session->flashdata('warning')){
		    echo '<p class="alert alert-warning alert-dismissable fade show" role="alert">';
		    echo $this->session->flashdata('warning');
		    echo '</p>';
		    $this->session->sess_destroy();
		  }
			//Form open
			 echo form_open(base_url('masuk'),'class = "leave-comment"'); 
		?>
		
			<table class="table table-responsive p-0 tabel-center">
				<tbody>
					<tr>
						<td width="20%">Email (Username)</td>
						<td><input type="email" name="email" class="form-control" placeholder="Masukan Email Anda"></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password" class="form-control" placeholder="Masukan Password" value="<?php echo set_value('password') ?>"></td>
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


</div>

</div>
</section>

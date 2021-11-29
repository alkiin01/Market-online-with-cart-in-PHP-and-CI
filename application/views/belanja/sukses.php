

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
		<p class="alert alert-success">
			Terima Kasih, Barang ada sudah di beli dan akan segera kami proses
		</p>
	</div>
	</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
	<div class="size10 trans-0-4 m-t-10 m-b-10">
		
		
	</div>
</div>


</div>
</section>


<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">

<div class="container">
	
<!-- Cart item -->
<div class="container-table-cart pos-relative">

	<div class="wrap-table-shopping-cart bgwhite">
		<h1><?php echo $title ?></h1><hr>
		<?php 
		$sukses= $this->session->flashdata('sukses');
		if(isset($sukses)){
			echo '<div class= alert alert-success>'.$sukses.'</div>';
			$this->session->unset_userdata('sukses');
		}
?>
	
		<div class="clearfix"></div><br><br>
		<table class="table-shopping-cart">
			<tr class="table-head">
				<th class="column-1">Gambar</th>
				<th class="column-2">PRODUK</th>
				<th class="column-3">HARGA</th>
				<th class="column-4 p-l-70">JUMLAH</th>
				<th class="column-5" width="15%">Sub total</th>
				<th class="column-6" width="20%">Action</th>
			</tr>

			<?php 
			

			foreach($keranjang as $keranjang){

				//Ambil data produk
				$id_produk = $keranjang['id'];
				$produk = $this->produk_model->detail($id_produk);
				//
				echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
				//
				
			 ?>
			
			<tr class="table-row">
				<td class="column-1">
					<div class="cart-img-product b-rad-4 o-f-hidden">
						<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" 
						alt="<?php echo $keranjang['name'] ?>">
					</div>
				</td>
				<td class="column-2"><?php echo $keranjang['name'] ?></td>
				<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
				<td class="column-4">
					<div class="flex-w bo5 of-hidden w-size17">
						<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
						</button>

						<input class="size8 m-text18 t-center num-product" type="number" name="qty" 
						value="<?php echo $keranjang['qty'] ?>">

						<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
						</button>
					</div>
				</td>
				<td class="column-5">Rp.
					<?php $sub_total = $keranjang['price'] * $keranjang['qty'] ?>
				 <?php echo number_format($sub_total,'0','','.') ?>
				 	
				 </td>
				 
				 <td>
				 <button type="submit" name="update" class="btn btn-warning btn-sm">
				 	<i class="fa fa-edit"></i>Update
				 </button>
				 <a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" type="submit" name="update" class="btn btn-danger btn-sm">
				 	<i class="fa fa-trash-o"></i>Delete
				 </a>	
				 </td>
				</tr>
			<?php 
				 echo form_close();
				}
			
			 ?>
			 <tr class="table-row">
			 	<td colspan="4" class="column-1" >Total Belanja</td>
			 	<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
			 </tr>
			
		</table>
	<p class="pull-right">
		<?php if (!empty($keranjang)){ ?>
		<a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-lg">
			<i class="fa fa-trash-o"></i>Bersihkan Keranjang Belanja
		</a>
		<a href="<?php echo base_url('belanja/cekout') ?>" class="btn btn-success btn-lg">
			<i class="fa fa-shopping-cart"></i> Beli
		</a>
	<?php }?>
	</p>
	</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
	<div class="size10 trans-0-4 m-t-10 m-b-10">
		
		
	</div>
</div>


</div>
</section>

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

				
				<!--  -->
				
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">				
				<h1><?php echo $title; ?>

				</h1>
				<p>Berikut riwayat belanja anda</p>
				<?php if ($header_transaksi){ ?>
					<table class="table table-responsive table-hover">
						<thead>
							<tr>
								<th width="20%">Kode Transaksi</th>
								<th><?php echo $header_transaksi->kode_transaksi ?></th>
							</tr>
						</thead>
						<tbody class= >
							<tr>
								<td>Tanggal </td>
								<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi));  ?></td>
							</tr>
							<tr>
								<td>Jumlah total </td>
								<td><?php echo number_format($header_transaksi->jumlah_transaksi);;  ?></td>
							</tr>
							<tr>
								<td>Setatus Pembayaran </td>
								<td><?php echo $header_transaksi->status_bayar  ?></td>
							</tr>
							<tr>
								<td>Bukti Bayar</td>
								<td><?php if($header_transaksi->bukti_bayar !=""){ ?>
									<img src="<?php echo base_url('assets/upload/image/').$header_transaksi->bukti_bayar; ?>" class="img img-thumbnail" width="200"> 
								<?php }else{echo 'Belum ada bukti bayar';} ?>
								</td>
							</tr>

						</tbody>
					</table>

					<?php if(isset($error)){
						echo '<p class="alert alert-warning>'.$error.'</p>';

					} 
					echo validation_errors('<p class="alert alert-warning">','</p>');
					echo form_open_multipart(base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi),'<class="form-horizontal"');
					?>
					<table class="table">
						<tbody>
							<tr>
								<td width="30%">Pembayaran ke rekening</td>
								<td><select name="id_rekening" class="form-control">
									<?php foreach($rekening as $rekening){ ?>
									<option value="<?php echo $rekening->id_rekening  ?>" 
									<?php if($header_transaksi->id_rekening = $rekening->id_rekening){
										echo 'selected';
									} ?>>
										<?php echo $rekening->nama_bank ?>(No. Rekening)<?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>
									</option>
									<?php } ?>
								</select></td>
							</tr>
						
							<tr>
								<td>Tanggal Pembayaran</td>
								<td><input type="date" name="tanggal_bayar" class="form-control" placeholder="dd-mm-yyyy	" value="<?php if(isset($_POST['tanggal_bayar'])){ echo set_value('tanggal_bayar'); }
								elseif($header_transaksi->tanggal_transaksi!=""){
									echo $header_transaksi->tanggal_bayar; }
									else{ echo date('d-m-Y'); }?>"></td>
							</tr>
							<tr>
								<td>Jumlah Pembayaran</td>
								<td><input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) {
									echo set_value('jumlah_bayar'); }
									elseif($header_transaksi->jumlah_bayar!=""){
										echo $header_transaksi->jumlah_bayar;
									}
									else{ echo $header_transaksi->jumlah_transaksi; } ?>"></td>
							</tr>
							<tr>
								<td>Dari Bank</td>
								<td>
									<input type="text" name="nama_bank" class="form-control" value="<?php echo $header_transaksi->nama_bank; ?>" placeholder="Nama Bank">
									<small>Contoh : Bank BCA</small>
								</td>
							</tr>
							<tr>
								<td>Dari Nomor Rekening</td>
								<td>
									<input type="text" name="rekening_pembayaran" class="form-control" value="<?php echo $header_transaksi->rekening_pembayaran ?>" placeholder="Nomor Rekening">
								</td>
							</tr>
							<tr>
								<td>Nama Pemilik Rekening</td>
									
								<td><input type="text" name="rekening_pelanggan" class="form-control" value="<?php echo $header_transaksi->rekening_pelanggan ?>" placeholder="Rekening Pelanggan"></td>
							</tr>
							<tr>
								<td>Upload Bukti Bayar</td>
									<td>
										<input type="file" name="bukti_bayar" class="form-control" placeholder="Upload bukti Pembayaran">
								</td>
							</tr>
							<tr>
								<td><div class="btn-group">
									<button class="btn btn-succes btn-lg" type="submit" name="submit">
										<i class="fa fa-upload"></i>Submit</button>
									<button class="btn btn-info btn-lg" type="reset" name="reset">
										<i class="fa fa-times"></i>Reset</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<?php echo form_close(); ?>

				<?php }else{ ?>
					<?php echo 'Belanja tidak ada'; ?>
				<?php } ?>

			<!-- Pagination -->
			
		</div>
	</div>
	</div>
	</section>
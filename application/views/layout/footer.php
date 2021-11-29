<!-- Footer -->
<?php 
$site = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();
 ?>
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Kontak Kami
				</h4>

				<div>
					<p class="s-text7 w-size27">
						<?php echo $site->alamat ?>
						<br>
						<i class="fa fa-envelope"></i> <?php echo $site->email ?>
					</p>

					<div class="flex-m p-t-30">
					<a href="<?php echo $site->facebook ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="<?php echo $site->instagram ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori Produk
				</h4>

				<ul>
					<?php foreach($nav_produk_footer as $nav_produk_footer){ ?>
					<li class="p-b-9">
						<a href="<?php echo base_url('produk/kategori/'.$nav_produk_footer->slug_kategori) ?>"
						 class="s-text7">
							<?php echo $nav_produk_footer->nama_kategori ?>
						</a>
					<?php } ?>
					</li>

					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Berbagi ilmu
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="https://www.instagram.com/alakazamfarm" class="s-text7">
							Tentang Peternakan Kami
						</a>
					</li>

					<li class="p-b-9">
						
					</li>

					<li class="p-b-9">
						
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				

				<form>
					<div class="effect1 w-size9">
						
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			

			<div class="t-center s-text8 p-t-20">
				Copyright © 2021 All rights reserved.
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/sweetalert/sweetalert.min.js"></script>
	<!-- <script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script> -->

<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/js/main.js"></script>

</body>
</html>
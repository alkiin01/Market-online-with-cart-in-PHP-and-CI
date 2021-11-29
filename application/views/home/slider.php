<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<?php foreach ($sproduk as $sproduk){ ?>
				<div class="item-slick1 item1-slick1" style="background-color: darkred; ">
					<div class="bg-title-page sizefull flex-col-c-m p-l-10 p-r-10 p-t-50 p-b-40">
						<span class="title-page m-text1 t-center animated visible-false m-b-15">

						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
								<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn"> 
							<a href="<?php //echo base_url('produk') ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Belanja Sekarang
							</a>
						</div> 
					</div>
				</div>
<?php } ?>
				
			</div>
		</div>
	</section>
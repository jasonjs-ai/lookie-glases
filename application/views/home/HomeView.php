
		<!-- Start Slider Area -->
		<div class="slider_area slide_active">
			<!-- Start Single Slide -->
			<div class="slide slide_fixed_height bg_image--1 animation__style01 d-flex align-items-center poss_relative">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12">

							<div class="slide_text">
								<h3>NEW STYLES</h3>
								<h1>GLASSES FOR
									<br> MEN & WOMEN</h1>
								<a href="<?= base_url("VTO"); ?>">Try Now</a>
							</div>

							<div class="rotate_titlE">
								<h2>TRY ON</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slide -->
		</div>
        <!-- End Slider Area -->
        <?php if($ListKacamata != null) : ?>
        <?php if(count($ListKacamata) > 4) : ?>
		<!-- Start Product Area -->
		<div class="product_area section-pt-xl section-pb-xl bg-white">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section_title text-center">
							<h2>NEW ARRIVAL</h2>
							<p>Eye chasmish are very important for thos whos have some difficult in their eye to see every hing clearly and perfectly</p>
						</div>
					</div>
				</div>
				<div class="row mt--20">
                <?php $random_product=array_rand($ListKacamata,count($ListKacamata) > 4 ? 4 : count($ListKacamata)); ?>
                <?php foreach($random_product as $key): ?>
                    <!-- Start Single Product -->
					<div class="col-lg-3 col-xl-3 col-sm-6 col-12">
						<div class="product">
							<div class="thumb">
								<a href="single-product.html">
									<img src="<?= base_url($this->config->item('GlassesImageUploadPath') . strtolower($ListKacamata[$key]->code) . "/") . $ListKacamata[$key]->front; ?>" alt="product img">
								</a>
								<div class="product_action">
									<h4>
										<a href="<?= base_url("VTO"); ?>"></a>
									</h4>
									<ul class="cart_action">
										<li>
											<a href="<?= base_url("VTO?p=") .  $ListKacamata[$key]->code;  ?>">
                                            <img src="<?= base_url(); ?>assets/img/icons/quick_view.png" alt="icons">
											</a>
										</li>
									</ul>
								</div>
								<div class="content">
									<h4>
										<!--<a href="<?= base_url("VTO"); ?>"><?= $ListKacamata[$key]->name; ?></a>-->
									</h4>
								</div>
							</div>
						</div>
					</div>
                    <!-- End Single Product -->
                    <?php endforeach; ?>
				</div>
			</div>
		</div>
		<!-- End Product Area -->
		<?php endif; ?>
		<?php endif; ?>
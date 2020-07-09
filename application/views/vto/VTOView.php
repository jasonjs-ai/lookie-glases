<!-- Start Product Area -->
<div class="product_area section-pt-xl section-pb-xl bg-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section_title text-center">
					<h2>Virtual Try On</h2>
					<p id="product_name"></p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- Start Single Product -->
			<div class="col-lg-12">
			<div id="tryon">
            <video id="camera" loop></video>
            <canvas id="overlay"></canvas>
		</div>
		<?php if($this->session->userdata('is_set')) : ?>
		<button id="start">Start</button>
		<br/>
		<?php endif; ?>
		<div id="debug" style="display:none"></div>
	
			</div>
			<div class="col-lg-12">
			<select class="form-control" id="glasses" name="Kacamata" required></select>
		</div>
			<!-- End Single Product -->
		</div>
	</div>
</div>
<!-- End Product Area -->
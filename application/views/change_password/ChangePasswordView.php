<main id="app-main" class="app-main">
	<div class="wrap">
		<section class="app-content">
			<div class="row">
				<div class="col-md-12">
					<div class="widget">
						<header class="widget-header">
							<h4 class="widget-title"><?php echo $base_controller->translate($this->session->userdata('page')); ?></h4>
						</header>
						<hr class="widget-separator">
						<div class="widget-body">
							<form id="formData" class="form-horizontal">
								<div class="form-group"><label for="oldpassword" class="col-sm-3 control-label">Kata Sandi Lama:</label>
									<div class="col-sm-6"><input type="password" required class="form-control" id="oldpassword" name="Old Password"></div>
								</div>
								<div class="form-group"><label for="newpassword" class="col-sm-3 control-label">Kata Sandi Baru:</label>
									<div class="col-sm-6"><input type="password" required class="form-control" id="newpassword" name="New Password"></div>
								</div>
								<div class="form-group"><label for="re-newpassword" class="col-sm-3 control-label">Konfirmasi Kata Sandi Baru:</label>
									<div class="col-sm-6"><input type="password" required class="form-control" id="re-newpassword" name="Re-Type New Password"></div>
								</div>
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<a id="btnSave" class="btn btn-success" href="#"><i class="fa fa-save"></i> Simpan</a>
									</div>
								</div>
						</div>
					</div>
				</div>
		</section>
	</div>
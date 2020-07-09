<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b></b> <?= $base_controller->Configs->VERSION; ?>
	</div>
	<strong>  <?= date('Y'); ?> <a href="<?= base_url(); ?>"><?= $base_controller->Configs->COMPANY_NAME; ?></a></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Moment -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?= base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<!-- SweetAlert2 
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>-->
<!-- SweetAlert -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert2.all.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/js/demo.js"></script>
<!-- Filterizr-->
<script src="<?= base_url(); ?>assets/plugins/filterizr/jquery.filterizr.min.js"></script>
<?php if ($this->session->userdata('page') != $this->config->item('Dashboard')){ ?>
  <!-- Bootstrap Date Time Picker -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<?php } ?>
<!-- date-range-picker -->
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Page specific script -->
<script>
	$(document).ready(function() {
		var message = $("#messages").val();
		var messagearr = message.split(";")
		if (message != ";") {
			if (messagearr[0] == "<?= $this->config->item('Success') ?>") {
				toastr.success(messagearr[1]);
			} else if (messagearr[0] == "<?= $this->config->item('Error') ?>") {
				toastr.error(messagearr[1]);
			} else if (messagearr[0] == "<?= $this->config->item('Warning') ?>") {
				toastr.warning(messagearr[1]);
			} else if (messagearr[0] == "<?= $this->config->item('Info') ?>") {
				toastr.info(messagearr[1]);
			}
		}

		$('.modal').on('shown.bs.modal', function() {
			var height = $(this).find('.modal-dialog').outerHeight();
			if (height > 450) {
				$(this).find(".modal-body").css('height', 450);
				$(this).find(".modal-body").scrollTop(0);
			}
			$(this).modal({
				backdrop: 'static',
				keyboard: false
			})
		});
		$('.change-password').click(function(e) {
			event.preventDefault();
			$("#changePasswordLabel").text("Ganti Password");
			$('#changePasswordModal').modal('show');
			$('#password_lama').val("");
			$('#password_baru').val("");
			$('#confirm_password_baru').val("");
		});

		$('#btSubmitChangePassword').click(function(e) {
			event.preventDefault();
			$("#formChangePassword").submit();
		});

		$("#formChangePassword").submit(function(e) {
			e.preventDefault();
			if (CheckRequiredChangePassword()) {
				if (CheckValidateChangePassword()) {
					$.ajax({
						type: 'POST',
						url: "<?= base_url(); ?>" + "ChangePassword/Save",
						data: {
							data: $("#formChangePassword").serialize()
						},
						success: function(response) {
							if (response.status) {
								$('#changePasswordModal').modal('hide');
								swal("Berhasil diubah !", response.messages, "success", );
							} else {
								swal("Gagal !", response.messages, "error", );
							}
						}
					});
				}
			}
		});
	});

	function CheckRequiredChangePassword() {
		var fields = document.getElementById("formChangePassword").querySelectorAll("[required]");
		var result = true;
		$.each(fields, function(i, field) {
			if (!field.value) {
				toastr.error(field.name.charAt(0).toUpperCase() + field.name.slice(1) + ' tidak boleh kosong');
				result = false;
			}
		});
		return result;
	}

	function CheckValidateChangePassword() {

		var result = true;
		var newpw = $("#password_baru").val();
		var renewpw = $("#confirm_password_baru").val();

		if (newpw != renewpw) {
			swal("Gagal !", "Password baru dan konfirmasi password baru tidak sama." , "error", );
			result = false;
		}
		return result;
	}
</script>
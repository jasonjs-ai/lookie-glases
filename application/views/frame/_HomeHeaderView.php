<!doctype html>
<html class="no-js" lang="zxx">


<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $base_controller->Configs->COMPANY_NAME; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/<?= $base_controller->Configs->LOGO; ?>" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?= base_url(); ?>assets/img/<?= $base_controller->Configs->LOGO; ?>">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/plugins.css">
	    <!-- Select2 -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- Style Css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/home_style.css">

	<!-- Custom Styles -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.css">
</head>

<body>


	<!-- Wrapper -->
	<div id="wrapper" class="wrapper box_layout">

		<!-- Header -->
		<header class="header chasmishco_header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-3 col-lg-2 col-md-4">
						<div class="logo">
							<a href="<?= base_url(); ?>">
								<img style="padding-top:10px;" height="50px" width="50px" src="<?= base_url(); ?>assets/img/<?= $base_controller->Configs->LOGO; ?>" alt="chasmishco Logo">
							</a>
						</div>
					</div>
					<div class="col-xl-9 col-lg-10 col-md-8">
						<div class="header_right_sidebar">
							<div class="login_account">
								<div class="account">
									<ul>
										<li>
											<a href="<?= base_url("VTO"); ?>">Virtual Try On</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="glass_toggle_menu">
							<nav class="mainmenu_nav mainmenu__nav">
									<ul class="main_menu">
										<li class="drop">
											<a href="<?= base_url("Login"); ?>">Admin Login</a>
										</li>
										<li class="drop">
											<a href="<?= base_url("VTO"); ?>">Virtual Try On</a>
										</li>
									</ul>
								</nav>
								<div class="hamburger-box button mobile-toggle">
									<span class="mobile-toggle__icon"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Cart Overlay -->
		<div class="body_overlay"></div>

		<!--// Header -->
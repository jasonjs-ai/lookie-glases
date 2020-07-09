<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		 <title>Management Project - 404 Not Found</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
		<meta name="description" content="Admin, Dashboard, Bootstrap">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/material-design/material-design-iconic-font.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom/custom.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/material-design/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/animate/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/infinityadmin/core.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/infinityadmin/misc-pages.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/google-font/css6f94.css?family=Raleway:400,500,600,700,800,900,300">
	</head>

	<body class="simple-page">
		<div id="back-to-home"><a href="<?php echo base_url(); ?>" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a></div>
		<div class="simple-page-wrap">
			<div class="simple-page-logo animated swing"><a href="<?php echo base_url(); ?>"><span><i class="fa fa-gg"></i></span> <span>Management Project</span></a></div>
			<h1 id="_404_title" class="animated shake"><?php echo substr($heading, 0, strpos($heading, ' ')); ?></h1>
			<h5 id="_404_msg" class="animated slideInUp"><?php echo $message; ?></h5>
			<div id="_404_form" class="animated slideInUp">
			</div>
		</div>
	</body>
</html>
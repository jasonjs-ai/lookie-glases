<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Logout extends Base_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }
    public function index() {
		$this->session->sess_destroy();
		redirect(base_url());
    }
}

/* End of file */

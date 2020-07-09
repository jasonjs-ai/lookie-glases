<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends Base_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        // Load Models
        $this->load->model("TransDataKacamataModels");

        // Load Helper

        $this->PageType = $this->config->item('Misc_Page');
    }
    public function index()
    {
        $this->session->set_userdata('page', $this->config->item('Dashboard'));

        $data = array(
            "ListKacamata" => $this->TransDataKacamataModels->GetListData(),
            $this->Data
        );
        $this->load->view('frame/_HomeHeaderView', $this->Data);
        $this->load->view('home/HomeView', $data);
        $this->load->view('frame/_HomeFooterView', $this->Data);
    }
}

/* End of file */

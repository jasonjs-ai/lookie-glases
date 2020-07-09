<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class VTO extends Base_Controller
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
        $this->session->set_userdata('page', $this->config->item('VTO'));

        $code = $this->input->get('p', TRUE);

        if (!is_null($code)) {
            $data = $this->TransDataKacamataModels->GetDataByCode($code);
            $this->session->set_userdata('is_set',  true);
            $this->session->set_userdata('code',  $code);
            $this->session->set_userdata('front',  base_url() . $this->config->item('GlassesImageUploadPath') . strtolower($data->code) . "/" . $data->front);
            $this->session->set_userdata('left',  base_url() . $this->config->item('GlassesImageUploadPath') . strtolower($data->code) . "/" . $data->left);
            $this->session->set_userdata('right',  base_url() . $this->config->item('GlassesImageUploadPath') . strtolower($data->code) . "/" . $data->right);
        } else {
            $this->session->set_userdata('is_set',  false);
            $this->session->set_userdata('code',  "");
            $this->session->set_userdata('front', "");
            $this->session->set_userdata('left', "");
            $this->session->set_userdata('right', "");
        }
        $this->load->view('frame/_HomeHeaderView', $this->Data);
        $this->load->view('vto/VTOView', $this->Data);
        $this->load->view('frame/_HomeFooterView', $this->Data);
    }
}

/* End of file */

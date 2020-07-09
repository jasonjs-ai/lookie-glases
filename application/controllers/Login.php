<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends Base_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        // Load Models
        $this->load->model("AuthenticationModels");

		// Load Helper
        
        // If Logged in, redirect to dashboard
        if ($this->session->userdata('logged_in')) {
            redirect(base_url("TransDataKacamata"));
        }

        $this->PageType = $this->config->item('Misc_Page');

    }
    public function Index()
    {
        $this->session->set_userdata('lang', null);
        $this->session->set_userdata('page', $this->config->item('Login'));
        $this->load->view('frame/_HeaderView', $this->Data);
        $this->load->view('login/LoginView', $this->Data);
    }

    public function Login()
    {
        $postData = $this->input->post();
        $is_valid = $this->AuthenticationModels->GetUserByIdPw($postData, null, null);
        if ($is_valid) {

            if ($this->LoginInfo->is_active == 'Aktif') {
                 // set session
                $this->session->set_userdata('alert', true);
                $this->session->set_userdata('alert_types', $this->config->item('Success'));
                $this->session->set_userdata('alert_messages',$this->config->item('Welcome') ." " . ucfirst($this->LoginInfo->first_name));
                $this->session->set_userdata('logged_in', true);

                $this->session->set_userdata('username',$postData['username']);
                $this->session->set_userdata('password',md5($postData['password']));

                redirect(base_url("TransDataKacamata"));
            } else {
                // set session
                $this->session->set_userdata('page', $this->config->item('Login'));
                $this->session->set_userdata('alert', true);
                $this->session->set_userdata('alert_types', $this->config->item('Info'));
                $this->session->set_userdata('alert_messages', "User " .$this->config->item('IsNotActive'));

                redirect(base_url("Login"));
            }
        } else {
            // set session
            $this->session->set_userdata('page', $this->config->item('Login'));
            $this->session->set_userdata('alert', true);
            $this->session->set_userdata('alert_types', $this->config->item('Error'));
            $this->session->set_userdata('alert_messages',$this->config->item('InvalidUserPw'));

            redirect(base_url("Login"));
        }
    }
}

/* End of file */

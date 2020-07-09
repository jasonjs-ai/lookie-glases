<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Sessions extends Base_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }
    public function index() {
		redirect(base_url());
    }
	
	public function GetSessions()
    {
        $Data = array(
                'username' => $this->session->userdata('username'),
                'password' => $this->session->userdata('password'),
                'logged_in' => $this->session->userdata('logged_in'),
                'page' => $this->session->userdata('page'),
                'alert' => $this->session->userdata('alert'),
				'alert_messages' => $this->session->userdata('alert_messages'),
                'alert_types' => $this->session->userdata('alert_types'),
                'language' => $this->session->userdata('lang')
            );
        header('Content-Type: application/json');
        echo json_encode($Data);
    }

    public function GetUserLoggedIn(){
        $Data = array(
            'username' => $this->LoginInfo->username,
            'first_name' => $this->LoginInfo->first_name,
            'last_name' => $this->LoginInfo->last_name,
            'level_id' => $this->LoginInfo->level_id,
            'level_code' => $this->LoginInfo->level_code,
            'level_name' => $this->LoginInfo->level_name,
            'pob' => $this->LoginInfo->pob,
            'dob' => $this->LoginInfo->dob,
            'phone' => $this->LoginInfo->phone,
            'email' => $this->LoginInfo->email,
            'is_active' => $this->LoginInfo->is_active,
            'keterangan' => $this->LoginInfo->keterangan,
        );
        header('Content-Type: application/json');
        echo json_encode($Data);
    }
	
	public function clearalert()
    {
       $this->session->set_userdata('messages_alert', '');
       $this->session->set_userdata('alert_type', '');
       
       $this->session->set_userdata('alert', false);
       $this->session->set_userdata('alert_types', '');
       $this->session->set_userdata('alert_messages', '');
    }
}

/* End of file */

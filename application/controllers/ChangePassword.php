<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ChangePassword extends Base_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		// Load Models
		$this->load->model("AuthenticationModels");

		// Load Library
		$this->load->library("Dto/Globals/ChangePasswordObj");

		// If not logged in in, redirect to login
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->PageType = $this->config->item('Admin_Page');
	}
	public function index()
	{

		redirect(base_url());
	}

	public function Save()
	{
		$postData = $this->input->post();
		$arrPostData = [];
		parse_str($postData["data"], $arrPostData);
		$data = $this->MapToObj($arrPostData);
		
		if (isset($data) && !is_null($data)){

			$login['username'] = $this->session->userdata('username');
			$login['password'] = $data->oldpassword;

			$isValid =  $this->AuthenticationModels->GetUserByIdPw($login, null, null);
			if ($isValid){
				$result = $this->AuthenticationModels->ChangePassword($data);
			}
			else{
			$result['status'] = false;
			$result['messages'] =  "Password Lama Salah";
			}
		}
		else{
			$result['status'] = false;
			$result['messages'] =  $this->config->item('Failed') . " Menyimpan Password.";
		}
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	
	private function MapToObj($Data)
	{
		$retData = new ChangePasswordObj();
		$retData->oldpassword = $Data["Password_Lama"];
		$retData->newpassword = $Data["Password_Baru"];
		$retData->renewpassword = $Data["Konfirmasi_Password_Baru"];
		return $retData;
	}

	private function ShowAlert($result)
	{
		$this->session->set_userdata('alert', true);
		$this->session->set_userdata('alert_types', ($result['status']) ? $this->config->item('Success') : $this->config->item('Error'));
		$this->session->set_userdata('alert_messages', $result['messages']);
	}
}

/* End of file */

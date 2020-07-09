<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Settings extends Base_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		// Load Models
		$this->load->model("SettingsModels");

		// Load Library
		$this->load->library("Dto/Globals/SelectListObj");
		$this->load->library("Dto/Settings/SettingsObj");

		//$this->load->library('Pdf');

		// If not logged in in, redirect to login
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->PageType = $this->config->item('Admin_Page');
	}
	public function index()
	{

		$this->session->set_userdata('page', $this->config->item('Settings'));
		$this->load->view('frame/_HeaderView', $this->Data);
		$this->load->view('frame/menu/_HeaderMenuView', $this->Data);
		$this->load->view('settings/SettingsView', $this->Data);
		$this->load->view('frame/menu/_FooterMenuView', $this->Data);
		$this->load->view('script/misc/settings/SettingsScript', $this->Data);
	}

	public function Save()
	{
		$data = $this->input->post();
		$uploadFolder = $this->config->item('ImageUploadPath');
		$result = [];
		$result['status'] = true;
		$result['messages'] =  "";

		if (!empty($_FILES)) {
			if (!is_dir($uploadFolder)) {
				mkdir("./" . $uploadFolder, 0777, TRUE);
			}
			$tempFile = $_FILES['logo']['tmp_name'];
			$extension = "." . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
			$targetFile = $uploadFolder . "/logo" . $extension;
			if (file_exists($targetFile)) unlink($targetFile);
			move_uploaded_file($tempFile, $targetFile);
			$dataConfig = $this->SettingsModels->GetDataByCode("LOGO");
			$dataConfig->config_value = "logo" . $extension;
			$result = $this->SettingsModels->UpdateData($dataConfig);
		}
		if ($result['status']) {
			foreach ($data as $key => $item) {
				if ($result['status']) {
					$dataConfig = $this->SettingsModels->GetDataByCode($key);
					$dataConfig->config_value = $data[$key];
					$result = $this->SettingsModels->UpdateData($dataConfig);
				}
			}
		}

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	private function MapToSelectList($Data)
	{
		$retData = [];
		$defaultItem = new SelectListObj();
		$defaultItem->value = "";
		$defaultItem->text = "-- Select Item --";
		$retData[] = $defaultItem;

		if (!is_null($Data)) {
			foreach ($Data as $value) {
				$item = new SelectListObj();

				$item->value = $value->code;
				$item->text = $value->name;
				$retData[] = $item;
			}
		}
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

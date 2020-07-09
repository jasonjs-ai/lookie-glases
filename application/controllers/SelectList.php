<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class SelectList extends Base_Controller
{

	private $isAuthorized;

	public function __Construct()
	{
		parent::__Construct();

		// Load Models
		$this->load->model("MasterLevelModels");
		$this->load->model("TransDataKacamataModels");


		// Load Object Library
		$this->load->library("Dto/Globals/SelectListObj");

		// Load Helper


		// Dummy
		//$this->session->set_userdata('logged_in', true);

		// If Logged in, redirect to dashboard
		if (!$this->session->userdata('logged_in')) {
			$this->isAuthorized = false;
		} else {
			$this->isAuthorized = true;
		}

		/*if (!$this->isAuthorized) {
			$result = array(
				'status' => false,
				'messages' => 'Not Authorized.'
			);
			header('Content-Type: application/json');
			echo json_encode($result);
		}*/

		$this->PageType = $this->config->item('Misc_Page');
	}
	public function Index()
	{
		redirect(base_url("Home"));
	}
	public function GetListLevel()
	{
		if ($this->isAuthorized) {
			$listLevel = $this->MasterLevelModels->GetListData();
			$result = $this->MapToSelectList($listLevel);
			header('Content-Type: application/json');
			echo json_encode($result);
		}
	}
	public function GetListGlasses()
	{
			$listGlasses = $this->TransDataKacamataModels->GetListData();
			$result = $this->MapToSelectList($listGlasses);
			header('Content-Type: application/json');
			echo json_encode($result);
	}
	private function MapToSelectList($Data, $Type=null)
	{
		$retData = [];
		$defaultItem = new SelectListObj();
		$defaultItem->value = "";
		$defaultItem->text = "-- Select Item --";
		$retData[] = $defaultItem;
		if (!is_null($Data)) {
			foreach ($Data as $value) {
				$item = new SelectListObj();
				if ($Type == "karyawan"){
					$item->value = $value->nik;
					$item->text = $value->name;
				}
				else{
					$item->value = $value->code;
					$item->text = $value->name;
				}
				$retData[] = $item;
			}
		}
		return $retData;
	}
}

Class Item{
	public $code;
	public $name;
	public function __construct($code = '', $name = '') {
        $this->code = $code;
        $this->name = $name;
    }
}

/* End of file */

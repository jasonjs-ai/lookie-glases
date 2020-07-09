<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class TransDataKacamata extends Base_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		// Load Models
		$this->load->model("TransDataKacamataModels");

		// Load Library
		$this->load->library("Dto/Globals/SelectListObj");
		$this->load->library("Dto/Trans/TransDataKacamata/TransDataKacamataObj");

		// If not logged in in, redirect to login
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->PageType = $this->config->item('Admin_Page');
	}
	public function index()
	{

		$this->session->set_userdata('page', $this->config->item('TransDataKacamata'));
		$this->load->view('frame/_HeaderView', $this->Data);
		$this->load->view('frame/menu/_HeaderMenuView', $this->Data);
		$this->load->view('trans/transdatakacamata/TransDataKacamataView', $this->Data);
		$this->load->view('frame/menu/_FooterMenuView', $this->Data);
		$this->load->view('script/trans/transdatakacamata/TransDataKacamataScript', $this->Data);
	}

	public function GetListData()
	{

		$listData = $this->TransDataKacamataModels->GetListData();

		if (is_null($listData)) {
			$listData = "";
		}

		$data = array(
			'data' => $listData
		);


		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function Edit()
	{
		$data = $this->input->post();
		$ID = $data['id'];
		$result = $this->GetDataByID($ID);
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function Delete()
	{
		$data = $this->input->post();
		$ID = $data['id'];
		$result = $this->TransDataKacamataModels->DeleteData($ID);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function Save()
	{
		$data = $this->input->post();
		$ID = $data['id'];
		$data = $this->MapToObj($data, $ID);

		if (isset($data) && !is_null($data)) {
			if (strtolower($data->glasses_code) == "<auto_generate>") {
				$data->glasses_code = $this->GenerateCode("kacamata");
			}
			if (!empty($_FILES)) {

				$uploadFolder = $this->config->item('GlassesImageUploadPath') . strtolower($data->glasses_code) . "/";

				if (!is_dir($uploadFolder)) {
					mkdir("./" . $uploadFolder, 0777, TRUE);
				}
				if (isset($_FILES['front'])) {
					$tempFileFront = $_FILES['front']['tmp_name'];
					$extensionFront = "." . pathinfo($_FILES['front']['name'], PATHINFO_EXTENSION);
					$targetFileFront = $uploadFolder . "/front" . $extensionFront;
					if (file_exists($targetFileFront)) unlink($targetFileFront);
					move_uploaded_file($tempFileFront, $targetFileFront);
					$data->front_image = "front" . $extensionFront;
				}
				if (isset($_FILES['left'])) {
					$tempFileLeft = $_FILES['left']['tmp_name'];
					$extensionLeft = "." . pathinfo($_FILES['left']['name'], PATHINFO_EXTENSION);
					$targetFileLeft = $uploadFolder . "/left" . $extensionLeft;
					if (file_exists($targetFileLeft)) unlink($targetFileLeft);
					move_uploaded_file($tempFileLeft, $targetFileLeft);
					$data->left_image = "left" . $extensionLeft;
				}

				if (isset($_FILES['right'])) {
					$tempFileRight = $_FILES['right']['tmp_name'];
					$extensionRight = "." . pathinfo($_FILES['right']['name'], PATHINFO_EXTENSION);
					$targetFileRight = $uploadFolder . "/right" . $extensionRight;
					if (file_exists($targetFileRight)) unlink($targetFileRight);
					move_uploaded_file($tempFileRight, $targetFileRight);
					$data->right_image = "right" . $extensionRight;
				}
			}

			if (!empty($ID)) {
				$result = $this->TransDataKacamataModels->UpdateData($data);
			} else {
				if ($this->CheckDoubleCode($data->glasses_code)) {
					$result = $this->TransDataKacamataModels->InsertData($data);
				} else {
					$result['status'] = false;
					$result['messages'] =  "Code " . $data->glasses_code  . $this->config->item('AlreadyExists');
				}
			}
		} else {
			$result['status'] = false;
			$result['messages'] =  $this->config->item('Failed') . " update data.";
		}

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	private function GetDataByID($ID)
	{
		$Data = $this->TransDataKacamataModels->GetDataByID($ID);
		$Data = array(
			'ID' => $Data->ID,
			'Code' => $Data->code,
			'Name' => $Data->name,
			'Front' => base_url() . $this->config->item('GlassesImageUploadPath') . strtolower($Data->code) . "/" . $Data->front,
			'Left' => base_url() . $this->config->item('GlassesImageUploadPath') . strtolower($Data->code) . "/" . $Data->left,
			'Right' => base_url() . $this->config->item('GlassesImageUploadPath') . strtolower($Data->code) . "/" . $Data->right,
			'Is_Active' =>  $Data->is_active,
			'Keterangan' => $Data->keterangan
		);
		return $Data;
	}

	private function CheckDoubleCode($Code)
	{
		$result = $this->TransDataKacamataModels->CheckIsExistsCode($Code);
		return $result;
	}

	private function GenerateCode($jenis_trans)
	{
		$result = $this->TransDataKacamataModels->GenerateCode($jenis_trans);
		return $result;
	}


	private function MapToObj($Data, $ID)
	{
		$exsData = $this->TransDataKacamataModels->GetDataByID($ID);
		$retData = new TransDataKacamataObj();
		if (!is_null($exsData)) {
			$retData->glasses_id = $exsData->ID;
			$retData->glasses_code =  $exsData->code;
			$retData->front_image = $exsData->front;
			$retData->left_image = $exsData->left;
			$retData->right_image = $exsData->right;
		} else {
			$retData->glasses_id = null;
			$retData->glasses_code = (!isset($Data["code"])) ? null : str_replace(" ", "_", strtoupper($Data["code"]));
			$retData->front_image = "";
			$retData->left_image = "";
			$retData->right_image = "";
		}
		$retData->glasses_name = (!isset($Data["name"])) ? null : $Data["name"];
		$retData->is_active = true;
		$retData->keterangan = (!isset($Data["keterangan"])) ? "" : $Data["keterangan"];
		return $retData;
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

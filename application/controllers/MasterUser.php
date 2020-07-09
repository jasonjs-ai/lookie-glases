<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class MasterUser extends Base_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		// Load Models
		$this->load->model("MasterUserModels");
		$this->load->model("MasterLevelModels");

		// Load Library
		$this->load->library("Dto/Globals/SelectListObj");
		$this->load->library("Dto/Master/MasterUser/MasterUserObj");

		// If not logged in in, redirect to login
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->PageType = $this->config->item('Admin_Page');
	}
	public function index()
	{

		$this->session->set_userdata('page', $this->config->item('MasterUser'));
		$this->load->view('frame/_HeaderView', $this->Data);
		$this->load->view('frame/menu/_HeaderMenuView', $this->Data);
		$this->load->view('master/masteruser/MasterUserView', $this->Data);
		$this->load->view('frame/menu/_FooterMenuView', $this->Data);
		$this->load->view('script/master/masteruser/MasterUserScript', $this->Data);
	}

	public function GetListData()
	{

		$postData = $this->input->post();

		$username = isset($postData['username']) ? $postData['username'] : null;
		$level = isset($postData['level']) ? $postData['level'] : null;

		$listData = $this->MasterUserModels->GetListData($username, $level);

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
		$result = $this->MasterUserModels->DeleteData($ID);

		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function Save()
	{
		$data = $this->input->post();
		$ID = $data['id'];
		$arrPostData = [];
		parse_str($data["data"], $arrPostData);
		$data = $this->MapToObj($arrPostData, $ID);

		if (isset($data) && !is_null($data)) {
			if (!empty($ID)) {
				$result = $this->MasterUserModels->UpdateData($data);
			} else {
				if ($this->CheckDoubleUsername($data->username)) {
					$result = $this->MasterUserModels->InsertData($data);
				} else {
					$result['status'] = false;
					$result['messages'] =  "Username " . $data->username  . $this->config->item('AlreadyExists');
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
		$Data = $this->MasterUserModels->GetDataByID($ID);
		$Data = array(
			'User_ID' => $Data->user_id,
			'Username' => $Data->username,
			'First_Name' => $Data->first_name,
			'Last_Name' => $Data->last_name,
			'Level_Code' => $Data->level_code,
			'POB' => $Data->pob,
			'DOB' => $Data->dob,
			'Email' => $Data->email,
			'Phone' => $Data->phone,
			'Is_Active' =>  $Data->is_active,
			'Keterangan' => $Data->keterangan
		);
		return $Data;
	}

	private function CheckDoubleUsername($Username)
	{
		$result = $this->MasterUserModels->CheckIsExistsUsername($Username);
		return $result;
	}

	private function MapToObj($Data, $ID)
	{
		$exsData = $this->MasterUserModels->GetDataByID($ID);
		$retData = new MasterUserObj();
		if (!is_null($exsData)) {
			$retData->user_id = $exsData->user_id;
			$retData->username =  $exsData->username;
		} else {
			$retData->user_id = null;
			$retData->username = (!isset($Data["Nama_Pengguna"])) ? null : str_replace(" ", "_", strtoupper($Data["Nama_Pengguna"]));
		}
		$retData->first_name = (!isset($Data["Nama_Depan"])) ? null : $Data["Nama_Depan"];
		$retData->last_name = (!isset($Data["Nama_Belakang"])) ? null : $Data["Nama_Belakang"];
		$retData->level_id = (!isset($Data["Akses"])) ? null : $this->MasterLevelModels->GetDataByCode($Data["Akses"])->ID;
		$retData->pob = (!isset($Data["Tempat_Lahir"])) ? null : $Data["Tempat_Lahir"];
		$retData->dob = (!isset($Data["Tanggal_Lahir"])) ? null : date("Y-m-d", strtotime(str_replace('/', '-', $Data["Tanggal_Lahir"])));
		$retData->phone = (!isset($Data["No_HP"])) ? null : $Data["No_HP"];
		$retData->email = (!isset($Data["Email"])) ? null : $Data["Email"];
		$retData->is_active = true;
		$retData->keterangan = (!isset($Data["Keterangan"])) ? "" : $Data["Keterangan"];
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

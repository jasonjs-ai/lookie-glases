<?php
 /*==========================
		Base Controller
============================
Created By: Rico Nurman Yanuar
Date: 27 January 2019
Version: 1.0
===========================*/


if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Base_Controller extends CI_Controller
{

	public $Configs;
	public $LoginInfo;
	public $Data;
	public $PageType;


	public function __Construct()
	{
		parent::__Construct();
		
		if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		} 

		// Dummies set
		//$LevelId = -1;

		// Load Models
		$this->load->model("globals/GlobalModels");
		$this->load->model("AuthenticationModels");

		// Load Helper
		$this->load->helper('AutoMapper');

		// Load Library
		$this->load->library("Dto/Login/LoginDto");
		$this->load->library("Google_Translate/GoogleTranslate");
		$this->load->library("Geo_IP/Geoip");
		$this->load->library('Excel');
		$this->load->library('user_agent');

		/*if ($this->input->ip_address() != "103.56.206.176"){
			redirect("https://google.com");
		}*/

		// Automation Get Configs
		$ListConfigs = $this->GlobalModels->GetListConfigs();
		$this->Configs = new stdClass;
		$this->Configs = Map($ListConfigs, $this->Configs);
		$this->LoginInfo = new LoginDto();
		
		// Automation Get Info Login By Session

		if (!is_null($this->session->userdata('username')) && !is_null($this->session->userdata('password'))) {
			$this->AuthenticationModels->GetUserByIdPw(null, $this->session->userdata('username'), $this->session->userdata('password'));
		}

		//Base Controller loaded to view
		$this->Data['base_controller'] = $this;
		
	}

	public function DateToDay($Date){
	
		$day_en = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		$day_id = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		if (strtolower($this->session->userdata('lang')) == 'id'){
			$Day = date('l',$Date);
			$Day = $day_id[array_search($Day, $day_en)];
			return $Day;
			 
		}
		else{
			$Day = date('l',$Date);
			return $Day;
		}	
	
	}
		
}

/* End of file */

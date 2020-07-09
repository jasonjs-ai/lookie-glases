<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class GlobalModels extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function GetListConfigs()
    {
        $this->db->select('config_code, config_value');
        $this->db->from("tb_config");
        $query = $this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else {
            $retArr = array();
            foreach ($query->result() as $value) {
                $tempArr = array();
                array_push($tempArr, $value->config_code);
                array_push($tempArr, $value->config_value);
                array_push($retArr, $tempArr);
            }
            return $retArr;
        }
    }
}

/* End of file  */

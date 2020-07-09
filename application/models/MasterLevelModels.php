<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MasterLevelModels extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        // Load Library
        $this->load->library("Dto/Master/MasterLevel/MasterLevelDto");
    }


    function GetListData()
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistlevel'));
        $query = $this->db->get();

        $ListData = [];

        if ($query->num_rows() == 0) {
            return null;
        } else {
            foreach ($query->result() as $value) {

                $DataDto = new MasterLevelDto();

                // Map To Dto
                $DataDto->ID = $value->ID;
                $DataDto->code = $value->code;
                $DataDto->name = $value->name;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;

                $ListData[] = $DataDto;
            }
            return $ListData;
        }
    }

    function GetDataByID($ID)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistlevel'));
        $this->db->where('ID', $ID);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new MasterLevelDto();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->ID = $value->ID;
                $DataDto->code = $value->code;
                $DataDto->name = $value->name;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }
    function GetDataByCode($Code)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistlevel'));
        $this->db->where('code', $Code);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new MasterLevelDto();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->ID = $value->ID;
                $DataDto->code = $value->code;
                $DataDto->name = $value->name;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }
}

/* End of file  */

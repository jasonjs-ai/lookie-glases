<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SettingsModels extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        // Load Library
        $this->load->library("Dto/Settings/SettingsObj");
    }


    function GetListData()
    {
        $this->db->select('*');
        $this->db->from($this->config->item('tbconfig'));
        $query = $this->db->get();

        $ListData = [];

        if ($query->num_rows() == 0) {
            return null;
        } else {
            foreach ($query->result() as $value) {

                $DataDto = new SettingsObj();

                // Map To Dto
                $DataDto->config_id = $value->config_id;
                $DataDto->config_code = $value->config_code;
                $DataDto->config_name = $value->config_name;
                $DataDto->config_value = $value->config_value;
                $DataDto->is_show = $value->is_show;
                $DataDto->created_by = $value->created_by;
                $DataDto->created_date = $value->created_date;
                $DataDto->modified_by = $value->modified_by;
                $DataDto->modified_date = $value->modified_date;
                $DataDto->is_active = $value->is_active;
                $DataDto->is_delete = $value->is_delete;
                $DataDto->keterangan = $value->keterangan;

                $ListData[] = $DataDto;
            }
            return $ListData;
        }
    }

    function GetDataByID($ID)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('tbconfig'));
        $this->db->where('config_id', $ID);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new SettingsObj();
            foreach ($query->result() as $value) {

                $DataDto->config_id = $value->config_id;
                $DataDto->config_code = $value->config_code;
                $DataDto->config_name = $value->config_name;
                $DataDto->config_value = $value->config_value;
                $DataDto->is_show = $value->is_show;
                $DataDto->created_by = $value->created_by;
                $DataDto->created_date = $value->created_date;
                $DataDto->modified_by = $value->modified_by;
                $DataDto->modified_date = $value->modified_date;
                $DataDto->is_active = $value->is_active;
                $DataDto->is_delete = $value->is_delete;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }

    function GetDataByCode($Code)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('tbconfig'));
        $this->db->where('config_code', $Code);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new SettingsObj();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->config_id = $value->config_id;
                $DataDto->config_code = $value->config_code;
                $DataDto->config_name = $value->config_name;
                $DataDto->config_value = $value->config_value;
                $DataDto->is_show = $value->is_show;
                $DataDto->created_by = $value->created_by;
                $DataDto->created_date = $value->created_date;
                $DataDto->modified_by = $value->modified_by;
                $DataDto->modified_date = $value->modified_date;
                $DataDto->is_active = $value->is_active;
                $DataDto->is_delete = $value->is_delete;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }

    function InsertData($Data)
    {
        $dataToInsert = array(
            'config_code' => $Data->config_code,
            'config_name' => $Data->config_name,
            'config_value' => $Data->config_value,
            'is_active' => $Data->is_active,
            'keterangan' => $Data->keterangan,
            'created_by' => $this->LoginInfo->username
        );
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($this->config->item('tbconfig'), $dataToInsert);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Simpan Data " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function UpdateData($Data)
    {
        $dataToUpdate = array(
            'config_code' => $Data->config_code,
            'config_name' => $Data->config_name,
            'config_value' => $Data->config_value,
            'is_active' => $Data->is_active,
            'keterangan' => $Data->keterangan,
            'modified_by' => $this->LoginInfo->username
        );
        $this->db->set('modified_date', 'NOW()', FALSE);
        $this->db->where('config_id', $Data->config_id);
        $this->db->update($this->config->item('tbconfig'), $dataToUpdate);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Simpan Data " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function DeleteData($ID)
    {
        $dataToDelete = array(
            'is_delete' => 1,
            'modified_by' => $this->LoginInfo->username,
        );
        $result = false;
        $this->db->set('modified_date', 'NOW()', FALSE);
        $this->db->where('config_id', $ID);
        $this->db->update($this->config->item('tbconfig'), $dataToDelete);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Hapus Data " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function CheckIsExistsCode($Code)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('tbconfig'));
        $this->db->where('config_code', $Code);
        $this->db->where('is_delete', 0);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }
    function GenerateCode($jenis_trans)
    {
        $query = $this->db->query("CALL " . $this->config->item('spgeneratecode') . "('" . $jenis_trans . "')");
        $code = "";
        if ($query->num_rows() == 0) {
            return $code;
        } else {
            foreach ($query->result() as $value) {
                $code = $value->code;
            }
            $query->next_result();
            $query->free_result();
            return $code;
        }
    }
}

/* End of file  */

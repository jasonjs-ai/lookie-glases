<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MasterUserModels extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        // Load Library
        $this->load->library("Dto/Master/MasterUser/MasterUserDto");
    }


    function GetListData($Username, $Level)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistuser'));
        if (!is_null($Username) && $Username != "") {
        $this->db->where('username', $Username);
        }
        if (!is_null($Level) && $Level != "") {
        $this->db->where('level_code', $Level);
        }
        $query = $this->db->get();

        $ListData = [];

        if ($query->num_rows() == 0) {
            return null;
        } else {
            foreach ($query->result() as $value) {

                $DataDto = new MasterUserDto();

                // Map To Dto
                $DataDto->user_id = $value->user_id;
                $DataDto->username = $value->username;
                $DataDto->password = $value->password;
                $DataDto->first_name = $value->first_name;
                $DataDto->last_name = $value->last_name;
                $DataDto->level_id = $value->level_id;
                $DataDto->level_code = $value->level_code;
                $DataDto->level_name = $value->level_name;
                $DataDto->pob = $value->pob;
                $DataDto->dob = $value->dob;
                $DataDto->phone = $value->phone;
                $DataDto->email = $value->email;
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
        $this->db->from($this->config->item('viewlistuser'));
        $this->db->where('user_id', $ID);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new MasterUserDto();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->user_id = $value->user_id;
                $DataDto->username = $value->username;
                $DataDto->password = $value->password;
                $DataDto->first_name = $value->first_name;
                $DataDto->last_name = $value->last_name;
                $DataDto->level_id = $value->level_id;
                $DataDto->level_code = $value->level_code;
                $DataDto->level_name = $value->level_name;
                $DataDto->pob = $value->pob;
                $DataDto->dob = $value->dob;
                $DataDto->phone = $value->phone;
                $DataDto->email = $value->email;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }

    function GetDataByUsername($Username)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistuser'));
        $this->db->where('username', $Username);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new MasterUserDto();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->user_id = $value->user_id;
                $DataDto->username = $value->username;
                $DataDto->password = $value->password;
                $DataDto->first_name = $value->first_name;
                $DataDto->last_name = $value->last_name;
                $DataDto->level_id = $value->level_id;
                $DataDto->level_code = $value->level_code;
                $DataDto->level_name = $value->level_name;
                $DataDto->pob = $value->pob;
                $DataDto->dob = $value->dob;
                $DataDto->phone = $value->phone;
                $DataDto->email = $value->email;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }

    function InsertData($Data)
    {
        $dataToInsert = array(
            'username' => $Data->username,
            'first_name' => $Data->first_name,
			'password' => MD5(strtolower($Data->username)),
			'last_name' => $Data->last_name,
            'level_id' => $Data->level_id,
            'pob' => $Data->pob,
            'dob' => $Data->dob,
            'phone' => $Data->phone,
            'email' => $Data->email,
            'is_active' => $Data->is_active,
            'keterangan' => $Data->keterangan,
            'created_by' => $this->LoginInfo->username
        );
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($this->config->item('tbuser'), $dataToInsert);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Save User " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function UpdateData($Data)
    {
        $dataToUpdate = array(
            'first_name' => $Data->first_name,
			'last_name' => $Data->last_name,
            'level_id' => $Data->level_id,
            'pob' => $Data->pob,
            'dob' => $Data->dob,
            'phone' => $Data->phone,
            'email' => $Data->email,
            'is_active' => $Data->is_active,
            'keterangan' => $Data->keterangan,
            'modified_by' => $this->LoginInfo->username
        );
        $this->db->set('modified_date', 'NOW()', FALSE);
        $this->db->where('user_id', $Data->user_id);
        $this->db->update($this->config->item('tbuser'), $dataToUpdate);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Update User " . $this->config->item('Success');
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
        $this->db->where('user_id', $ID);
        $this->db->update($this->config->item('tbuser'), $dataToDelete);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Delete User " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function CheckIsExistsUsername($Username)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('tbuser'));
        $this->db->where('username', $Username);
        $this->db->where('is_delete', 0);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file  */

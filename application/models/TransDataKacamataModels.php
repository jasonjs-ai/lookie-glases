<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class TransDataKacamataModels extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        // Load Library
        $this->load->library("Dto/Trans/TransDataKacamata/TransDataKacamataDto");
    }


    function GetListData()
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistglasses'));
        $query = $this->db->get();

        $ListData = [];

        if ($query->num_rows() == 0) {
            return null;
        } else {
            foreach ($query->result() as $value) {

                $DataDto = new TransDataKacamataDto();

                // Map To Dto
                $DataDto->ID = $value->ID;
                $DataDto->code = $value->code;
                $DataDto->name = $value->name;
                $DataDto->front = $value->front;
                $DataDto->left = $value->left;
                $DataDto->right = $value->right;
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
        $this->db->from($this->config->item('viewlistglasses'));
        $this->db->where('ID', $ID);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new TransDataKacamataDto();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->ID = $value->ID;
                $DataDto->code = $value->code;
                $DataDto->name = $value->name;
                $DataDto->front = $value->front;
                $DataDto->left = $value->left;
                $DataDto->right = $value->right;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }

    function GetDataByCode($Code)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistglasses'));
        $this->db->where('code', $Code);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return null;
        } else {
            $DataDto = new TransDataKacamataDto();
            foreach ($query->result() as $value) {

                // Map To Dto
                $DataDto->ID = $value->ID;
                $DataDto->code = $value->code;
                $DataDto->name = $value->name;
                $DataDto->front = $value->front;
                $DataDto->left = $value->left;
                $DataDto->right = $value->right;
                $DataDto->is_active = $value->is_active;
                $DataDto->keterangan = $value->keterangan;
            }
            return $DataDto;
        }
    }

    function InsertData($Data)
    {
        $dataToInsert = array(
            'glasses_code' => $Data->glasses_code,
            'glasses_name' => $Data->glasses_name,
			'front_image' => $Data->front_image,
            'left_image' => $Data->left_image,
            'right_image' => $Data->right_image,
            'is_active' => $Data->is_active,
            'keterangan' => $Data->keterangan,
            'created_by' => $this->LoginInfo->username
        );
        $this->db->set('created_date', 'NOW()', FALSE);
        $this->db->insert($this->config->item('tbglasses'), $dataToInsert);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Save Kacamata " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function UpdateData($Data)
    {
        $dataToUpdate = array(
            'glasses_code' => $Data->glasses_code,
            'glasses_name' => $Data->glasses_name,
			'front_image' => $Data->front_image,
            'left_image' => $Data->left_image,
            'right_image' => $Data->right_image,
            'is_active' => $Data->is_active,
            'keterangan' => $Data->keterangan,
            'modified_by' => $this->LoginInfo->username
        );
        $this->db->set('modified_date', 'NOW()', FALSE);
        $this->db->where('glasses_id', $Data->glasses_id);
        $this->db->update($this->config->item('tbglasses'), $dataToUpdate);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Update Kacamata " . $this->config->item('Success');
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
        $this->db->where('glasses_id', $ID);
        $this->db->update($this->config->item('tbglasses'), $dataToDelete);
        if ($this->db->affected_rows()) {
            $result['status'] = true;
            $result['messages'] = "Delete Kacamata " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }

    function CheckIsExistsCode($Code)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('tbglasses'));
        $this->db->where('glasses_code', $Code);
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

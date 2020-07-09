<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AuthenticationModels extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function GetUserByIdPW($postData, $username, $password)
    {
        $this->db->select('*');
        $this->db->from($this->config->item('viewlistuser'));
        $this->db->where('username', is_null($username) ? $postData['username'] : $username);
        $this->db->where('password', is_null($password) ? md5($postData['password']) : $password);

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return false;
        } else {
            foreach ($query->result() as $value) {

                // Map To Dto
                $this->LoginInfo->username = $value->username;
                $this->LoginInfo->first_name = $value->first_name;
                $this->LoginInfo->last_name = $value->last_name;
                $this->LoginInfo->level_id = $value->level_id;
                $this->LoginInfo->level_code = $value->level_code;
                $this->LoginInfo->level_name = $value->level_name;
                $this->LoginInfo->pob = $value->pob;
                $this->LoginInfo->dob = $value->dob;
                $this->LoginInfo->phone = $value->phone;
                $this->LoginInfo->whatsapp = $value->whatsapp;
                $this->LoginInfo->email = $value->email;
                $this->LoginInfo->is_active = $value->is_active;
                $this->LoginInfo->keterangan = $value->keterangan;
            }
            return true;
        }
    }

    function ChangePassword($Data)
    {
        $dataToUpdate = array(
            'password' => md5($Data->newpassword),
        );
        $this->db->set('modified_date', 'NOW()', FALSE);
        $this->db->where('username', $this->LoginInfo->username);
        $this->db->update($this->config->item('tbuser'), $dataToUpdate);
        if ($this->db->affected_rows()) {
            $this->session->set_userdata('password', md5($Data->newpassword));
            $result['status'] = true;
            $result['messages'] = "Change Password " . $this->config->item('Success');
        } else {
            $result['status'] = false;
            $result['messages'] = $this->db->last_query();
        }
        return $result;
    }
}

/* End of file  */

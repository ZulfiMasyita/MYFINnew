<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function check_login($email_adminstaff, $password_adminstaff)       
    {
        $get_userdata = $this->db->get_where('tb_adminstaff', ['email_adminstaff' => $email_adminstaff])->row();
        if (! $get_userdata) return false;
        if (! password_verify($password_adminstaff, $get_userdata->password_adminstaff)) return false;
        return $get_userdata;
    }
    
}

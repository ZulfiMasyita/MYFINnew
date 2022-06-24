<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model
{
    public function get_all()       
    {
        $result = $this->db->get('tb_staff');
        return $result;
    }

    public function create($data)
    {
        $this->db->insert('tb_staff', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function update($data_staff, $id)
    {
        $this->db->update('tb_staff', $data_staff, ['id_adminstaff' => $id]);
        return $this->db->affected_rows() > 0 ? true : false;
    } 
}

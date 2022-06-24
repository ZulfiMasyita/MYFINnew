<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_model extends CI_Model
{
    public function get_all()       
    {
        $this->db->select('*');
        $this->db->from('tb_pengajuan_kredit');
        $this->db->where('status="catatan"');
        $result = $this->db->get();
        return $result;
    }
    
}

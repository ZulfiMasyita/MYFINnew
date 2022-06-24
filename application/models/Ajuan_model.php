<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajuan_model extends CI_Model
{
    // public function get_all()       
    // {
    //     $result = $this->db->get('tb_pengajuan_kredit');
    //     return $result;
    // }

    public function get_data_detail($id)       
    {
        $this->db->select('*');
        $this->db->from('tb_pengajuan_kredit');
        $this->db->join('tb_data_nasabah','tb_data_nasabah.id_user = tb_pengajuan_kredit.id_nasabah');
        $this->db->where('tb_pengajuan_kredit.id_pengajuan_kredit',$id);
        return $this->db->get(); 
    }

    public function get_all()       
    {
        $this->db->select('*');
        $this->db->from('tb_data_nasabah');
        $this->db->join('tb_pengajuan_kredit', 'tb_data_nasabah.id_user = tb_pengajuan_kredit.id_nasabah');
        return $this->db->get();     
    }
    
}

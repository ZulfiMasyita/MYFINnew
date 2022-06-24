<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_all_count()       
    {
        $nasabah = $this->db->get('tb_data_nasabah')->num_rows();
        $admin = $this->db->get('tb_adminstaff')->num_rows();
        $ajuan = $this->db->get('tb_pengajuan_kredit')->num_rows();
        //$kredit = $this->db->get('kredit')->num_rows();
        $con = [
            'tb_data_nasabah' => $nasabah,
            'tb_adminstaff' => $admin,
            'tb_pengajuan_kredit' => $ajuan,
            //'kredit' => $kredit,
        ];
        return $con;
    }

    //public function getDataNasabah()
    //{
    //    $nasabah = $this->db->get('tb_data_nasabah')->num_rows();

    //    $count = [
    //        'tb_data_nasabah' => $nasabah,
    //    ];
    //    return $count;
        
    //}

    //public function getAjuanKredit()
    //{
    //    $ajuan = $this->db->get('tb_pengajuan_kredit')->num_rows();

    //   $count = [
    //        'tb_pengajuan_kredit' => $ajuan,
    //    ];
    //    return $count;
        
    //}

    //public function chartDataNasabah($bulan)
    //{
    //    $like = date('y') . $bulan;
    //    $this->db->like('id_user', $like, 'after');
    //    return count($this->db->get('tb_data_nasabah')->result_array());
    //}

    //public function chartAjuanKredit($bulan)
    //{
    //    $like = date('y') . $bulan;
    //    $this->db->like('id_pengajuan_kredit', $like, 'after');
    //    return count($this->db->get('tb_pengajuan_kredit')->result_array());
    //}

}

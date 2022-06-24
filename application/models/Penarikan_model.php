<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penarikan_model extends CI_Model
{
    public function get_all()       
    {
        $result = $this->db->get('tb_penarikan_saldo');
        return $result;
    }
    
}

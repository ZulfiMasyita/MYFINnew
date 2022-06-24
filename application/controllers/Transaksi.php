<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

    private $array_nasabah = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

    public function index()
	{
        $transaksi = $this->Transaksi_model->get_all()->result();
        foreach ($transaksi as $key => $value) {
            $transaksi[$key]->nasabah = $this->Transaksi_model->get_nasabah($value->id)->result();
        }
        $data['transaksi'] = $transaksi;
        $this->layout->set_title('Data transaksi');
        return $this->layout->load('template', 'transaksi/index', $data);
    }
    
    public function tambah()
    {
        $this->load->model('nasabah_model');
        $data['nasabah'] = $this->nasabah_model->get_all();
        $this->layout->set_title('Tambah transaksi');
        return $this->layout->load('template', 'transaksi/tambah', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('data_nasabah', 'nasabah', 'callback__data_nasabah_check');
        if ($this->form_validation->run() == FALSE)
        {
            $response = [
                'status' => false,
                'message' => 'form error',
                'error' => validation_errors('<div class="alert alert-danger">', '</div>'),
            ];
            echo json_encode($response);
            return;
        }
        $data_transaksi = [
            'tgl' => date('Y-m-d h:i:s'),
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'admin_id' => $this->session->userdata('user_id'),
        ];
        $tambah = $this->Transaksi_model->create($data_transaksi);
        $transaksi_id = $this->db->insert_id();

        $detail_transaksi = [];
        foreach ($this->array_nasabah as $key => $ob) {
            $detail_transaksi[$key] = [
                'transaksi_id' => $transaksi_id,
                'kode_nasabah' => $ob->kode,
                'jumlah' => $ob->jumlah,
            ];
        }
        $this->Transaksi_model->create_detail($detail_transaksi);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $response = [
            'status' => true,
            'message' => $msg,
        ];
        echo json_encode($response);
        return;
    }

    public function _data_nasabah_check($value)
    {
        $this->array_nasabah = json_decode($value);
        if (empty($this->array_nasabah)) 
        {
            $this->form_validation->set_message('_data_nasabah_check', 'The {field} can not be empty');
            return false;
        }
        foreach ($this->array_nasabah as $ob) 
        {
            $nasabah = $this->db->get_where('nasabah', ['kode' => $ob->kode])->row();
            if (! $nasabah) 
            {
                $this->form_validation->set_message('_data_nasabah_check', 'Data {field} tidak ditemukan');
                return false;
            }
            if ((int)$nasabah->stok < $ob->jumlah) 
            {
                $this->form_validation->set_message('_data_nasabah_check', "Gagal!, Stok {$nasabah->nama_nasabah} tersisa {$nasabah->stok} anda menginput {$ob->jumlah}");
                return false;
            }
        }
        return true;
    }

    public function hapus($id = null)
    {
        if (! $id) return show_404();
        $this->db->delete('transaksi', ['id' => $id]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('transaksi');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penarikan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penarikan_model');
    }

    public function index()
	{
        $this->form_validation->set_rules('id_nasabah', 'id_nasabah', 'required|trim');
        $this->form_validation->set_rules('jml_penarikan', 'jumlah penarikan', 'required|trim');
        $this->form_validation->set_rules('bank', 'bank', 'required|trim');
        $this->form_validation->set_rules('no_rek', 'nomor rekening', 'required|trim');
        $this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_penarikan_saldo'] = $this->Penarikan_model->get_all();
            $this->layout->set_title('Data penarikan');
            return $this->layout->load('template', 'penarikan/index', $data);
        } else {
            $datasimpan = [
                'id_nasabah' => $this->input->post('id_nasabah'),
                'jml_penarikan' => $this->input->post('jml_penarikam'),
                'bank' => $this->input->post('bank'),
                'no_rek' => $this->input->post('no_rek'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'status' => 'Pending',
            ];
            $tambah = $this->db->insert('tb_penarikan_saldo', $datasimpan);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('penarikan');
        }
    }
    
    public function hapus($id_penarikan = null)
    {
        if (! $id_penarikan) return show_404();
        $this->db->delete('tb_penarikan_saldo', ['id_penarikan' => $id_penarikan]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('penarikan/index');
    }

    public function verifikasi($id_penarikan = null)
    {
        if (!$id_penarikan) return show_404();
        $dataupdate = [
            'status' => $this->input->post('status'),
        ];
        $this->db->where('id_penarikan', $id_penarikan);
        $this->db->update('tb_penarikan_saldo', $dataupdate);
        $this->session->set_flashdata('info', 'Berhasil diubah');
        redirect('penarikan');
    }

    public function getAjax($id_penarikan = null)
    {
        $user = $this->db->get_where('tb_penarikan_saldo', ['id_penarikan' => $id_penarikan]);
        $user = json_encode($user->row());
        echo $user;
    }

    
}

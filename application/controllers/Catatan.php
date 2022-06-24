<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Catatan_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('id_nasabah', 'id_nasabah', 'required');
        $this->form_validation->set_rules('tanggal_pengajuan', 'tanggal_pengajuan', 'required');
        $this->form_validation->set_rules('penggunaan', 'penggunaan', 'required');
        $this->form_validation->set_rules('besar_pengajuan', 'besar pengajuan', 'required');
        $this->form_validation->set_rules('tenor', 'nama_tenor', 'required');
        $this->form_validation->set_rules('score', 'score', 'required');
        $this->form_validation->set_rules('ket_catatan', 'ket_catatan', 'required');
        $this->form_validation->set_rules('tanggal_ubah', 'tanggal_ubah', 'required');
        // $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['tb_pengajuan_kredit'] = $this->Catatan_model->get_all();
            $data['tb_data_nasabah'] = $this->Nasabah_model->get_all();
            $this->layout->set_title('Data catatan');
            return $this->layout->load('template', 'catatan/index', $data);
        } else {
            $datasimpan = [
                'id_nasabah' => $this->input->post('id_nasabah'),
                'tanggal' => $this->input->post('tanggal'),
                'penggunaan' => $this->input->post('penggunaan'),
                'besar_pengajuan' => $this->input->post('besar_pengajuan'),
                'tenor' => $this->input->post('tenor'),
                'score' => $this->input->post('score'),
                'tanggal_ubah' => $this->input->post('tanggal_ubah'),
                'tanggal_catatan' => $this->input->post('tanggal_catatan'),
                'status' => 'Pending',
                'ket_catatan' => $this->input->post('ket_catatan'),
                'id_adminstaff' => $this->session->userdata('user_id'),
            ];
            $tambah = $this->db->insert('tb_pengajuan_kredit', $datasimpan);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('catatan');
        }
    }

    public function hapus($id_pengajuan_kredit = null)
    {
        if (!$id_pengajuan_kredit) return show_404();
        $this->db->delete('tb_pengajuan_kredit', ['id_pengajuan_kredit' => $id_pengajuan_kredit]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('catatan/index');
    }

    public function verifikasi($id_pengajuan_kredit = null)
    {
        if (!$id_pengajuan_kredit) return show_404();
        $dataupdate = [
            'tanggal_catatan' => $this->input->post('tanggal_catatan'),
            'ket_catatan' => $this->input->post('ket_catatan'),
        ];
        $this->db->where('id_pengajuan_kredit', $id_pengajuan_kredit);
        $this->db->update('tb_pengajuan_kredit', $dataupdate);
        $this->session->set_flashdata('info', 'Catatan Berhasil Ditambahkan');
        redirect('catatan');
    }

    public function getAjax($id_pengajuan_kredit = null)
    {
        $user = $this->db->get_where('tb_pengajuan_kredit', ['id_pengajuan_kredit' => $id_pengajuan_kredit]);
        $user = json_encode($user->row());
        echo $user;
    }
}

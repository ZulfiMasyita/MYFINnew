<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajuan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ajuan_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('id_nasabah', 'id_nasabah', 'required');
        $this->form_validation->set_rules('tanggal_pengajuan', 'tanggal_pengajuan', 'required');
        $this->form_validation->set_rules('penggunaan', 'penggunaan', 'required');
        $this->form_validation->set_rules('besar_pengajuan', 'besar pengajuan', 'required');
        $this->form_validation->set_rules('tenor', 'nama_tenor', 'required');
        $this->form_validation->set_rules('score', 'score', 'required');
        $this->form_validation->set_rules('tanggal_ubah', 'tanggal_ubah', 'required');
        // $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['tb_pengajuan_kredit'] = $this->Ajuan_model->get_all();
            $data['tb_data_nasabah'] = $this->Nasabah_model->get_all();
            $this->layout->set_title('Data ajuan');
            return $this->layout->load('template', 'ajuan/index', $data);
        } else {
            $datasimpan = [
                'id_nasabah' => $this->input->post('id_nasabah'),
                'tanggal' => $this->input->post('tanggal'),
                'penggunaan' => $this->input->post('penggunaan'),
                'besar_pengajuan' => $this->input->post('besar_pengajuan'),
                'bsr_pengajuan_diterima' => $this->input->post('bsr_pengajuan_diterima'),
                'tenor' => $this->input->post('tenor'),
                'score' => $this->input->post('score'),
                'tanggal_ubah' => $this->input->post('tanggal_ubah'),
                'status' => 'Pending',
                'id_adminstaff' => $this->session->userdata('user_id'),
            ];
            $tambah = $this->db->insert('tb_pengajuan_kredit', $datasimpan);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('ajuan');
        }
    }

    public function hapus($id_pengajuan_kredit = null)
    {
        if (!$id_pengajuan_kredit) return show_404();
        $this->db->delete('tb_pengajuan_kredit', ['id_pengajuan_kredit' => $id_pengajuan_kredit]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('ajuan/index');
    }

    public function verifikasi($id_pengajuan_kredit = null)
    {
        if (!$id_pengajuan_kredit) return show_404();
        $aju = $this->db->get_where('tb_pengajuan_kredit', ["id_pengajuan_kredit" => $id_pengajuan_kredit])->row();
        $nama = $aju->id_nasabah;

        $dataupdate = [
            'bsr_pengajuan_diterima' => $this->input->post('bsr_pengajuan_diterima'),
            'status' => $this->input->post('status'),
            'tanggal_ubah' => $this->input->post('tanggal_ubah'),
        ];
        $this->db->where('id_pengajuan_kredit', $id_pengajuan_kredit);
        $this->db->update('tb_pengajuan_kredit', $dataupdate);
        $saldo = $this->db->select('SUM(bsr_pengajuan_diterima) AS saldo')->where('id_nasabah',$nama)->get('tb_pengajuan_kredit')->row();
        $saldo_akhir = $saldo->saldo;
        $dataupdate1 = [
            'saldo' => $saldo_akhir,
        ];
        $this->db->where('id_user', $nama);
        $this->db->update('tb_data_nasabah', $dataupdate1);

        $this->session->set_flashdata('info', 'Berhasil diubah');
        redirect('ajuan');
    }

    public function detail($id)
    {
        $data['detail_ajuan'] = $this->Ajuan_model->get_data_detail($id);
        $this->layout->set_title('Detail Data');
        return $this->layout->load('template', 'Ajuan/detail', $data);
    }

    public function getAjax($id_pengajuan_kredit = null)
    {
        $user = $this->db->get_where('tb_pengajuan_kredit', ['id_pengajuan_kredit' => $id_pengajuan_kredit]);
        $user = json_encode($user->row());
        echo $user;
    }
}

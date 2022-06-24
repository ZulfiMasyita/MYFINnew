<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kredit extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kredit_model');
    }

    public function index()
	{
        $this->form_validation->set_rules('penggunaan', 'penggunaan', 'required|trim');
        $this->form_validation->set_rules('besar_pengajuan', 'besar_pengajuan', 'required|trim');
        $this->form_validation->set_rules('tenor', 'tenor', 'required|trim');
        $this->form_validation->set_rules('score', 'score', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_pengajuan_kredit'] = $this->Kredit_model->get_all();
            $this->layout->set_title('Data kredit');
            return $this->layout->load('template', 'nasabah/ajuan/index', $data);
        }
        else
        {
            $data_kredit = [
                'penggunaan' => $this->input->post('penggunaan'),
                'besar_pengajuan' => $this->input->post('besar_pengajuan'),
                'tenor' => $this->input->post('tenor'),
                'score' => $this->input->post('score'),
                'status' => $this->input->post('status'),
                
            ];
            $tambah = $this->Kredit_model->create($data_kredit);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('kredit');
        }
    }
    
    public function hapus($id_pengajuan_kredit = null)
    {
        if (! $id_pengajuan_kredit) return show_404();
        $this->db->delete('tb_pengajuan_kredit', ['id_pengajuan_kredit' => $id_pengajuan_kredit]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('kredit');
    }

    public function getAjax($id_pengajuan_kredit = null)
    {
        $pengajuan_kredit = $this->db->get_where('tb_pengajuan_kredit', ['id_pengajuan_kredit' => $id_pengajuan_kredit]);
        $pengajuan_kredit = json_encode($pengajuan_kredit->row());
        echo $pengajuan_kredit;
    }

    public function ubah()
    {
        $this->form_validation->set_rules('penggunaan', 'penggunaan', 'required|trim');
        $this->form_validation->set_rules('besar_pengajuan', 'besar_pengajuan', 'required|trim');
        $this->form_validation->set_rules('tenor', 'tenor', 'required|trim');
        $this->form_validation->set_rules('score', 'score', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == FALSE) 
        {
            redirect('kredit');
        } 
        else
        {
            $data_kredit = [
                'penggunaan' => $this->input->post('penggunaan'),
                'besar_pengajuan' => $this->input->post('besar_pengajuan'),
                'tenor' => $this->input->post('tenor'),
                'score' => $this->input->post('score'),
                'status' => $this->input->post('status'), 
            ];
    
            $id_pengajuan_kredit = $this->input->post('id_adminstaff');
            $ubah = $this->Kredit_model->update( $id_pengajuan_kredit);
            $msg = $ubah ? 'Berhasil diubah' : 'Gagal diubah';
            $this->session->set_flashdata('info', $msg);
            redirect('kredit');
        }
    }
}

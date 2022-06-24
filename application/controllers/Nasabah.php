<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nasabah_model');
    }

    public function index()
	{
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('nik', 'nik', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_data_nasabah'] = $this->Nasabah_model->get_all();
            $this->layout->set_title('Data nasabah');
            return $this->layout->load('template', 'nasabah/index', $data);
        }else
        {
            $data_nasabah = [
                'email' => $this->input->post('email'),
                'nik' => $this->input->post('nik'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                
            ];
            $tambah = $this->Nasabah_model->create($data_nasabah);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('nasabah');
        }
    }

    public function nonaktif()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('nik', 'nik', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_data_nasabah'] = $this->Nasabah_model->get_nonaktif();
            $this->layout->set_title('Data nasabah Nonaktif');
            return $this->layout->load('template', 'nasabah/nasabahNonaktif', $data);
        }else
        {
            $data_nasabah = [
                'email' => $this->input->post('email'),
                'nik' => $this->input->post('nik'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                
            ];
            $tambah = $this->Nasabah_model->create($data_nasabah);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('nasabah');
        }
    }

    public function nonaktifkan($id = null)
    {
        if (! $id) return show_404();
        $this->db->update('tb_data_nasabah', ["deleted" => 1], ['id_user' => $id]);
        $this->session->set_flashdata('info', 'Berhasil di nonaktifkan');
        redirect('nasabah');
    }

    public function aktifkan($id = null)
    {
        if (! $id) return show_404();
        $this->db->update('tb_data_nasabah', ["deleted" => 0], ['id_user' => $id]);
        $this->session->set_flashdata('info', 'Berhasil di aktifkan');
        redirect('nasabah/nonaktif');
    }
    
    public function hapus($id_user = null)
    {
        if (! $id_user) return show_404();
        $this->db->delete('tb_data_nasabah', ['id_user' => $id_user]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('nasabah/index');
    }

    public function getAjax($id_user = null)
    {
        $user = $this->db->get_where('tb_data_nasabah', ['id_user' => $id_user]);
        $user = json_encode($user->row());
        echo $user;
    }
    
//    public function ubah()
//    {
//        $this->form_validation->set_rules('email', 'email', 'required|trim');
//        $this->form_validation->set_rules('nik', 'nik', 'required|trim');
//        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required|trim');
//        if ($this->form_validation->run() == FALSE) 
//        {
//            redirect('nasabah');
//        } 
//        else
//        {
//            $data_nasabah = [
//                'email' => $this->input->post('email'),
//                'nik' => $this->input->post('nik'),
//                'nama_lengkap' => $this->input->post('nama_lengkap'), 
//            ];
//            $id = $this->input->post('id_user');
//            $ubah = $this->Nasabah_model->update($data_nasabah, $id);
//            $msg = $ubah ? 'Berhasil diubah' : 'Gagal diubah';
//            $this->session->set_flashdata('info', $msg);
//            redirect('nasabah');
//        }
//    }
}



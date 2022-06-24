<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model');
    }

    public function index()
	{
        $this->form_validation->set_rules('email_adminstaff', 'email_adminstaff', 'required|trim');
        $this->form_validation->set_rules('password_adminstaff', 'password_adminstaff', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('nama_adminstaff', 'nama_adminstaff', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_staff'] = $this->Staff_model->get_all();
            $this->layout->set_title('Data staff');
            return $this->layout->load('template', 'staff/index', $data);
        }
        else
        {
            $password_hash = password_hash($this->input->post('password_adminstaff'), PASSWORD_DEFAULT);
            $data_staff = [
                'email_adminstaff' => $this->input->post('email_adminstaff'),
                'password_adminstaff' => $password_hash,
                'role' => $this->input->post('role'),
                'nama_adminstaff' => $this->input->post('nama_adminstaff'),
                
            ];
            $tambah = $this->Staff_model->create($data_staff);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('staff');
        }
    }
    
    public function hapus($id = null)
    {
        if (! $id) return show_404();
        $this->db->delete('tb_staff', ['id_adminstaff' => $id]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('staff');
    }

    public function getAjax($id= null)
    {
        $staff = $this->db->get_where('tb_staff', ['id_adminstaff' => $id]);
        $staff = json_encode($staff->row());
        echo $staff;
    }

    public function ubah()
    {
        $this->form_validation->set_rules('email_adminstaff', 'email_adminstaff', 'required|trim');
        $this->form_validation->set_rules('role', 'role', 'required|trim');
        $this->form_validation->set_rules('nama_adminstaff', 'nama_adminstaff', 'required|trim');
        if ($this->form_validation->run() == FALSE) 
        {
            redirect('staff');
        } 
        else
        {
            $data_staff = [
                'email_adminstaff' => $this->input->post('email_adminstaff'),
                'role' => $this->input->post('role'),
                'nama_adminstaff' => $this->input->post('nama_adminstaff'), 
            ];
            $id = $this->input->post('id_adminstaff');
            $ubah = $this->Staff_model->update($data_staff, $id);
            $msg = $ubah ? 'Berhasil diubah' : 'Gagal diubah';
            $this->session->set_flashdata('info', $msg);
            redirect('staff');
        }
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
	{
        $this->form_validation->set_rules('email_adminstaff', 'Email', 'required|trim|is_unique[tb_adminstaff.email_adminstaff]');
        $this->form_validation->set_rules('password_adminstaff', 'password_adminstaff', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('nama_adminstaff', 'nama_adminstaff', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_adminstaff'] = $this->Admin_model->get_all();
            $this->layout->set_title('Data admin');
            return $this->layout->load('template', 'admin/index', $data);
        }
        else
        {
            $password_hash = password_hash($this->input->post('password_adminstaff'), PASSWORD_DEFAULT);
            $data_adminstaff = [
                'email_adminstaff' => $this->input->post('email_adminstaff'),
                'password_adminstaff' => $password_hash,
                'role' => $this->input->post('role'),
                'nama_adminstaff' => $this->input->post('nama_adminstaff'),
                
            ];
            $tambah = $this->Admin_model->create($data_adminstaff);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('admin');
        }
    }

    public function nonaktif()
    {
        $this->form_validation->set_rules('email_adminstaff', 'Email', 'required|trim|is_unique[tb_adminstaff.email_adminstaff]');
        $this->form_validation->set_rules('password_adminstaff', 'password_adminstaff', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('nama_adminstaff', 'nama_adminstaff', 'required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tb_adminstaff'] = $this->Admin_model->get_nonaktif();
            $this->layout->set_title('Data admin Non Aktif');
            return $this->layout->load('template', 'admin/adminNonaktif', $data);
        }
        else
        {
            $password_hash = password_hash($this->input->post('password_adminstaff'), PASSWORD_DEFAULT);
            $data_adminstaff = [
                'email_adminstaff' => $this->input->post('email_adminstaff'),
                'password_adminstaff' => $password_hash,
                'role' => $this->input->post('role'),
                'nama_adminstaff' => $this->input->post('nama_adminstaff'),
                
            ];
            $tambah = $this->Admin_model->create($data_adminstaff);
            $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
            $this->session->set_flashdata('info', $msg);
            redirect('admin');
        }
    }

    public function nonaktifkan($id = null)
    {
        if (! $id) return show_404();
        $this->db->update('tb_adminstaff', ["deleted" => 1], ['id_adminstaff' => $id]);
        $this->session->set_flashdata('info', 'Berhasil di nonaktifkan');
        redirect('admin');
    }

    public function aktifkan($id = null)
    {
        if (! $id) return show_404();
        $this->db->update('tb_adminstaff', ["deleted" => 0], ['id_adminstaff' => $id]);
        $this->session->set_flashdata('info', 'Berhasil di aktifkan');
        redirect('admin/nonaktif');
    }
    
    public function hapus($id = null)
    {
        if (! $id) return show_404();
        $this->db->delete('tb_adminstaff', ['id_adminstaff' => $id]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('admin');
    }

    public function getAjax($id= null)
    {
        $adminstaff = $this->db->get_where('tb_adminstaff', ['id_adminstaff' => $id]);
        $adminstaff = json_encode($adminstaff->row());
        echo $adminstaff;
    }

    public function ubah()
    {
        $id = $this->input->post('id_adminstaff');

        $rulesUniqueEmail = "";
        $newEmail = $this->input->post("email_adminstaff");
        $OldEmail = $this->db->get_where("tb_adminstaff",['id_adminstaff' => $id])->row_array()['email_adminstaff'];

        if($newEmail != $OldEmail){
            $rulesUniqueEmail = "|is_unique[tb_adminstaff.email_adminstaff]";
        }

        $this->form_validation->set_rules('email_adminstaff', 'Email', 'required'.$rulesUniqueEmail);
        $this->form_validation->set_rules('role', 'role', 'required|trim');
        $this->form_validation->set_rules('nama_adminstaff', 'nama_adminstaff', 'required|trim');
        if ($this->form_validation->run() == FALSE) 
        {
            redirect('admin');
        } 
        else
        {
            $data_adminstaff = [
                'email_adminstaff' => $this->input->post('email_adminstaff'),
                'role' => $this->input->post('role'),
                'nama_adminstaff' => $this->input->post('nama_adminstaff'), 
            ];
            $ubah = $this->Admin_model->update($data_adminstaff, $id);
            $msg = $ubah ? 'Berhasil diubah' : validation_errors();
            $this->session->set_flashdata('info', $msg);
            redirect('admin');
        }
    }
}

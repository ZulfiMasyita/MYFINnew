<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    //public function __construct()
    //{
    //    parent::__construct();
    //    if ($this->session->login) redirect('dashboard');
    //    $this->load->model('Auth_model');
    //}

    public function login()
	{
        if ($this->session->userdata('logged_in')) return redirect('dashboard');
        $this->form_validation->set_rules('email_adminstaff', 'Email admin', 'required');
        $this->form_validation->set_rules('password_adminstaff', 'Kata Sandi', 'required');
        if ($this->form_validation->run() == TRUE) 
        {
            $this->check_login();
        }
        $this->load->view('auth/login');
    }
    
    private function check_login()
    {
        $this->load->model('auth_model');
        $email_adminstaff = $this->input->post('email_adminstaff');
        $password_adminstaff = $this->input->post('password_adminstaff');
        $check_login = $this->auth_model->check_login($email_adminstaff, $password_adminstaff);
        if($check_login -> deleted == 1){
            $this->session->set_flashdata('info', 'Akun anda dinonaktifkan');
            redirect('auth/login');
        }else{
        if (! $check_login) {
            $this->session->set_flashdata('info', 'Email atau kata sandi salah');
            redirect('auth/login');
        }
        $dataLogin = [
            'logged_in' => true,
            'user_id' => $check_login->id,
            'email_adminstaff' => $check_login->email_adminstaff,
            'nama_adminstaff' => $check_login->nama_adminstaff,
            'role' => $check_login->role,
        ];
        $this->session->set_userdata($dataLogin);
        redirect('dashboard');
        }
    }

    public function logout()
    {
        $dataLogin = ['logged_in', 'user_id', 'email_adminstaff', 'nama_adminstaff', 'role'];
        $this->session->unset_userdata($dataLogin);
        redirect('auth/login');
    }
}

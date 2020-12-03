<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function index()
    {

        $this->load->view('backend/auth/login');
    }
	public function login() // berguna untuk mengatur proses login aplikasi
	{
		if (isset($_POST['login'])) { //jika ditekan tombol login
			$username = $this->input->post('username'); //simpan data username
			$password = $this->input->post('password'); //simpan data password
			// var_dump($layanan);exit();
			$loginData = $this->AuthModel->get_by_usrnm($username); //cek data didatabase berdasarkan username yg diinputkan
			$existsStatus = $loginData->num_rows(); //jika ada hitung jumlah nya
			$user = $loginData->row_array(); // jika ada ambil datanya

			if ($existsStatus > 0){
				$sess_data = array(
					'session_username' => $user['user_username'],
					'session_id' => $user['user_id'],
					'session_nama' => $user['user_nama'],
					'session_level' => $user['user_level'],
				);
				$this->session->set_userdata($sess_data);
				redirect('admin');
			}else{
				redirect('login');
			}
		}
	}
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url(''));
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('KategoriModel');
        $this->load->model('KeranjangModel');
        $this->load->model('CrudModel');
    }

    public function index()
    {
		$data['kategori'] = $this->KategoriModel->lihat_kategori();
		$data['keranjang'] = $this->KeranjangModel->lihat_keranjang($this->session->userdata('session_id'));


    	if (isset($_GET['produk'])){
			$data['produk'] = $_GET['produk'];
//    		$this->load->view('backend/auth/login',$data);
    		$this->load->view('frontend/templates/header',$data);
    		$this->load->view('backend/auth/login2',$data);
    		$this->load->view('frontend/templates/footer',$data);
    	}else{
			$data['produk'] = null;
//			$this->load->view('backend/auth/login',$data);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('backend/auth/login2',$data);
			$this->load->view('frontend/templates/footer',$data);
		}
    }
	public function register()
	{

		if (isset($_POST['daftar'])){
			$checkUser = $this->AuthModel->get_by_email($this->input->post('email'))->num_rows();
			if ($checkUser>0){
				$this->session->set_flashdata('alert', 'email_terdaftar');
				redirect('register');
			}else{
				$data = array(
					'user_username' => $this->input->post('username'),
					'user_nama' => $this->input->post('nama'),
					'user_email' => $this->input->post('email'),
					'user_hp' => $this->input->post('hp'),
					'user_password' => md5($this->input->post('password')),
					'user_level' => 'pelanggan',
				);
				if ($this->input->post('password') != $this->input->post('repassword')){
					$this->session->set_flashdata('alert', 'password_beda');
					redirect('register');
				}else{
					$simpan = $this->CrudModel->insert('tb_user',$data);
					if ($simpan > 0){
						$this->session->set_flashdata('alert', 'berhasil_register');
						redirect('');
					} else {
						$this->session->set_flashdata('alert', 'gagal_register');
						redirect('');
					}
				}
			}


		}else{
			$data = array(
				'page_title' => 'Data Produk',
				'icon_title' => 'fa-balance-scale',
				'kategori' => $this->KategoriModel->lihat_kategori(),
				'keranjang' => $this->KeranjangModel->lihat_keranjang($this->session->userdata('session_id')),
			);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('frontend/register',$data);
			$this->load->view('frontend/templates/footer',$data);
		}


	}
	public function login() // berguna untuk mengatur proses login aplikasi
	{
		if (isset($_POST['login'])) { //jika ditekan tombol login
			$username = $this->input->post('username'); //simpan data username
			$password = $this->input->post('password'); //simpan data password
			// var_dump($layanan);exit();
			$loginData = $this->AuthModel->get_by_email($username); //cek data didatabase berdasarkan username yg diinputkan
			$existsStatus = $loginData->num_rows(); //jika ada hitung jumlah nya
			$user = $loginData->row_array(); // jika ada ambil datanya

			if ($existsStatus > 0){
				$sess_data = array(
					'session_username' => $user['user_username'],
					'session_id' => $user['user_id'],
					'session_nama' => $user['user_nama'],
					'session_level' => $user['user_level'],
					'session_email' => $user['user_email'],
				);
				$this->session->set_userdata($sess_data);
				if ($this->input->post('produk') != null){
					redirect('produk/'.$this->input->post('produk'));
				}else{
					if ($user['user_level'] == 'pelanggan'){
						redirect('pesanan');
					}else{
						redirect('admin');
					}
				}
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
    public function changePassword()
    {
        if (isset($_POST['change'])){
        	$nama = $this->input->post('nama');
        	$email = $this->input->post('email');
        	$username = $this->input->post('username');
        	$new_password = $this->input->post('new_password');
        	$re_password = $this->input->post('re_password');

        	$user = $this->AuthModel->get_by_email($email)->num_rows();
        	var_dump($user);
			if ($user>0){
				if ($new_password == $re_password){
					$data = array(
						'user_nama' => $nama,
						'user_password' => $new_password,
						'user_email' => $email,
					);
					$this->CrudModel->update('user_username',$username,'tb_user',$data);
					$this->session->set_flashdata('alert', 'berhasil_ubah');
					redirect('pesanan');
				}else{
					$this->session->set_flashdata('alert', 'password_beda');
					redirect('pesanan');
				}

			}else{
				$this->session->set_flashdata('alert', 'gagal_update');
				redirect('pesanan');
			}


		}
    }

}

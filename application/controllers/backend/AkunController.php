<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AkunController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KategoriModel','ProdukModel','TransaksiModel','CrudModel','KeranjangModel','AuthModel');
		$this->load->model($model);
	}

	public function index(){

			$data = array(
				'title' => 'Akun ',
				'page_title' => 'Akun',
				'icon_title' => 'fa-user',
				'akun' => $this->AuthModel->get_akun()
			);
			$this->load->view('backend/templates/header',$data);
			$this->load->view('backend/akun/index',$data);
			$this->load->view('backend/templates/footer');
	}
	public function hapus($id){
		$hapus = $this->CrudModel->delete('user_id',$id,'tb_user');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('admin/akun');
		} else {
			$this->session->set_flashdata('alert', 'fail_edit');
			redirect('admin/akun');
		}
	}
	public function tambah(){
		if (isset($_POST['simpan'])){
			$data = array(
				'user_username' => $this->input->post('username'),
				'user_nama' => $this->input->post('nama'),
				'user_email' => $this->input->post('email'),
				'user_hp' => $this->input->post('hp'),
				'user_password' => md5($this->input->post('password')),
				'user_level' => $this->input->post('level'),
			);

			$simpan = $this->CrudModel->insert('tb_user',$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'berhasil_register');
				redirect('admin/akun');
			} else {
				$this->session->set_flashdata('alert', 'gagal_register');
				redirect('admin/akun');
			}
		}else{

		}
	}
}

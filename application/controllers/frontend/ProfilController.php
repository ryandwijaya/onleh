<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('CrudModel');
		$this->load->model('KeranjangModel');
	}

	public function index()
	{
		$data = array(
			'page_title' => 'Data Produk',
			'icon_title' => 'fa-balance-scale',
			'kategori' => $this->KategoriModel->lihat_kategori(),
			'keranjang' => $this->KeranjangModel->lihat_keranjang($this->session->userdata('session_id')),
			'profil' => $this->CrudModel->view_data_by_id(1,'profil_id','tb_profil'),
		);
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/profil/index',$data);
		$this->load->view('frontend/templates/footer');
	}

}

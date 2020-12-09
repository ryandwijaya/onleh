<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesananController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('CrudModel');
		$this->load->model('KeranjangModel');
		$this->load->model('TransaksiModel');
	}

	public function index()
	{
		$data = array(
			'page_title' => 'Data Produk',
			'icon_title' => 'fa-balance-scale',
			'kategori' => $this->KategoriModel->lihat_kategori(),
			'transaksi' => $this->TransaksiModel->lihat_transaksi_by_user($this->session->userdata('session_id')),
			'profil' => $this->CrudModel->view_data_by_id(1,'profil_id','tb_profil'),
			'user' => $this->CrudModel->view_data_by_id($this->session->userdata('session_id'),'user_id','tb_user'),
		);
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/pesanan/index',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function detail($id){
		$data = array(
			'title' => 'Detail Transaksi ',
			'page_title' => 'Detail Transaksi',
			'icon_title' => 'fa-money',
			'transaksi' => $this->TransaksiModel->lihat_transaksi_keranjang($id),
			'kategori' => $this->KategoriModel->lihat_kategori(),
			'keranjang' => $this->KeranjangModel->lihat_keranjang($this->session->userdata('session_id')),
		);
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/pesanan/detail',$data);
		$this->load->view('frontend/templates/footer');
	}

}

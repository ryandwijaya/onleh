<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KategoriModel','ProdukModel','TransaksiModel','CrudModel');
		$this->load->model($model);
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Transaksi ',
			'page_title' => 'Data Transaksi',
			'icon_title' => 'fa-money',
		);
		if ($this->session->userdata('session_level') == 'pelanggan'){
			$data['transaksi'] = $this->TransaksiModel->lihat_transaksi_by_user($this->session->userdata('session_id'));
		}else{
			$data['transaksi'] = $this->TransaksiModel->lihat_transaksi();
		}

		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/transaksi/index',$data);
		$this->load->view('backend/templates/footer');
	}
	public function lihat($id)
	{
		$data = array(
			'title' => 'Detail Transaksi ',
			'page_title' => 'Detail Transaksi',
			'icon_title' => 'fa-money',
			'keranjang' => $this->TransaksiModel->lihat_transaksi_keranjang($id)
		);
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/transaksi/lihat',$data);
		$this->load->view('backend/templates/footer');
	}

	public function konfirmasi($id)
	{
		$dataTransaksi = array(
			'transaksi_status_pembayaran' => 'dikonfirmasi',
		);
		$dataKeranjang = array(
			'keranjang_status' => 'dikonfirmasi',
		);
		$update= $this->CrudModel->update('transaksi_id',$id,'tb_transaksi',$dataTransaksi);
		if ($update == true){
			$update= $this->CrudModel->update('keranjang_id_transaksi',$id,'tb_keranjang',$dataKeranjang);
			$this->session->set_flashdata('alert', 'success_change');
			redirect('admin/transaksi');
		}else{
			$this->session->set_flashdata('alert', 'fail_change');
			redirect('admin/transaksi');
		}
	}
}

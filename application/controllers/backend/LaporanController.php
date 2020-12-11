<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KategoriModel','ProdukModel','TransaksiModel','CrudModel','KeranjangModel','LaporanModel');
		$this->load->model($model);
	}

	public function index(){
		if (isset($_POST['lihat'])){
			$start = $this->input->post('date_start');
			$end = $this->input->post('date_end');
			$data = array(
				'start' => $start,
				'end' => $end,
				'title' => 'Laporan ',
				'page_title' => 'Laporan',
				'icon_title' => 'fa-file',
				'laporan' => $this->LaporanModel->get_laporan_range_date($start,$end)
			);
			$this->load->view('backend/templates/header',$data);
			$this->load->view('backend/laporan/index',$data);
			$this->load->view('backend/templates/footer');
		}else{
			$start = date('Y-m-d');
			$end = date('Y-m-d');
			$data = array(
				'start' => $start,
				'end' => $end,
				'title' => 'Laporan ',
				'page_title' => 'Laporan',
				'icon_title' => 'fa-file',
				'laporan' => $this->LaporanModel->get_laporan_range_date($start,$end)
			);
			$this->load->view('backend/templates/header',$data);
			$this->load->view('backend/laporan/index',$data);
			$this->load->view('backend/templates/footer');
		}

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('CrudModel');
		$this->load->model('KeranjangModel');
    }

    public function produk($id)
    {
        $data = array(
            'page_title' => 'Data Produk',
            'icon_title' => 'fa-balance-scale',
            'produk' => $this->ProdukModel->lihat_satu_produk($id),
            'produk_id' => $id,
			'kategori' => $this->KategoriModel->lihat_kategori(),
			'keranjang' => $this->KeranjangModel->lihat_keranjang($this->session->userdata('session_id')),
        );
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/produk/satuan',$data);
        $this->load->view('frontend/templates/footer');
    }
	public function produk_by_kategori($kategori)
	{

		$data = array(
			'page_title' => 'Data Produk',
			'icon_title' => 'fa-balance-scale',
			'produk' => $this->ProdukModel->lihat_produk_by_kategori($kategori),
			'kategori' => $this->KategoriModel->lihat_kategori(),
		);
//		var_dump('ok');exit();
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/produk/list',$data);
		$this->load->view('frontend/templates/footer');
	}
    
}

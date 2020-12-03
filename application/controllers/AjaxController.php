<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('CrudModel');

	}
	public function add_keranjang(){

		if ($this->session->userdata('session_id') === '' || $this->session->userdata('session_id') == null) {
			redirect(base_url('login'), 'refresh');
		}else{
			$produk = $this->ProdukModel->lihat_satu_produk($this->input->post('id_produk'));

			$data= array(
				'keranjang_id_user' => $this->input->post('id_user'),
				'keranjang_id_produk' =>  $this->input->post('id_produk'),
				'keranjang_jumlah_beli' =>  $this->input->post('jumlah_beli'),
				'keranjang_total' => ($this->input->post('jumlah_beli')*$produk['produk_harga']),
			);
			$simpan = $this->CrudModel->insert('tb_keranjang',$data);
//			var_dump($simpan);
			if ($simpan == true){
				redirect('produk/'.$this->input->post('id_produk'));
			}else{
				echo 'gagal';
			}
		}

	}

}

?>

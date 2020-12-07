<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeranjangController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('KategoriModel');
		$this->load->model('KeranjangModel');
		$this->load->model('TransaksiModel');
		$this->load->model('CrudModel');
	}

	public function index($id)
	{
		$data = array(
			'page_title' => 'Keranjang',
			'icon_title' => 'fa-balance-scale',
			'keranjang' => $this->KeranjangModel->lihat_keranjang($id),
			'kategori' => $this->KategoriModel->lihat_kategori(),
			'id_user' => $id,
		);
//		var_dump($data['keranjang']);exit();
		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/keranjang/index',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function hapus($id,$user){
		$hapus = $this->CrudModel->delete('keranjang_id',$id,'tb_keranjang');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('keranjang/'.$user);
		} else {
			$this->session->set_flashdata('alert', 'fail_edit');
			redirect('keranjang/'.$user);
		}
	}
	public function checkout($id)
	{
		if (isset($_POST['bayar'])) {
				$kode = 'NAD-'.$this->session->userdata('session_username').'-'.random_int(100, 999).'-'.random_int(1000, 9999);
//				var_dump($kode);exit();
				$data = array(
					'transaksi_kode' => $kode,
					'transaksi_id_user' => $id,
					'transaksi_total' => $this->input->post('total_bayar'),
					'transaksi_alamat_pengiriman' => $this->input->post('alamat'),
				);

				$simpan = $this->KeranjangModel->insertGetId($data);
				if ($simpan > 0){
					$checkout = array(
						'keranjang_status' => 'menunggu',
						'keranjang_id_transaksi' => $simpan
					);
					$update = $this->KeranjangModel->updateCheckout($id,$checkout);

					$this->session->set_flashdata('alert', 'success_post');
					redirect('pembayaran/'.$kode);
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('admin/produk');
				}

			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/produk/tambah');
			$this->load->view('backend/templates/footer');
		}
	}

	public function pembayaran($kode)
	{
		if (isset($_POST['upload'])){
			$config['upload_path'] = './assets/upload/images/bukti_pembayaran/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$nama_foto = time().$_FILES["foto"]['name'];
			$new_name =str_replace(" ", "_", $nama_foto);
			$config['file_name'] = $new_name;
			$this->upload->initialize($config);
			$transaksi = $this->CrudModel->view_data_by_id($kode,'transaksi_kode','tb_transaksi');

			if (!$this->upload->do_upload('foto')){
				echo 'GAGAL';
			}else{
				$data = array(
					'transaksi_bukti_pembayaran' => $new_name,
					'transaksi_tgl_upload' => Date('Y-m-d h:i:s'),
				);
				$keranjang = array(
					'keranjang_status' => 'dibayar',
				);
				$update = $this->KeranjangModel->updateTransaksi($kode,$data);
				$updateKeranjang = $this->KeranjangModel->updateKeranjang($transaksi['transaksi_id_user'],$keranjang);
				if ($update > 0){
					$this->session->set_flashdata('alert', 'berhasil_upload');
					redirect('pembayaran/'.$kode);
				} else {
					echo 'Gagal';
				}
			}
		}else{
			$data = array(
				'page_title' => 'Keranjang',
				'icon_title' => 'fa-balance-scale',
				'transaksi' => $this->TransaksiModel->lihat_transaksi_by_kode($kode),
				'kategori' => $this->KategoriModel->lihat_kategori(),
				'kode' => $kode,
			);

			$this->load->view('frontend/templates/header', $data);
			$this->load->view('frontend/keranjang/pembayaran',$data);
			$this->load->view('frontend/templates/footer');
		}
	}
	public function cek_pembayaran(){
		if (isset($_POST['check'])){
			redirect('pembayaran/'.$this->input->post('kode'));
		}else{
			$data = array(
				'page_title' => 'Keranjang',
				'icon_title' => 'fa-balance-scale',
				'kategori' => $this->KategoriModel->lihat_kategori(),
			);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('frontend/keranjang/cek_pembayaran');
			$this->load->view('frontend/templates/footer');
		}

	}

}

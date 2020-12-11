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
			redirect(base_url('login').'?produk='.$this->input->post('id_produk'), 'refresh');
		}else{
			$produk = $this->ProdukModel->lihat_satu_produk($this->input->post('id_produk'));
			if ($this->input->post('jumlah_beli')  <=  $produk['produk_stok']){
				$data= array(
					'keranjang_id_user' => $this->input->post('id_user'),
					'keranjang_id_produk' =>  $this->input->post('id_produk'),
					'keranjang_jumlah_beli' =>  $this->input->post('jumlah_beli'),
					'keranjang_total' => ($this->input->post('jumlah_beli')*$produk['produk_harga']),
				);
				$simpan = $this->CrudModel->insert('tb_keranjang',$data);
//			var_dump($simpan);
				if ($simpan == true){
					$this->session->set_flashdata('alert', 'berhasil_keranjang');
					redirect('produk/'.$this->input->post('id_produk'));
				}else{
					echo 'gagal';
				}
			}else{
				$this->session->set_flashdata('alert', 'stok_melebihi');
				redirect('produk/'.$this->input->post('id_produk'));
			}

		}

	}
	public function ajaxOngkir(){


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 5e92ca5fd67eeab82a941b820c12378b"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}
	public function getProvinsi(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 5e92ca5fd67eeab82a941b820c12378b"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}
	public function getKota($provinsi){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$provinsi,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 5e92ca5fd67eeab82a941b820c12378b"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}
	public function getOngkir($kota_tujuan,$berat){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=350&destination=".$kota_tujuan."&weight=".$berat."&courier=jne",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 5e92ca5fd67eeab82a941b820c12378b"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}
	}


}

?>

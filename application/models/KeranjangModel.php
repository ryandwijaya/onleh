<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KeranjangModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_keranjang($id){
		$this->db->select('*');
		$this->db->from('tb_keranjang');
		$this->db->join('tb_user','tb_user.user_id = tb_keranjang.keranjang_id_user');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_keranjang.keranjang_id_produk');
		$this->db->where('keranjang_id_user',$id);
		$this->db->where('keranjang_status','belum');
		$query = $this->db->get();
		return $query->result_array();
	}


	function insertGetId($data){
		$this->db->insert('tb_transaksi',$data);
		return $this->db->insert_id();
	}
	function updateCheckout($id_user,$data){
		$this->db->where('keranjang_id_user',$id_user);
		$this->db->where('keranjang_status','belum');
		return $this->db->update('tb_keranjang',$data);
	}
	function updateTransaksi($kode,$data){
		$this->db->where('transaksi_kode',$kode);
		return $this->db->update('tb_transaksi',$data);
	}
	function updateKeranjang($id_user,$data){
		$this->db->where('keranjang_id_user',$id_user);
		$this->db->where('keranjang_status','menunggu');
		return $this->db->update('tb_keranjang',$data);
	}

}

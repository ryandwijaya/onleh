<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_transaksi(){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user','tb_user.user_id = tb_transaksi.transaksi_id_user');
		$this->db->order_by('transaksi_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_transaksi_by_user($user){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user','tb_user.user_id = tb_transaksi.transaksi_id_user');
		$this->db->where('transaksi_id_user',$user);
		$this->db->order_by('transaksi_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_transaksi_by_kode($kode){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user','tb_user.user_id = tb_transaksi.transaksi_id_user');
		$this->db->where('transaksi_kode',$kode);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function lihat_transaksi_keranjang($id_transaksi){
		$this->db->select('*');
		$this->db->from('tb_keranjang');
		$this->db->join('tb_user','tb_user.user_id = tb_keranjang.keranjang_id_user');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_keranjang.keranjang_id_produk');
		$this->db->join('tb_transaksi','tb_transaksi.transaksi_id = tb_keranjang.keranjang_id_transaksi');
		$this->db->where('keranjang_id_transaksi',$id_transaksi);
		$this->db->order_by('keranjang_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

}

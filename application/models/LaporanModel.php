<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_laporan_range_date($date_start,$date_end){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user','tb_user.user_id = tb_transaksi.transaksi_id_user');
		$this->db->where('date(transaksi_date_created) >=',$date_start);
		$this->db->where('date(transaksi_date_created) <=',$date_end);
		$this->db->where('transaksi_status_pembayaran','dikonfirmasi');
		$query = $this->db->get();
		return $query->result_array();
	}

}

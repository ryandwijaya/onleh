<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function view_data($table,$order){
    	$this->db->order_by($order,'DESC');
    	return $this->db->get($table)->result_array();
	}

    function view_data_by_id($id,$key,$table){
    	$this->db->where($key,$id);
    	return $this->db->get($table)->row_array();
	}

    function insert($table,$data){
        return $this->db->insert($table,$data);
    }
    function delete($key,$id,$table){
        $this->db->where($key,$id);
        return $this->db->delete($table);
    }
    function update($key,$id,$table,$data){
        $this->db->where($key,$id);
        return $this->db->update($table,$data);
    }
	function get_keranjang($id){
		$this->db->from('tb_keranjang');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_keranjang.keranjang_id_produk');
		$this->db->where('keranjang_id_user',$id);
		$this->db->where('keranjang_status','belum');
		$this->db->where('DATE(keranjang_date_created)', date('Y-m-d'));
		return $this->db->get()->result_array();
	}

	function get_pesanan($status){
		$this->db->from('tb_transaksi');
		$this->db->where('transaksi_status_pembayaran',$status);
		return $this->db->get();
	}
    
}



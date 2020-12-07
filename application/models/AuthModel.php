<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function get_by_usrnm($usrnm){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('tb_user.user_username',$usrnm);
		return $this->db->get();
	}

}



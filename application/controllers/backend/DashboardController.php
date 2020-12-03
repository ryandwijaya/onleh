<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('session_id') === '' || $this->session->userdata('session_id') == null) {
			redirect(base_url('login'), 'refresh');
		}
    }
    public function index()
    {
        $data = array(
            'title' => 'Neraca Multiscale',
            'page_title' => 'Dashboard',
            'icon_title' => 'fa-home'
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/index');
        $this->load->view('backend/templates/footer');
    }
}

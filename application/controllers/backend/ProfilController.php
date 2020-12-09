<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KategoriModel','ProdukModel','TransaksiModel','CrudModel','KeranjangModel');
		$this->load->model($model);
	}

	public function index()
	{
		if (isset($_POST['simpan'])){
			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$tgl_berdiri = $this->input->post('tgl_berdiri');
			$alamat = $this->input->post('alamat');

			$config['upload_path'] = './assets/upload/images/profil/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$data = array(
					'profil_nama' => $nama,
					'profil_deskripsi' => $deskripsi,
					'profil_tgl_berdiri' => $tgl_berdiri,
					'profil_alamat' => $alamat,
				);
				$update = $this->CrudModel->update('profil_id',1,'tb_profil',$data);
				if ($update > 0){
					$this->session->set_flashdata('alert', 'success_change');
					redirect('admin/profil');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('admin/profil');
				}
			}else{
				$foto = $this->upload->data('file_name');

				$data = array(
					'profil_gambar' => $foto,
					'profil_nama' => $nama,
					'profil_deskripsi' => $deskripsi,
					'profil_tgl_berdiri' => $tgl_berdiri,
					'profil_alamat' => $alamat,
				);
				$update = $this->CrudModel->update('profil_id',1,'tb_profil',$data);
				if ($update > 0){
					$this->session->set_flashdata('alert', 'success_change');
					redirect('admin/profil');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('admin/profil');
				}
			}

		}else{
			$data = array(
				'title' => 'Profil ',
				'page_title' => 'Profil',
				'icon_title' => 'fa-user',
				'profil' => $this->CrudModel->view_data_by_id(1,'profil_id','tb_profil'),
			);
//		var_dump($data);exit();
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/profil/index',$data);
			$this->load->view('backend/templates/footer');
		}

	}

}

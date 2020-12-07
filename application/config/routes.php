<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    //backend
	$route['admin'] = 'backend/DashboardController';
	$route['admin/kategori'] = 'backend/KategoriController';
	$route['admin/kategori/tambah'] = 'backend/KategoriController/tambah';
	$route['admin/kategori/updateForm/(:any)'] = 'backend/KategoriController/updateForm/$1';
	$route['admin/kategori/update'] = 'backend/KategoriController/update';
	$route['admin/kategori/hapus/(:any)'] = 'backend/KategoriController/hapus/$1';

	$route['admin/produk'] = 'backend/ProdukController';
	$route['admin/produk/tambah'] = 'backend/ProdukController/tambah';
	$route['admin/produk/lihat/(:any)'] = 'backend/ProdukController/lihat/$1';
	$route['admin/produk/update/(:any)'] = 'backend/ProdukController/update/$1';
	$route['admin/produk/tambah-stok'] = 'backend/ProdukController/tambah_stok';
	$route['admin/produk/hapus/(:any)'] = 'backend/ProdukController/hapus/$1';

	$route['admin/transaksi'] = 'backend/TransaksiController';
	$route['admin/transaksi/lihat/(:any)'] = 'backend/TransaksiController/lihat/$1';

	$route['admin/banner'] = 'backend/BannerController';
	$route['admin/banner/tambah'] = 'backend/BannerController/tambah';
	$route['admin/banner/update/(:any)'] = 'backend/BannerController/update/$1';
	$route['admin/banner/hapus/(:any)'] = 'backend/BannerController/hapus/$1';

	$route['admin/pembayaran/konfirmasi/(:any)'] = 'backend/TransaksiController/konfirmasi/$1';
	$route['admin/pembayaran/tolak/(:any)'] = 'backend/TransaksiController/tolak/$1';

	//frontend
			$route['profil'] = 'frontend/ProfilController/index';


			//produk
			$route['produk/(:any)'] = 'frontend/ProductController/produk/$1';
			$route['produk/kategori/(:any)'] = 'frontend/ProductController/produk_by_kategori/$1';

			//keranjang
			$route['keranjang/(:any)'] = 'frontend/KeranjangController/index/$1';
			$route['pembayaran/(:any)'] = 'frontend/KeranjangController/pembayaran/$1';
			$route['cek-pembayaran'] = 'frontend/KeranjangController/cek_pembayaran';
			$route['checkout/(:any)'] = 'frontend/KeranjangController/checkout/$1';
			$route['keranjang/hapus/(:any)/(:any)'] = 'frontend/KeranjangController/hapus/$1/$2';


			//ajax
//	$route['ajax/add-keranjang/(:any)/(:any)/(:any)'] = 'AjaxController/add_keranjang/$1/$2/$3';
	$route['ajax/add-keranjang'] = 'AjaxController/add_keranjang';

  	
  	//default

  	$route['login'] = 'AuthController/index';
  	$route['register'] = 'AuthController/register';
  	$route['logout'] = 'AuthController/logout';
  	$route['auth/login'] = 'AuthController/login';
  	$route['default_controller'] = 'Welcome';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;


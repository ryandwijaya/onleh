<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php
$count_keranjang = $this->KeranjangModel->lihat_keranjang($this->session->userdata('session_id'));
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nadhira Napoleon</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" href="<?= base_url() ?>assets/frontend/img/favicon.ico">

	<!--=============================================
	=            CSS  files       =
	=============================================-->

	<!-- Vendor CSS -->
	<link href="<?= base_url() ?>assets/frontend/css/vendors.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/animate.min.css" rel="stylesheet">
	<!-- Main CSS -->
	<link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" rel="stylesheet">


</head>

<body>
<!--====================  header area ====================-->
<div class="header-area header-sticky">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--=======  header wrapper  =======-->
				<div class="header-wrapper d-none d-lg-flex">
					<!-- logo -->
					<div class="logo">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url() ?>assets/frontend/img/logo.jpg" style="width: 25px;height: 25px;"
								 class="img-fluid ml-2" alt="" width="80%"> <span class="font-weight-bold">NADHIRA NAPOLEON</span>
						</a>
					</div>
					<!-- menu wrapper -->
					<div class="navigation-menu-wrapper">
						<nav>
							<ul>
								<li><a href="<?= base_url() ?>">HOME</a></li>


								<li class="menu-item-has-children"><a href="#">KATEGORI PRODUK</a>
									<ul class="sub-menu" style="width: 200px;">
										<?php foreach ($kategori as $ktg): ?>
											<li>
												<a href="<?= base_url() ?>produk/kategori/<?= $ktg['kategori_id'] ?>"><?= $ktg['kategori_nama'] ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
								<li><a href="<?= base_url() ?>cek-pembayaran">CEK PEMBAYARAN</a></li>
								<li><a href="<?= base_url() ?>profil">PROFIL</a></li>
								<?php if ($this->session->userdata('session_level') == 'pelanggan'): ?>
									<li><a href="<?= base_url() ?>pesanan">ACCOUNT</a></li>
								<?php endif; ?>
							</ul>
						</nav>
					</div>
					<!-- header icon -->
					<div class="header-icon-wrapper">
						<ul class="icon-list">
							<li>
								<a href="<?= base_url() ?>keranjang/<?= $this->session->userdata('session_id') ?>">
									<i class="ion-ios-cart"></i>
									<span style="font-size: 9px;" class="badge badge-danger animate__animated animate__flash
										 animate__slow animate__infinite infinite"><?= count($count_keranjang) ?></span>
								</a>
							</li>

							<li>
								<div class="header-settings-icon">
									<a href="javascript:void(0)" class="header-settings-trigger"
									   id="header-settings-trigger">
										<div class="setting-button">
											<span></span>
											<span></span>
											<span></span>
										</div>
									</a>

									<!-- settings menu -->
									<div class="settings-menu-wrapper" id="settings-menu-wrapper">
										<div class="single-settings-block">
											<h4 class="title"><?= $this->session->userdata('session_nama') ?> </h4>
											<ul>
												<?php if ($this->session->userdata('session_id') == null): ?>
													<li><a href="<?= base_url() ?>register">Register</a></li>
													<li><a href="<?= base_url() ?>admin">Login</a></li>
												<?php else: ?>
													<li><a href="<?= base_url() ?>logout">Logout</a></li>
												<?php endif; ?>
											</ul>
										</div>

									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!--=======  End of header wrapper  =======-->


				<!--=======  End of mobile navigation area  =======-->

			</div>
		</div>
	</div>
</div>
<!--====================  End of header area  ====================-->

<div class="page-content-area">
	<div class="container mt-5">
		<?php if ($this->session->flashdata('alert') == 'berhasil_keranjang') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success hide-it">
						<span>SUKSES!! Berhasil memasukkan ke keranjang.</span>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if ($this->session->flashdata('alert') == 'berhasil_register') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success hide-it">
						<span>SUKSES!! Berhasil mendaftar akun.</span>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('alert') == 'berhasil_ubah') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-success hide-it">
						<span>SUKSES!! Berhasil Mengubah password.</span>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('alert') == 'gagal_register') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger hide-it">
						<span>GAGAL!! Gagal mendaftar akun, silahkan coba lagi.</span>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('alert') == 'password_beda') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger hide-it">
						<span>GAGAL!! Password yang anda masukkan tidak sama, Silahkan coba lagi.</span>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('alert') == 'gagal_update') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger hide-it">
						<span>GAGAL!! Tidak berhasil melakukan aksi.</span>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('alert') == 'email_terdaftar') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger hide-it">
						<span>GAGAL!! Email yang anda masukkan sudah terdaftar sebelumnya, Silahkan coba lagi.</span>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('alert') == 'stok_melebihi') { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger hide-it">
						<span>GAGAL!! Pesanan kamu melebihi stok yang ada.</span>
					</div>
				</div>
			</div>
		<?php } ?>
            

            
            
   

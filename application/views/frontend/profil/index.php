<div class="row">

	<div class="col-lg-12">
		<div class="about-top-content-wrapper">
			<div class="row row-30">
				<!-- About Image -->
				<div class="col-lg-6">
					<div class="about-image">
						<img src="<?= base_url() ?>assets/upload/images/profil/<?= $profil['profil_gambar'] ?>" class="img-fluid" alt="">
					</div>
				</div>

				<!-- About Content -->
				<div class="about-content col-lg-6">
					<div class="row">
						<div class="col-12">
							<h1 class="text-uppercase"><?= $profil['profil_nama'] ?></span></h1>
							<h3 class="text-uppercase">Alamat : <?= $profil['profil_alamat'] ?></span></h3>
							<h4 class="text-uppercase">TGL Berdiri : <?= $profil['profil_tgl_berdiri'] ?></span></h4>
							<p class="mb-3"><?= $profil['profil_deskripsi'] ?></p>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>


</div>

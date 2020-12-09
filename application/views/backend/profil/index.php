<div class="row">
	<div class="col-md-5">
		<!-- Card -->
		<div class="card">
			<!-- Card Body -->
			<div class="card-body">
				<form action="<?= base_url() ?>admin/profil" method="post" enctype="multipart/form-data">
				<!-- Card Title-->
				<h2 class="card-title">Foto Profil</h2>
				<!-- Card Title-->
					<div class="row">
						<div class="col-12">
							<img src="<?= base_url() ?>assets/upload/images/profil/<?= $profil['profil_gambar'] ?>" alt="gambar tidak ditemukan" width="100%">
						</div>
					</div>
				<hr>
				<div class="row">

					<div class="col-12">
						<button type="button" class="btn btn-outline-primary btn-xs mb-3" onclick="showInput()">Ganti Foto ?</button>
							<input type="file" class="form-control"  name="foto">

					</div>
				</div>
				<!-- /card text-->
			</div>
			<!-- /card body -->
		</div>
		<!-- /card -->
	</div>
	<div class="col-md-7">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title">Nama Toko</h2>
				<input type="text" name="nama" placeholder="Nama toko" value="<?= $profil['profil_nama'] ?>" class="form-control">
				<h2 class="card-title">Tanggal Berdiri</h2>
				<input type="date" name="tgl_berdiri" placeholder="Tanggal" value="<?= $profil['profil_tgl_berdiri'] ?>" class="form-control">
				<h2 class="card-title">Alamat</h2>
				<textarea name="alamat" class="form-control" placeholder="Alamat toko"><?= $profil['profil_alamat'] ?></textarea>
				<h2 class="card-title">Deskripsi</h2>
				<textarea name="deskripsi" rows="5" class="form-control" placeholder="Deskripsi toko"><?= $profil['profil_deskripsi'] ?></textarea>
			</div>
			<div class="card-footer">
				<button type="submit" name="simpan" class="btn btn-success float-right">Simpan Perubahan</button>
			</div>
			</form>
		</div>
	</div>
</div>

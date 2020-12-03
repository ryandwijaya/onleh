<?php if ($transaksi != NULL) :?>
<div class="row">
	<div class="col-12">
		<div class="alert alert-primary" role="alert">
			<ul>
				<li><h4>KODE PEMBAYARAN ANDA ADALAH : <span class="text-info"><?= $kode ?></span></h4></li>
				<li><h4>SILAHKAN MELAKUKAN PEMBAYARAN DENGAN MENTRANSFER KEREKENING DIBAWAH INI</h4></li>
				<li><h5>NO REK : 123456789</h5></li>
				<li><h5>JUMLAH :  <span class="text-success font-weight-bold">Rp. <?= nominal($transaksi['transaksi_total']) ?> ,-</span></h5></li>
				<li><h5>DAN UPLOAD BUKTI PEMBAYARAN KAMU DIBAWAH INI</h5></li>
			</ul>
		</div>
	</div>
</div>
<div class="row justify-content-center ">
	<div class="col-7 bg-light text-center p-3">
		<form action="<?= base_url() ?>pembayaran/<?= $kode ?>" method="post" enctype="multipart/form-data">
		<h4>UPLOAD BUKTI PEMBAYARAN</h4>
		<input type="hidden" name="kode" value="<?= $kode ?>">
		<input type="file" name="foto" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="jpg png PNG JPG jpeg JPEG" required>
		<button class="btn btn-primary form-control mt-2" type="submit" name="upload">UPLOAD</button>
		</form>
	</div>
</div>
<?php else: ?>

	<div class="row justify-content-center mt-5 mb-5 ">
		<div class="col-7 text-center p-3 mb-5 mt-5 bg-warning">
			<form action="<?= base_url() ?>cek-pembayaran" method="post" class="mb-5">
				<h4>KODE YANG ANDA MASUKKAN TIDAK DITEMUKAN</h4>
				<h5>MOHON PERIKSA KEMBALI KODE PEMBAYARAN ANDA</h5>
			</form>
		</div>
	</div>
<?php endif; ?>

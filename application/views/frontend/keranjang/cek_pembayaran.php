
<div class="row justify-content-center mt-5 mb-5">
	<div class="col-7 bg-light text-center p-3 mb-5 mt-5">
		<form action="<?= base_url() ?>cek-pembayaran" method="post" class="mb-5">
			<h4>CEK STATUS PEMBAYARAN</h4>
			<hr>
			<div class="row">
				<div class="col-9"><input type="text" name="kode" placeholder="MASUKKAN KODE PEMBAYARAN" required class="form-control"></div>
				<div class="col-3"><button type="submit" name="check" class="form-control btn btn-success" >CHECK</button></div>
			</div>
		</form>
	</div>
</div>

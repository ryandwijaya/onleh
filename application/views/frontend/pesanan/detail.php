<div class="row">
	<div class="col-md-12">
		<div class="card">

			<!-- Card Body -->


			<div class="card-body"><!-- Tables -->


				<span class="d-block text-light-gray ">Nama Pembeli</span>
				<a href="javascript:void(0)"><?= $transaksi[0]['user_nama'] ?></a>

				<hr>
				<span class="d-block text-light-gray ">Alamat Pengiriman</span>
				<a href="javascript:void(0)"><?= $transaksi[0]['transaksi_alamat_pengiriman'] ?></a>

				<hr>

				<span class="d-block text-light-gray ">Nomor HP Penerima</span>
				<a href="javascript:void(0)"><?= $transaksi[0]['user_hp'] ?></a>

				<hr>
				<span class="d-block text-light-gray ">Status Pembayaran</span>

				<?php if ($transaksi[0]['transaksi_bukti_pembayaran'] == null) { ?>
					<a href="javascript:void(0)" class="badge badge-warning">belum dibayar</a>
				<?php } else { ?>
					<a title="lihat" target="_blank"
					   href="<?= base_url() ?>assets/upload/images/bukti_pembayaran/<?= $transaksi[0]['transaksi_bukti_pembayaran'] ?>"
					   class="badge badge-success mr-3">sudah diupload</a>| <span class="ml-3">	<?= $transaksi[0]['transaksi_tgl_upload'] ?></span>
				<?php } ?>


				<hr>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Transaksi</th>
							<th>Nama Produk</th>
							<th class="text-center">Harga Produk</th>
							<th class="text-center">Jumlah Beli</th>
							<th class="text-center">Total</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$total = 0;
						foreach ($transaksi as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['keranjang_date_created'] ?></td>
								<td><?= $value['produk_nama'] ?></td>
								<td class="text-center">Rp. <?= nominal($value['produk_harga']) ?> ,-</td>
								<td class="text-center"><?= $value['keranjang_jumlah_beli'] ?></td>
								<td class="text-center">Rp. <?= nominal($value['keranjang_total']) ?> ,-</td>
							</tr>
							<?php
							$no++;
							$total = $total + $value['keranjang_total'];
						endforeach;
						?>
						</tbody>
						<tfoot>
						<tr>
							<th colspan="5" class="text-center">TOTAL</th>
							<th class="text-center">Rp. <?= nominal($total) ?> ,-</th>
						</tr>
						</tfoot>
					</table>

				</div>
				<!-- /tables -->

			</div>
			<!-- /card body -->

		</div>
</div>

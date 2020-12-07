
<div class="dt-card">

	<!-- Card Body -->



	<div class="dt-card__body"><!-- Tables -->
			<!-- Media -->
		<div class="media mb-5">
			<i class="icon icon-mail icon-xl mr-5"></i>
			<!-- Media Body -->
			<div class="media-body">
				<span class="d-block text-light-gray f-12 mb-1">Nama Pembeli</span>
				<a href="javascript:void(0)"><?= $keranjang[0]['user_nama'] ?></a>
			</div>
			<!-- /media body -->
		</div>
		<div class="media mb-5">
			<i class="icon icon-mail icon-xl mr-5"></i>
			<!-- Media Body -->
			<div class="media-body">
				<span class="d-block text-light-gray f-12 mb-1">Alamat Pengiriman</span>
				<a href="javascript:void(0)"><?= $keranjang[0]['transaksi_alamat_pengiriman'] ?></a>
			</div>
			<!-- /media body -->
		</div>

		<div class="media mb-5">
			<i class="icon icon-mail icon-xl mr-5"></i>
			<!-- Media Body -->
			<div class="media-body">
				<span class="d-block text-light-gray f-12 mb-1">Nomor HP Penerima</span>
				<a href="javascript:void(0)"><?= $keranjang[0]['user_hp'] ?></a>
			</div>
			<!-- /media body -->
		</div>
		<div class="media mb-5">
			<i class="icon icon-mail icon-xl mr-5"></i>
			<!-- Media Body -->
			<div class="media-body">
				<span class="d-block text-light-gray f-12 mb-1">Status Pembayaran</span>

				<?php if ($keranjang[0]['transaksi_bukti_pembayaran'] == null){ ?>
				<a href="javascript:void(0)" class="badge badge-warning">belum dibayar</a>
				<?php }else{ ?>
					<a title="lihat" target="_blank" href="<?= base_url() ?>assets/upload/images/bukti_pembayaran/<?= $keranjang[0]['transaksi_bukti_pembayaran'] ?>" class="badge badge-success">sudah diupload</a>|<?= $keranjang[0]['transaksi_tgl_upload'] ?>
				<?php } ?>

			</div>
			<!-- /media body -->
		</div>

		<hr>
		<div class="table-responsive">
			<table  class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Transaksi</th>
					<th >Nama Produk</th>
					<th class="text-center">Harga Produk</th>
					<th class="text-center">Jumlah Beli</th>
					<th class="text-center">Total</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				$total = 0;
				foreach ($keranjang as $key=>$value):
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$value['keranjang_date_created']?></td>
						<td><?=$value['produk_nama']?></td>
						<td class="text-center">Rp. <?= nominal($value['produk_harga']) ?> ,-</td>
						<td class="text-center"><?=$value['keranjang_jumlah_beli']?></td>
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
						<th class="text-center">Rp. <?= nominal($total)  ?> ,-</th>
					</tr>
				</tfoot>
			</table>

		</div>
		<!-- /tables -->

	</div>
	<!-- /card body -->

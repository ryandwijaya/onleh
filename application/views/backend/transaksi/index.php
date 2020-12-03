
<div class="dt-card">

	<!-- Card Body -->
	<div class="dt-card__body"><!-- Tables -->
		<div class="table-responsive">

			<table id="data-table" class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Transaksi</th>
					<th class="text-center">Total Transaksi</th>
					<th class="text-center">Status Transaksi</th>
					<th class="text-center">Bukti Pembayaran</th>
					<th class="text-center"><i class="fa fa-cog animation-customizer"></i></th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				foreach ($transaksi as $key=>$value):
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$value['transaksi_date_created']?></td>
						<td class="text-center">Rp. <?= nominal($value['transaksi_total']) ?> ,-</td>
						<td class="text-center">
							<?php if($value['transaksi_bukti_pembayaran'] === null){ ?>
								<span class="badge badge-warning">menunggu pembayaran</span>
							<?php } else { ?>
								<span class="badge badge-success">telah dibayar</span>
							<?php } ?>
						</td>
						<td class="text-center">
							<?php if($value['transaksi_bukti_pembayaran'] === null){ ?>
								<span class="badge badge-warning">belum diupload</span>
							<?php } else { ?>
								<a title="Lihat" target="_blank" href="<?= base_url() ?>assets/upload/images/bukti_pembayaran/<?= $value['transaksi_bukti_pembayaran'] ?>"><img src="<?= base_url() ?>assets/upload/images/bukti_pembayaran/<?= $value['transaksi_bukti_pembayaran'] ?>" alt="gambar tidak ditemukan" width="90" height="90"></a>
							<?php } ?>
						</td>
						<td class="text-center">
							<?php if($this->session->userdata('session_level') == 'pelanggan'){ ?>
								<a href="<?= base_url() ?>admin/transaksi/lihat/<?= $value['transaksi_id'] ?>" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-html="true" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
							<?php } else { ?>


								<?php if ($value['transaksi_status_pembayaran'] =='menunggu'): ?>
								<a href="<?= base_url() ?>admin/pembayaran/konfirmasi/<?= $value['transaksi_id'] ?>" class="btn btn-sm btn-success">konfirmasi</a>
								<a href="<?= base_url() ?>admin/pembayaran/tolak/<?= $value['transaksi_id'] ?>" class="btn btn-sm btn-danger">tolak</a>
								<?php else: ?>
									<?php if ($value['transaksi_status_pembayaran'] =='dikonfirmasi'): ?>
										<span class="text-success"><?= $value['transaksi_status_pembayaran'] ?></span>
										<br>
										<a href="<?= base_url() ?>admin/transaksi/lihat/<?= $value['transaksi_id'] ?>" class="text-info" data-toggle="tooltip" data-html="true" title="" data-original-title="Lihat">Lihat</a>
									<?php else: ?>
										<span class="text-danger"><?= $value['transaksi_status_pembayaran'] ?></span>
									<?php endif; ?>
								<?php endif; ?>


							<?php } ?>
						</td>
					</tr>
					<?php
					$no++;
				endforeach;
				?>
				</tbody>
			</table>

		</div>
		<!-- /tables -->

	</div>
	<!-- /card body -->

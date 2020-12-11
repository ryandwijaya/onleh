<div class="dt-card">

	<!-- Card Body -->
	<div class="dt-card__body">

		<div>
			<form action="<?= base_url() ?>admin/laporan" method="post">
				<div class="row mb-3">
					<div class="col-4">
						<label>Dari Tanggal</label>
						<input type="date" name="date_start" value="<?= $start ?>" class="form-control">
					</div>
					<div class="col-4">
						<label>Sampai Tanggal</label>
					 	<input type="date" name="date_end" value="<?= $end ?>" class="form-control">
					</div>
					<div class="col-2">
						<label> </label>
						<button name="lihat" type="submit" class="btn btn-info form-control"> Lihat</button>
					</div>
				</div>
			</form>

			<hr>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th width="1%">No</th>
					<th width="20%">Nama Pelanggan</th>
					<th width="20%">Tanggal Transaksi</th>
					<th width="20%" class="text-center">Total Transaksi</th>
					<th width="20%" class="text-center">Status Transaksi</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($laporan as $i => $lpr): ?>
					<tr>
						<td><?= $i + 1; ?></td>
						<td><?= $lpr['user_nama'] ?></td>
						<td><?= $lpr['transaksi_date_created'] ?></td>
						<td class="text-center">Rp. <?= nominal($lpr['transaksi_total']) ?> ,-</td>
						<td class="text-center"><?= $lpr['transaksi_status_pembayaran'] ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
		<!-- /tables -->

	</div>
	<!-- /card body -->

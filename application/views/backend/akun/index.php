<div class="dt-card">

	<!-- Card Body -->
	<div class="dt-card__body">
		<button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> User Baru</button>
		<hr>
		<!-- Tables -->
		<div class="table-responsive">

			<table id="data-table" class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th class="text-center">Email</th>
					<th class="text-center">Level</th>
					<th class="text-center"><i class="fa fa-cog animation-customizer"></i></th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				foreach ($akun as $key=>$value):
					?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $value['user_nama'] ?></td>
						<td class="text-center"><?= $value['user_email'] ?></td>
						<td class="text-center"><?= $value['user_level'] ?></td>
						<td class="text-center"><a onclick="return confirm('Yakin ingin menghapus?')" href="<?= base_url() ?>admin/akun/hapus/<?= $value['user_id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>

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

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>admin/akun/tambah/" method="post">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>No Hp</label>
							<input type="number" name="hp" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Pilih Level</label>
							<select name="level" class="form-control" required>
								<option disabled selected>- Pilih level -</option>
								<option value="admin">Admin</option>
								<option value="owner">Owner</option>
							</select>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>

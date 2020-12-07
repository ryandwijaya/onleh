
<div class="dt-card">

    <!-- Card Body -->
    <div class="dt-card__body">

        <a href="<?=base_url('admin/produk/tambah')?>" class="btn btn-outline-primary btn-sm" style=""><i class="fa fa-plus"></i> Tambah Produk</a>
		<button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Stok Produk</button>
		<hr>
		<!-- Tables -->
        <div class="table-responsive">

            <table id="data-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
					<th class="text-center">Foto Produk</th>
					<th>Kategori</th>
                    <th>Harga</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center"><i class="fa fa-cog animation-customizer"></i></th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no = 1;
				foreach ($produk as $key=>$value):
				?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$value['produk_nama']?></td>
                    <td class="text-center"><img src="<?= base_url() ?>/assets/upload/images/produk/<?=$value['produk_foto']?>" alt="Gambar tidak ditemukan" style="width: 120px;height:60px;"></td>
					<td><?=$value['kategori_nama']?></td>
					<td>Rp. <?=nominal($value['produk_harga'])?></td>
					<td class="text-center"><?=$value['produk_stok']?></td>
					<td class="text-center">
                        <a href="<?=base_url('admin/produk/lihat/'.$value['produk_id'])?>" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-html="true" title data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                        <a href="<?=base_url('admin/produk/update/'.$value['produk_id'])?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-html="true" title data-original-title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="<?=base_url('admin/produk/hapus/'.$value['produk_id'])?>" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-html="true" title data-original-title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"><i class="fa fa-trash"></i></a>
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

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Stok Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>admin/produk/tambah-stok/" method="post">
						<div class="form-group">
							<label>Pilih Produk</label>
							<select name="produk_id" class="form-control" required>
								<option>- Pilih Produk -</option>
								<?php foreach ($produk as $item ): ?>
									<option value="<?= $item['produk_id'] ?>"> <?= $item['produk_nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Stok</label>
							<input type="number" name="stok" class="form-control" required>
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

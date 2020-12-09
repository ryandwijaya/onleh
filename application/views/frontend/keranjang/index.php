<div class="card">
	<div class="card-header">
		<h4 class="text-center">LIST KERANJANG</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12">
				<!--=======  page wrapper  =======-->
				<div class="page-wrapper">
					<div class="page-content-wrapper">
						<form action="<?= base_url() ?>checkout/<?= $id_user ?>" method="POST">
							<!--=======  cart table  =======-->

							<span class="cart-table table-responsive">
									<table class="table">
										<?php if ($keranjang != null): ?>
										<thead>
										<tr>
											<th class="pro-thumbnail">Gambar</th>
											<th class="pro-title">Nama Produk</th>
											<th class="pro-price">Harga</th>
											<th class="pro-quantity">Jumlah</th>
											<th class="pro-subtotal">Total</th>
											<th class="pro-remove">Aksi</th>
										</tr>
										</thead>
										<tbody>
										<?php $total = 0; foreach ($keranjang as $item): ?>
											<tr>
											<td class="pro-thumbnail"><img
														src="<?= base_url() ?>assets/upload/images/produk/<?= $item['produk_foto'] ?>"
														class="img-fluid" alt="Product"></td>
											<td class="pro-title"><?= $item['produk_nama'] ?></td>
											<td class="pro-price"><span>Rp. <?= nominal($item['produk_harga']) ?> ,-</span></td>
											<td class="pro-price">
												<span><?= $item['keranjang_jumlah_beli'] ?></span>
											</td>
											<td class="pro-subtotal"><span>Rp. <?= nominal($item['keranjang_total']) ?> ,-</span></td>
											<td class="pro-remove"><a
														href="<?= base_url() ?>keranjang/hapus/<?= $item['keranjang_id'] ?>/<?= $item['keranjang_id_user'] ?>"
														onclick="return confirm('Yakin ingin menghapus ?')"><i
															class="fa fa-trash-o"></i></a></td>
										</tr>
											<?php
											$total = $total + $item['keranjang_total'];
											endforeach; ?>
										<?php else: ?>
										<h6 class="text-center p-2">Keranjang Kosong</h6>
										<?php endif; ?>
										</tbody>
									</table>
					</div>

					<!--=======  End of cart table  =======-->


					<div class="row">

						<div class="col-lg-6 col-12">
							<!--=======  Calculate Shipping  =======-->

							<div class="calculate-shipping">
								<?php if ($keranjang != null): ?>

									<h4>Masukkan Alamat Pengiriman</h4>
								<textarea name="alamat" required class="form-control"
										  placeholder="Masukkan Alamat .."></textarea>
								<input type="hidden" name="total_bayar" value="<?= $total ?>">
								<?php endif; ?>

							</div>

							<!--=======  End of Calculate Shipping  =======-->

							<!--=======  Discount Coupon  =======-->


							<!--=======  End of Discount Coupon  =======-->

						</div>


						<div class="col-lg-6 col-12 d-flex">
							<!--=======  Cart summery  =======-->
							<?php if ($keranjang != null): ?>

							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h2>TOTAL BAYAR <span>Rp. <?= nominal($total) ?> ,-</span></h2>

								</div>
								<div class="cart-summary-button">
									<button class="checkout-btn" name="bayar" type="submit">Checkout</button>
								</div>
							</div>
							<?php endif; ?>


							<!--=======  End of Cart summery  =======-->

						</div>
						</form>
					</div>
				</div>
			</div>
			<!--=======  End of page wrapper  =======-->
		</div>
	</div>
</div>
</div>


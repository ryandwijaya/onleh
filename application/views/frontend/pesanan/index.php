<div class="page-content-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--=======  page wrapper  =======-->
				<div class="page-wrapper">
					<div class="page-content-wrapper">
						<div class="row">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12">
								<div class="myaccount-tab-menu nav" role="tablist">

									<a href="#orders" data-toggle="tab" class="active show"><i class="fa fa-cart-arrow-down"></i> Pesanan</a>

									<a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Akun</a>

									<a href="<?= base_url() ?>logout"><i class="fa fa-sign-out"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->

							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12">
								<div class="tab-content" id="myaccountContent">

									<!-- Single Tab Content Start -->
									<div class="tab-pane fade active show" id="orders" role="tabpanel">
										<div class="myaccount-content">
											<h3>Pesanan</h3>

											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
													<tr>
														<th>No</th>
														<th>Tanggal Transaksi</th>
														<th class="text-center">Kode Transaksi</th>
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
														<td class="text-center"><?=$value['transaksi_kode']?></td>
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
																<span class="text-danger">belum diupload</span>
																<br>
																<a href="<?= base_url() ?>pembayaran/<?=$value['transaksi_kode']?>" class="badge badge-warning"><i class="fa fa-money"></i> Bayar Sekarang!</a>
															<?php } else { ?>
																<a title="Lihat" target="_blank" class="badge badge-info" href="<?= base_url() ?>assets/upload/images/bukti_pembayaran/<?= $value['transaksi_bukti_pembayaran'] ?>"> Lihat</a>
															<?php } ?>
														</td>
														<td class="text-center"><a href="<?= base_url() ?>pesanan/detail/<?= $value['transaksi_id'] ?>" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-html="true" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a></td>
													</tr>
													<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->

									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Pengaturan Akun</h3>

											<div class="account-details-form">
												<form action="<?= base_url() ?>change-password" method="post">
													<div class="row">
														<input type="hidden" name="username" value="<?= $user['user_username'] ?>">
														<div class=" col-12">
															<input id="first-name" value="<?= $user['user_nama'] ?>" name="nama" placeholder="Nama Lengkap" required type="text">
														</div>

														<div class="col-12">
															<input id="display-name" value="<?= $user['user_email'] ?>" name="email" readonly placeholder="Email" type="text">
														</div>

														<div class="col-12 mb-2">
															<h4>Password change</h4>
														</div>

														<div class="col-12">
															<input id="current-pwd" class="form-password" placeholder="Current Password" name="old_password" type="password">
														</div>

														<div class="col-lg-6">
															<input id="new-pwd" placeholder="New Password" class="form-password" name="new_password" type="password">
														</div>

														<div class="col-lg-6">
															<input id="confirm-pwd" placeholder="Confirm Password" class="form-password" name="re_password" type="password">
														</div>

														<div class="col-12 mb-1 d-flex">
															<input type="checkbox" style="width: 30px;" class="form-checkbox"> <span>show password</span>
														</div>

														<div class="col-12">
															<button class="save-change-btn" type="submit" name="change">Save Changes</button>
														</div>

													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
				<!--=======  End of page wrapper  =======-->
			</div>
		</div>
	</div>
</div>

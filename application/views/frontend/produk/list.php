<div class="row">

	<div class="col-lg-3 order-2 order-lg-1 bg-light">
		<!--=======  page sidebar wrapper =======-->
		<div class="page-sidebar-wrapper">
			<!--=======  single sidebar widget  =======-->
			<div class="single-sidebar-widget p-3">

				<h4 class="single-sidebar-widget__title">Categories</h4>
				<ul class="single-sidebar-widget__category-list">
					<?php foreach ($kategori as $ktg): ?>
					<li class="border-bottom"><a href="<?= base_url() ?>produk/kategori/<?= $ktg['kategori_id'] ?>"
						<?php if ($this->uri->segment(3) == $ktg['kategori_id']): ?>
							class="active"
						<?php endif; ?>
						><?= $ktg['kategori_nama'] ?> </a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<!--=======  End of single sidebar widget  =======-->
		</div>
		<!--=======  End of page sidebar wrapper  =======-->
	</div>
	<div class="col-lg-9 order-1 order-lg-2">
		<!--=======  shop page content  =======-->
		<div class="shop-page-content">

			<div class="row shop-product-wrap list">
				<?php foreach($produk as $prd): ?>

				<div class="col-12 col-lg-4 col-md-4 col-sm-6">
					<!--=======  list view product  =======-->
					<div class="single-grid-product single-grid-product--list-view list-view-product">
						<div class="single-grid-product__image single-grid-product--list-view__image">

							<a href="<?= base_url() ?>produk/<?= $prd['produk_id'] ?>">
								<img src="<?= base_url() ?>assets/upload/images/produk/<?= $prd['produk_foto'] ?>" class="img-fluid" alt="">
								<img src="<?= base_url() ?>assets/upload/images/produk/<?= $prd['produk_foto'] ?>" class="img-fluid" alt="">
							</a>


						</div>
						<div class="single-grid-product__content single-grid-product--list-view__content">

							<div class="category"><a href="<?= base_url() ?>produk/<?= $prd['produk_id'] ?>"><?= $prd['kategori_nama'] ?></a></div>
							<h3 class="single-grid-product__title single-grid-product--list-view__title"><a
										href="<?= base_url() ?>produk/<?= $prd['produk_id'] ?>"><?= $prd['produk_nama'] ?></a></h3>

							<p class="single-grid-product__price single-grid-product--list-view__price"><span
										class="discounted-price">Rp. <?= nominal($prd['produk_harga']) ?> ,-</span></p>
							<p class="single-grid-product--list-view__product-short-desc"><?= $prd['produk_deskripsi'] ?></p>
						</div>
					</div>
					<!--=======  End of list view product  =======-->
				</div>

				<?php endforeach; ?>


			</div>
		</div>
	</div>
</div>

<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
	<!-- Login Form s-->
	<form action="<?= base_url() ?>auth/login" method="post">
		<?php if ($produk != null){ ?>
			<input type="hidden" name="produk" value="<?= $produk ?>">
		<?php }else{  ?>
			<input type="hidden">
		<?php } ?>
		<div class="login-form">
			<h4 class="login-title">Login</h4>

			<div class="row">
				<div class="col-md-12 col-12">
					<label>Email Address*</label>
					<input type="email" name="username" required placeholder="Masukkan Email">
				</div>
				<div class="col-12">
					<label>Password</label>
					<input type="password" name="password" required placeholder="Password">
				</div>

				<div class="col-md-12">
					Belum punya akun? <a href="<?= base_url() ?>register" class="forget-pass-link text-success"> DAFTAR?</a>
				</div>
				<div class="col-md-12">
					<button type="submit" name="login" class="register-button float-right">Login</button>
				</div>

			</div>
		</div>

	</form>
</div>

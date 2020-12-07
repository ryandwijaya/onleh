<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
		<form action="<?= base_url() ?>register" method="post">

			<div class="login-form">
				<h4 class="login-title">Register</h4>

				<div class="row">
					<div class="col-md-12 mb-20">
						<label>Username*</label>
						<input type="text" name="username" required placeholder="Masukkan Username">
					</div>
					<div class="col-md-12 col-12 mb-20">
						<label>Nama Lengkap</label>
						<input type="text" name="nama" required placeholder="Masukkan Nama Lengkap">
					</div>
					<div class="col-md-12 col-12 mb-20">
						<label>Nomor HP</label>
						<input type="number" name="hp" required placeholder="Masukkan Nomor Hp">
					</div>

					<div class="col-md-6 mb-20">
						<label>Password</label>
						<input type="password" name="password" required placeholder="Masukkan Password">
					</div>
					<div class="col-md-6 mb-20">
						<label>Confirm Password</label>
						<input type="password" name="repassword" required placeholder="Confirm Password">
					</div>
					<div class="col-12">
						<button class="register-button mt-0 float-right" type="submit" name="daftar">Register</button>
					</div>
				</div>
			</div>

		</form>
	</div>
</div>

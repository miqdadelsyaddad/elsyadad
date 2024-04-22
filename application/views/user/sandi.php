<br><Br>
<main id="main">
	<section id="contact" class="contact section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2><?php echo $title; ?></h2>
				<p><?php echo $title; ?></p>
			</div>

			<div class="row">

				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<form action="" method="post">
								<div class="row">
									<div class="col-md-12 form-group">
										<label class="mb-2">Password Lama</label>
										<input type="password" name="sandi" class="form-control" placeholder="Konfirmasi password lama">
										<small class="text-danger"><?php echo form_error('sandi'); ?></small>
									</div>
								</div>
								<div class="form-group mt-3">
									<label class="mb-2">Password Baru</label>
									<input type="password" name="sandi2" class="form-control" placeholder="Password baru">
									<small class="text-danger"><?php echo form_error('sandi2'); ?></small>
								</div>
								<div class="form-group mt-3">
									<label class="mb-2">Konfirmasi Password Baru</label>
									<input type="password" name="sandi1" class="form-control" placeholder="Konfirmasi password baru">
									<small class="text-danger"><?php echo form_error('sandi1'); ?></small>
								</div>
								<br>
								<div class="text-center"><button type="submit" class="btn btn-primary">Simpan</button></div>
							</form>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>
</main>
<br><Br>
<main id="main">
	<section id="contact" class="contact section-bg">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>Login User</h2>
				<p>Login User</p>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<form action="<?php echo base_url('home/login'); ?>" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="row">
									<div class="col-md-12 form-group">
										<label class="mb-2">Username</label>
										<input type="text" name="username" class="form-control mb-2" required><small class="text-danger"><?php echo form_error('username'); ?></small>
									</div>
									<div class="col-md-12 form-group mt-3 mt-md-0">
										<label class="mb-2">Password</label>
										<input class="form-control" id="password" class="block mt-1 w-full" type="password" name="password" value="" autocomplete="off" required />
									</div>
								</div>
								<br>
								<div class="text-center"><button type="submit" class="btn btn-primary" id="acc_Login">Login</button></div>
								<br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
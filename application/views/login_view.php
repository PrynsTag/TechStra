<?php if ($this->session->tempdata('form_error')) : ?>
	<div class="alert alert-danger">
		<p><?= $this->session->tempdata('form_error') ?></p>
	</div>
<?php endif; ?>

<div class="container-fluid h-100">
	<div class="row h-100">
		<div class="col-sm-5 home-left-container">
			<div class="nav-container row">
				<div class="col d-flex justify-content-start align-items-center">
					<img class="home-navicon rounded-circle"
							 src="<?= base_url("assets/images/icon/" . $nav_icon) ?>"
							 alt="website-logo">
					<span class="nav-title ps-3 fw-bolder">TechStra</span>
				</div>
			</div>
			<div class="row p-5">
				<div class="col pt-5">
					<div class="title-container">
						<h1 class="login-title fw-bold">Login.</h1>
						<?php
						if ($this->session->tempdata("email_success")) {
							echo '<div class="alert alert-success">' . $this->session->tempdata("email_success") . '</div>';
						} else if ($this->session->tempdata("email_fail")) {
							echo '<div class="alert alert-danger">' . $this->session->tempdata("email_fail") . '</div>';
						}
						?>
						<p class="login-desc">Share your story using your account</p>
					</div>
					<?php echo form_open('login/user_login'); ?>
					<div class="form-group my-4">
						<i class="input-icon material-icons">person</i>
						<?= form_input($input_username); ?>
					</div>
					<div class="form-group my-4">
						<span class="input-icon material-icons">lock</span>
						<?= form_input($input_password); ?>
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-login w-100">Sign In</button>
					</div>
					<?php echo form_close(); ?>
					<div clas="row">
						<div class="col pt-5">
							<p class="dn-account">Don't have an account yet?
								<a class="a-register fw-bold" href="<?= site_url("register/register_user") ?>">Register</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row pt-5">
				<p class="text-center footer-title">&copy; 2021 TechStra. All Rights Reserved.</p>
			</div>
		</div>
		<div class="col-sm-7 home-image home-right-container">
			<div class="row">
				<div class="col-12 p-5">
					<p class="home-desc mb-0">Share your story</p>
					<h1 class="login-image-title mb-0">Adventure</h1>
				</div>
			</div>
		</div>
	</div>
</div>

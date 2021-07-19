<div class="container-fluid">
	<div class="row">
		<div class="col-sm-5 home-left-container">
			<div class="nav-container row p-1">
				<div class="col d-flex justify-content-start align-items-center pb-2">
					<img class="home-navicon rounded-circle" src="<?= base_url("assets/images/icon/" . $nav_icon) ?>"
							 alt="website-logo">
					<span class="nav-title ps-3 fw-bolder">TechStra</span>
				</div>
			</div>
			<div class="row p-5">
				<div class="col">
					<div class="title-container">
						<h1 class="login-title fw-bold">Create Account.</h1>
						<?php
						if ($this->session->tempdata("register_message")) {
							echo '<div class="alert alert-success">' . $this->session->tempdata("register_message") . '</div>';
						}
						?>
						<p class="login-desc">Share your story using your login credentials</p>
					</div>
					<?php echo form_open("register/validation"); ?>
					<div class="form-group my-4">
						<span class="input-icon material-icons">badge</span>
						<input class="form-control input" id="first_name" name="firstname" placeholder="First Name" type="text">
					</div>

					<div class="form-group my-4">
						<span class="input-icon material-icons">badge</span>
						<input class="form-control input" id="last_name" name="lastname" placeholder="Last Name" type="text">
					</div>

					<div class="form-group my-4">
						<span class="input-icon material-icons">email</span>
						<input class="form-control input" id="email-address" name="email" placeholder="Email Address" type="email">
					</div>

					<div class="form-group my-4">
						<span class="input-icon material-icons">account_circle</span>
						<input class="form-control input" id="user-name" name="username" placeholder="Username" type="text">
					</div>

					<div class="form-group my-4">
						<span class="input-icon material-icons">lock</span>
						<input class="form-control input" id="pass-word" name="password" placeholder="Password" type="password">
					</div>

					<div class="form-group my-4">
						<span class="input-icon material-icons">lock</span>
						<input class="form-control input" id="confirm-password" name="confirm_password"
									 placeholder="Confirm Password" type="password">
					</div>

					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-login w-100">Sign Up</button>
					</div>
					<?php echo form_close(); ?>
					<div class="row">
						<div class="col pt-5">
							<p class="dn-account">Already have an account?
								<a class="a-register fw-bold" href="login">Sign in</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row pt-4">
				<p class="text-center footer-title">&copy; 2021 TechStra. All Rights Reserved.</p>
			</div>
		</div>
		<div class="col-sm-7 register-image home-right-container">
			<div class="row">
				<div class="col-12 p-5">
					<p class="home-desc mb-0 text-primary">Share your story</p>
					<h1 class="login-image-title mb-0 text-primary">Adventure</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<main class="form-signin text-center">
	<?= form_open_multipart("register/validation", array('method' => 'post')) ?>
	<img class="mb-4 align-center" src="<?= base_url("assets/images/astra-tech.jpg") ?>" alt="Astratech" width="72" height="57">
	<h1 class="h3 mb-3 fw-normal signup-title">Create Account</h1>
	<p class="p-eaccount">Already have an account? <a class="a-login" href="login">Login</a></p>
	<?php
	if ($this->session->tempdata("register_message")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("register_message") . '</div>';
	}
	?>

	<div class="form-floating mb-3">
		<input class="form-control" id="floatingInput" name="firstname" placeholder="Juan" type="text">
		<label for="floatingInput">First Name</label>
	</div>

	<div class="form-floating mb-3">
		<input class="form-control" id="floatingInput" name="lastname" placeholder="Dela Cruz" type="text">
		<label for="floatingInput">Last Name</label>
	</div>

	<div class="form-floating mb-3">
		<input class="form-control" id="floatingInput" name="email" placeholder="juan_delacruz@gmail.com" type="email">
		<label for="floatingInput">Email Address</label>
	</div>

	<div class="form-floating mb-3">
		<input class="form-control" id="floatingInput" name="username" placeholder="JuanDelaCruz" type="text">
		<label for="floatingInput">Username</label>
	</div>

	<div class="form-floating">
		<input class="form-control" id="floatingPassword" name="password" placeholder="Password" type="password">
		<label for="floatingPassword">Password</label>
	</div>

	<div class="form-floating">
		<input class="form-control" id="floatingPassword" name="confirm_password" placeholder="Confirm Password" type="password">
		<label for="floatingPassword">Confirm Password</label>
	</div>

	<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
	<p class="mt-5 mb-3 text-muted">&copy; 2021 TechStra. All Rights Reserved.</p>
	<?= form_close() ?>
</main>
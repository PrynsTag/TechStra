<main class="form-signin text-center">
	<?= form_open_multipart("register/validation") ?>
	<img class="mb-4 align-center" src="<?= base_url("assets/images/astra-tech.jpg") ?>" alt="Astratech" width="72"
			 height="57">
	<h1 class="h3 mb-3 fw-normal">Please sign up</h1>

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
		<input class="form-control" id="floatingPassword" name="confirm_password" placeholder="Confirm Password"
					 type="password">
		<label for="floatingPassword">Confirm Password</label>
	</div>

	<div class="checkbox mb-3">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
	</div>
	<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
	<p class="mt-5 mb-3 text-muted">Astratech &copy; 2017–2021</p>
	<?= form_close() ?>
</main>

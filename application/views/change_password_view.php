<main class="form-signin text-center">
	<?= form_open_multipart("profile/change_password") ?>
	<img class="mb-4 align-center" src="<?= base_url("assets/images/user_profile/$userinfo_image") ?>" alt="User Profile" width="72"
			 height="57">
	<h1 class="h3 mb-3 fw-normal"><?= $header_title ?></h1>

	<?php
	if ($this->session->tempdata("change_success")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("change_success") . '</div>';
	} else if ($this->session->tempdata("change_error")) {
		echo '<div class="alert alert-danger">' . $this->session->tempdata("change_error") . '</div>';
	}
	?>

	<div class="form-floating mb-3">
		<label for="floatingInput">Current Password</label>
		<input class="form-control" id="floatingInput" name="curr-pass" type="password">
		<small class="text-danger w-100"><?= form_error("curr-pass") ?></small>
	</div>

	<div class="form-floating mb-3">
		<label for="floatingInput">New Password</label>
		<input class="form-control" id="floatingInput" name="new-pass" type="password">
		<small class="text-danger w-100"><?= form_error("new-pass") ?></small>
	</div>

	<div class="form-floating mb-3">
		<label for="floatingInput">New Password</label>
		<input class="form-control" id="floatingInput" name="con-pass" type="password">
		<small class="text-danger w-100"><?= form_error("con-pass") ?></small>
	</div>

	<button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
	<a href="<?= base_url("profile/user") ?>" class="w-100 btn btn-lg btn-secondary" type="button">Back</a>
	<?= form_close() ?>
</main>

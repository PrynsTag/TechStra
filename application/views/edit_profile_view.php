<main class="form-signin text-center">
	<?= form_open_multipart("profile/edit_profile") ?>
	<img class="mb-4 align-center" src="<?= base_url("assets/uploads/user_profile/$userinfo_image") ?>" alt="User Profile" width="72"
			 height="57">
	<h1 class="h3 mb-3 fw-normal"><?= $header_title ?></h1>

	<?php
	if ($this->session->tempdata("profile_success")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("profile_success") . '</div>';
	} else if ($this->session->tempdata("profile_error")) {
		echo '<div class="alert alert-danger">' . $this->session->tempdata("profile_error") . '</div>';
	}
	?>

	<div class="form-floating mb-3">
		<input class="form-control" id="floatingInput" name="firstname"
					 value="<?= set_value("firstname", $userinfo_firstname) ?>" type="text">
		<small class="text-danger w-100"><?= form_error("firstname") ?></small>
	</div>

	<div class="form-floating mb-3">
		<input class="form-control" id="floatingInput" name="lastname"
					 value="<?= set_value("lastname", $userinfo_lastname) ?>" type="text">
		<small class="text-danger w-100"><?= form_error("lastname") ?></small>
	</div>

		<div class="form-floating mb-3">
			<textarea class="form-control" id="floatingInput" name="bio"><?= $userinfo_bio ?></textarea>
			<small class="text-danger w-100"><?= form_error("bio") ?></small>
		</div>

	<div class="mb-3">
		<label for="formFile" class="form-label">Choose your profile picture</label>
		<input class="form-control" id="formFile" name="image" type="file">
		<small class="text-danger w-100"><?= form_error("image") ?></small>
	</div>

	<button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
	<a href="<?= base_url("profile/user") ?>" class="w-100 btn btn-lg btn-secondary" type="button">Back</a>
	<?= form_close() ?>
</main>

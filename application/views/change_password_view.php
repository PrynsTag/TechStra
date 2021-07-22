<div class="container-fluid post-container">
	<h1 class="post-title">Edit Password</h1>
</div>
<div class="addpost_container">
	<?= form_open_multipart("profile/change_password") ?>
	<div class="image d-flex justify-content-center">
		<img src='<?php
		if (isset($userinfo_image)) {
			echo base_url("assets/uploads/user_profile/" . $userinfo_image);
		} else {
			echo base_url("assets/uploads/user_profile/default-image.png");
		}
		?>' class="rounded-circle" width="96" height="86" alt="User-Profile">
	</div>

<?php
	if ($this->session->tempdata("change_success")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("change_success") . '</div>';
	} else if ($this->session->tempdata("change_error")) {
		echo '<div class="alert alert-danger">' . $this->session->tempdata("change_error") . '</div>';
	}
	?>

	<div class="input-group my-4">
		<input class="form-control" id="curr-pass" name="curr-pass" type="password" placeholder="Current Password">
		<small class="text-danger w-100"><?= form_error("curr-pass") ?></small>
	</div>

	<div class="input-group my-4">
		<input class="form-control" id="new-pass" name="new-pass" type="password" placeholder="New Password">
		<small class="text-danger w-100"><?= form_error("new-pass") ?></small>
	</div>

	<div class="input-group my-4">
		<input class="form-control" id="con-pass" name="con-pass" type="password" placeholder="Confirm Password">
		<small class="text-danger w-100"><?= form_error("con-pass") ?></small>
	</div>

	<div class="d-flex flex-column justify-content-end">
		<button type="submit" class="btn btn-login w-100 mb-3">Submit</button>
		<a class="btn-back text-center" href="<?= site_url("profile/user") ?>">Back</a>
	</div>

	<?php echo form_close(); ?>
</div>

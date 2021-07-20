<div class="container-fluid post-container">
	<h1 class="post-title">Change Password</h1>
</div>

<!--Alert Success -->
<?php if ($this->session->tempdata("alert_success")) : ?>
	<div class="alert alert-success">
		<p><?= $this->session->tempdata("alert_success") ?></p>
	</div>
<?php endif; ?>

<!-- Alert Error -->
<?php if ($this->session->tempdata("alert_error")) : ?>
	<div class="alert alert-danger">
		<p><?= $this->session->tempdata("alert_error") ?></p>
	</div>
<?php endif; ?>

<div class="addpost_container">
	<?= form_open_multipart("profile/password") ?>
	<div class="image d-flex justify-content-center">
		<img src="<?= $user_image == NULL || $user_image == '' ? base_url('assets/uploads/userprofile/default-image.png') : base_url('assets/uploads/userprofile/' . $user_image) ?>" class="rounded-circle" width="96" alt="User-Profile">
	</div>

	<div class="input-group my-4">
		<?= form_input($input_current); ?>
		<small class="text-danger w-100"><?= form_error("curr-pass") ?></small>
	</div>

	<div class="input-group my-4">
		<?= form_input($input_new); ?>
		<small class="text-danger w-100"><?= form_error("new-pass") ?></small>
	</div>

	<div class="input-group my-4">
		<?= form_input($input_confirm); ?>
		<small class="text-danger w-100"><?= form_error("con-pass") ?></small>
	</div>

	<div class="d-flex flex-column justify-content-end">
		<button type="submit" class="btn btn-login w-100 mb-3 btn-changepassword">Change Password</button>
		<a class="btn-back text-center" href="<?= site_url("profile") ?>">Back</a>
	</div>

	<?php echo form_close(); ?>
</div>
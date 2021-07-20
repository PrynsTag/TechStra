<div class="container-fluid post-container">
	<h1 class="post-title">Edit Profile</h1>
</div>
<div class="addpost_container">

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

	<!-- Form -->
	<?= form_open_multipart("profile/edit") ?>
	<div class="image d-flex justify-content-center">
		<img src="<?= $user_image == NULL || $user_image == '' ? base_url('assets/uploads/userprofile/default-image.png') : base_url('assets/uploads/userprofile/' . $user_image) ?>" class="rounded-circle" width="96" alt="User-Profile">
	</div>
	<div class="input-group my-4">
		<?= form_input($input_firstname); ?>
		<small class="text-danger w-100"><?= form_error("firstname") ?></small>
	</div>

	<div class="input-group my-4">
		<?= form_input($input_lastname); ?>
		<small class="text-danger w-100"><?= form_error("lastname") ?></small>
	</div>

	<div class="input-group my-4">
		<?= form_textarea($input_bio); ?>
		<small class="text-danger w-100"><?= form_error("bio") ?></small>
	</div>

	<div class="input-group my-4">
		<?= form_upload($input_upload); ?>
		<small class="text-danger w-100"><?= form_error("image") ?></small>
	</div>

	<div class="d-flex flex-column justify-content-end">
		<button type="submit" class="btn btn-login w-100 mb-3">Update</button>
		<a class="btn-back text-center" href="<?= site_url("profile") ?>">Back</a>
	</div>

	<?php echo form_close(); ?>
</div>
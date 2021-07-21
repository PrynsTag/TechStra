<div class="container-fluid post-container">
	<h1 class="post-title">Edit Profile</h1>
</div>
<div class="addpost_container">
	<?= form_open_multipart("profile/edit_profile") ?>
	<div class="image d-flex justify-content-center">
		<img src='<?php
		if (isset($image)) {
			echo base_url("assets/uploads/user_profile/$image");
		} else {
			echo "https://img.icons8.com/bubbles/100/000000/user.png";
		}
		?>' class="rounded-circle" width="96" alt="User-Profile">
	</div>

	<?php
	if ($this->session->tempdata("profile_success")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("profile_success") . '</div>';
	} else if ($this->session->tempdata("profile_error")) {
		echo '<div class="alert alert-danger">' . $this->session->tempdata("profile_error") . '</div>';
	}
	?>

	<div class="input-group my-4">
		<input class="form-control" id="first_name" name="firstname"
					 placeholder="First Name" type="text" value="<?= set_value("firstname", $userinfo_firstname) ?>">
		<small class="text-danger w-100"><?= form_error("firstname") ?></small>
	</div>

	<div class="input-group my-4">
		<input class="form-control" id="last_name" name="lastname"
					 value="<?= set_value("lastname", $userinfo_lastname) ?>" placeholder="Last Name" type="text">
		<small class="text-danger w-100"><?= form_error("lastname") ?></small>
	</div>

	<div class="input-group my-4">
		<textarea class="form-control" id="description" name="bio"
							placeholder="Tell Something About Yourself"><?= $userinfo_bio ?></textarea>
		<small class="text-danger w-100"><?= form_error("bio") ?></small>
	</div>

	<div class="input-group my-4">
		<input class="form-control" id="file-upload" name="image" type="file">
		<small class="text-danger w-100"><?= form_error("image") ?></small>
	</div>

	<div class="d-flex flex-column justify-content-end">
		<button type="submit" class="btn btn-login w-100 mb-3">Submit</button>
		<a class="btn-back text-center" href="<?= site_url("profile/user") ?>">Back</a>
	</div>

	<?php echo form_close(); ?>
</div>

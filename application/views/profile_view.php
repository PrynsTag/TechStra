<div class="contain mt-5 d-flex justify-content-center align-items-center flex-column profile-card-container">

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

	<div class="card profile-card">
		<div class="image d-flex justify-content-center">
			<img src='<?php
			if (isset($userinfo_image)) {
				echo base_url("assets/uploads/user_profile/" . $userinfo_image);
			} else {
				echo base_url("assets/uploads/user_profile/default-image.png");
			}
			?>' class="rounded-circle" width="96" height="86" alt="User-Profile">
		</div>
		<div class="ml-3 w-100">
			<h4 class="mb-0 mt-0 pt-3 pb-1 text-center"><?= $user_firstname . " " . $user_lastname ?></h4>
			<p class="text-center"><?= $userinfo_bio ?></p>
			<div class="d-flex text-white justify-content-center">
				<div class="d-flex flex-column stats rounded">
					<span class="articles">Posts</span>
					<span class="number1">38</span>
				</div>
				<div class="d-flex flex-column stats rounded">
					<span class="followers">Followers</span>
					<span class="number2">980</span>
				</div>
				<div class="d-flex flex-column stats rounded">
					<span class="rating">Rating</span>
					<span class="number3">8.9</span>
				</div>
			</div>
			<div class="settingButtons mt-4 text-center">
				<a class="text-white btn btn-primary card-btn-edit" href="<?= base_url("profile/edit_profile") ?>">Edit
					Profile</a>
				<a clas="btn btn-secondary" href="<?= base_url("profile/change_password") ?>">Change Password</a>
			</div>
		</div>
	</div>
</div>

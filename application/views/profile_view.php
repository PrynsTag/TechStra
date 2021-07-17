<?php
	if ($this->session->tempdata("profile_success")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("profile_success") . '</div>';
	} else if ($this->session->tempdata("profile_error")) {
		echo '<div class="alert alert-danger">' . $this->session->tempdata("profile_error") . '</div>';
	} else if ($this->session->tempdata("change_success")) {
		echo '<div class="alert alert-success">' . $this->session->tempdata("change_success") . '</div>';
	}
	?>
<div class="container mt-5 d-flex justify-content-center">
	<div class="card p-3">
		<div class="d-flex align-items-center">
			<div class="image"><img src="<?= base_url("assets/uploads/user_profile/$image") ?>" class="rounded-circle" width="96">
			</div>
			<div class="ml-3 w-100">
				<h4 class="mb-0 mt-0"><?= $firstname . " " . $lastname ?></h4>
				<p><?= $bio ?></p>
				<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
					<div class="d-flex flex-column"><span class="articles">Posts</span> <span class="number1">38</span></div>
					<div class="d-flex flex-column"><span class="followers">Followers</span> <span class="number2">980</span>
					</div>
					<div class="d-flex flex-column"><span class="rating">Rating</span> <span class="number3">8.9</span></div>
				</div>
				<div class="settingButtons mt-2 d-flex flex-row align-items-center">
					<a href="<?= base_url("profile/edit_profile") ?>">Edit Profile</a>
					<a href="<?= base_url("profile/change_password") ?>">Change Password</a>
				</div>
			</div>
		</div>
	</div>
</div>

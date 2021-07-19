<div class="container mt-5 d-flex justify-content-center text-center">
	<div class="card p-3 w-25">
		<?php
		if ($this->session->tempdata("profile_success")) {
			echo '<div class="alert alert-success">' . $this->session->tempdata("profile_success") . '</div>';
		} else if ($this->session->tempdata("profile_error")) {
			echo '<div class="alert alert-danger">' . $this->session->tempdata("profile_error") . '</div>';
		} else if ($this->session->tempdata("change_success")) {
			echo '<div class="alert alert-success">' . $this->session->tempdata("change_success") . '</div>';
		}
		?>
		<div class="image">
			<img src='<?php
			if ($image) {
				echo base_url("assets/uploads/user_profile/$image");
			} else {
				echo "https://img.icons8.com/bubbles/100/000000/user.png";
			}
			?>' class="rounded-circle" width="96" height="86" alt="User-Profile">
		</div>
		<div class="ml-3 w-100">
			<h4 class="mb-0 mt-0 pt-3 pb-3"><?= $firstname . " " . $lastname ?></h4>
			<p><?= $bio ?></p>
			<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
				<div class="d-flex flex-column"><span class="articles">Posts</span> <span class="number1">38</span></div>
				<div class="d-flex flex-column"><span class="followers">Followers</span> <span class="number2">980</span>
				</div>
				<div class="d-flex flex-column"><span class="rating">Rating</span> <span class="number3">8.9</span></div>
			</div>
			<div class="settingButtons mt-4 text-center">
				<button class="btn btn-primary">
					<a class="text-white" href="<?= base_url("profile/edit_profile") ?>">Edit Profile</a>
				</button>
				<button class="btn btn-secondary">
					<a href="<?= base_url("profile/change_password") ?>">Change Password</a>
				</button>
			</div>
		</div>
	</div>
</div>

<?php
$session_data = $this->session->userdata('user_info');
$userimage = $session_data['userimage'] == NULL || $session_data == '' ? 'default-image.png' : $session_data['userimage'];
?>

<nav class="navbar navbar-expand-lg head-nav">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url("home") ?>">TechStra</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<i class="material-icons menu-icon">menu</i>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?= $this->uri->segment(1) === 'home' ? 'active' : '' ?>" href="<?= base_url('home'); ?>">Home</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link <?= $this->uri->segment(1) === 'posts' ? 'active' : '' ?>" href="<?= base_url("posts") ?>">Posts</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link <?= $this->uri->segment(1) === 'posts' ? 'active' : '' ?>" href="<?= base_url("about") ?>">About</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<img class="rounded-circle" src="<?= base_url("assets/uploads/user_profile/" . $userimage) ?>" alt="Profile-Image" height="42" width="42">
					</a>
					<div class="dropdown-menu" style="min-width: inherit">
						<a class="dropdown-item" href="<?= base_url("profile/user") ?>">Profile</a>
						<a class="dropdown-item" href="#">Setting</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url("logout") ?>">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

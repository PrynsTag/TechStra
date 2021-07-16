<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
						aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link active" href="#">Home
						<span class="visually-hidden">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Posts</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Settings</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Logout</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
						 aria-expanded="false">
						<img class="rounded-circle" src="<?= base_url("assets/images/astra-tech.jpg") ?>" alt="Profile-Image"
								 height="42" width="42">
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Profile</a>
						<a class="dropdown-item" href="#">Setting</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $header_title ?></title>

	<!--Icon-->
	<link rel="icon" href="<?= base_url() ?>assets/images/icon/1024-alpha.png" type="image/x-icon">

	<!-- Bootstrap 5 -->
	<link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>">

	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
</head>

<body class="h-100 p-0">

<?php $this->load->view($main_view); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
				crossorigin="anonymous"></script>
</body>

</html>

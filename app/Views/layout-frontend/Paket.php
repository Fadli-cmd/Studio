<!doctype html5>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="<?= base_url() ?>/assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/frontend/css/tiny-slider.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/frontend/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/frontend/css/badges.css" rel="stylesheet">
	<title>VIXS BARBERSHOP</title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>/halaman"><img src="<?= base_url() ?>/assets/frontend/images/logo.png" width="140px" height="50px"></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li>
						<a class="nav-link" href="<?= base_url() ?>/halaman">Home</a>
					</li>
					<li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/halaman/paket">Paket</a></li>
					<li><a class="nav-link" href="<?= base_url() ?>/halaman/about"">About Us</a></li>
                    <li><a class=" nav-link" href="<?= base_url() ?>/halaman/galeri">Gallery</a></li>
					<li><a class="nav-link" href="<?= base_url() ?>/halaman/contact">Contact us</a></li>
				</ul>
				
			</div>

			<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
				<div class="collapse navbar-collapse" id="navbarNavDarkDropdownMenuLink">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"><?= $u = session()->get('login'); ?>&nbsp; &nbsp;<img src="<?= base_url() ?>/assets/frontend/images/user.svg">
							</a>

							<ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
								<?php if (session()->get('login')) { ?>

									<li><a class="dropdown-item" href="<?= base_url('Cart/index') ?>">Pesanan saya</a></li>
									<li><a class="dropdown-item" href="<?= base_url() ?>/Userlogin/logout">Logout</a></li>

								<?php } else { ?>
									<li><a class="dropdown-item" href="<?= base_url() ?>/Userlogin">Login</a></li>


								<?php } ?>

							</ul>

						</li>
						<li><a class="nav-link notification" href="<?= base_url('Cart/index') ?>"><?php if ($ttl_data != 0) { ?><span class="badge"><?= $ttl_data ?></span><?php } ?><img src="/assets/frontend/images/cart.svg"></a></li>
					</ul>
				</div>
			</ul>
		</div>

	</nav>
	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Paket</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->
	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->
				<div class="row col-12 ">
					<?php if ($tampildata) : ?>
						<?php foreach ($tampildata as $row) : ?>
							<div class="col-sm-3 mb-4">
								<div class="card">
									<div class="card">
										<img src="<?= base_url() . '/' . $row['foto_paket'] ?>" class="img-thumbnail" alt="GAMBAR paket KOSONG" id="gambar">
									</div>
									<a class="product-item" onclick="edit('<?= $row['id_paket'] ?>')">
										<div class="card-footer">
											<h3 class="product-title"><?= $row['nama_paket'] ?></h3>
											<strong class="product-price">Rp. <?= number_format($row['harga'], 0) ?></strong>
											<span class="icon-cross">
												<img src="<?= base_url() ?>/assets/frontend/images/cross.svg" class="img-fluid">
											</span>
										</div>

									</a>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<div class="col-sm-4">
							<h3 class="text-danger">Paket Masih Kosong</h3>
						</div>
					<?php endif; ?>

				</div>
				<!-- End Column 1 -->


			</div>
		</div>
	</div>

	<script src="<?= base_url() ?>/assets/frontend/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/tiny-slider.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/custom.js"></script>
</body>

</html>
<?php echo view('layout-frontend/footer'); ?>
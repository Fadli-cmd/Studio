<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php echo view('layout-frontend/header.php') ?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt"><br></br><br></br>
					<h1>Selamat Datang <span class="d-block"> di Vixs Barbershop</span></h1>
					<p class="mb-4">Barbershop profesional yang berlokasi di Kota Padang Panjang, Sumatera Barat. Kami menyediakan layanan potong rambut, cukur jenggot, perawatan rambut, dan lainnya.</p>
					<p><a <?php if ($u = session()->get('login') == null) { ?> href="<?php echo site_url('UserLogin'); ?>" <?php
																		} ?> href="<?php if ($u = session()->get('login') != null) {
																				echo base_url('/halaman/paket');
																			} ?>" class="btn btn-secondary me-2">Pesan Sekarang</a><a href="" class="btn btn-white-outline">Explore</a></p>

				</div>
			</div>
			<div class="col-lg-5">
				<div class="hero-img-wrap">
					<img src="<?= base_url() ?>/assets/frontend/images/daro.png" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<section id="paket" class="paket">
	<div class="product-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->

				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title" id="secPaket">Paket Layanan Kami</h2>
					<p class="mb-4">Berikut layanan terbaik kami yang meliputi potong rambut, perawatan, dan layanan cukur jenggot.</p>

				</div>

				<!-- End Column 1 -->
				<div class="row col-md-9">
					<?php if ($tampildata) : ?>
						<?php foreach ($tampildata as $row) : ?>
							<div class="col-sm-4 mb-2">
								<div class="card">
									<div class="card">
										<img src="<?= base_url() . '/' . $row['foto_paket'] ?>" class="img-thumbnail" alt="GAMBAR LAYANAN KOSONG" id="gambar">
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
							<h3 class="text-danger">Layanan Masih Kosong</h3>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Product Section -->

<section id="why" class="why">
	<!-- Start Why Choose Us Section -->
	<div class="why-choose-section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-6">
					<h2 class="section-title">Kenapa Harus di Vixs Barbershop?</h2>
					<p></p>

					<div class="row my-5">
						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="<?= base_url() ?>/assets/frontend/images/truck.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Pelayanan Cepat</h3>
								<p>Proses pelayanan yang cepat tanpa perlu antre panjang.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="<?= base_url() ?>/assets/frontend/images/bag.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Mudah Dipesan</h3>
								<p>Layanan dapat dipesan secara online dengan praktis.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="<?= base_url() ?>/assets/frontend/images/support.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Dukungan Pelanggan</h3>
								<p>Kami siap membantu setiap pertanyaan Anda dengan ramah.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="<?= base_url() ?>/assets/frontend/images/return.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Hasil Terbaik</h3>
								<p>Barber berpengalaman dan profesional memberikan layanan berkualitas tinggi.</p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-5">
					<div class="img-wrap">
						<img src="<?= base_url() ?>/assets/frontend/images/why.jpg" alt="Image" class="img-fluid">
					</div>
		

								<h3>Hassle Free Returns</h3>
								<p>Mempunyai tim yang cekatan serta bisa on fire setiap waktu .</p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-5">
					<div class="img-wrap">
						<img src="<?= base_url() ?>/assets/frontend/images/why.jpg" alt="Image" class="img-fluid">
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- End Why Choose Us Section -->

<section id="team" class="team">
	<!-- Start Popular Product -->
	<div class="popular-product">
		<div class="container">
			<div class="row">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Our Team</h2>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="product-item-sm d-flex">
						<div class="thumbnail">
							<img src="<?= base_url() ?>/assets/frontend/images/fg1.png" alt="Image" class="img-fluid">
						</div>
						<div class="pt-3">
							<h3>Randika Febrian  Amd.kom</h3>
							<p>Fotografer </p>
							<!-- <p><a href="#">Read More</a></p> -->
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="product-item-sm d-flex">
						<div class="thumbnail">
							<img src="<?= base_url() ?>/assets/frontend/images/ceo.png" alt="Image" class="img-fluid">
						</div>
						<div class="pt-3">
							<h3>Randika Febrian  Amd.kom</h3>
							<p>Owner </p>
							<!-- <p><a href="#">Read More</a></p> -->
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="product-item-sm d-flex">
						<div class="thumbnail">
							<img src="<?= base_url() ?>/assets/frontend/images/vg1.png" alt="Image" class="img-fluid">
						</div>
						<div class="pt-3">
							<h3>Randika Febrian  Amd.kom</h3>
							<p>Videografer </p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- End Popular Product -->

<!-- Start Testimonial Slider -->
<section id="galeri" class="galeri">
	<div class="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto text-center">
					<h2 class="section-title">Gallery</h2>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="testimonial-slider-wrap text-center">

						<div id="testimonial-nav">
							<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
							<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
						</div>

						<div class="testimonial-slider">



							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<img src="<?= base_url() ?>/assets/frontend/images/ft2.jpg" alt="Maria Jones" class="img-fluid">
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<img src="<?= base_url() ?>/assets/frontend/images/ft4.jpg" alt="Maria Jones" class="img-fluid">
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->
							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<img src="<?= base_url() ?>/assets/frontend/images/ft3.jpg" alt="Maria Jones" class="img-fluid">
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->
							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<img src="<?= base_url() ?>/assets/frontend/images/ft1.jpg" alt="Maria Jones" class="img-fluid">
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->


						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Testimonial Slider -->


<?php echo view('layout-frontend/footer') ?>
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
                    <li><a class="nav-link" href="<?= base_url() ?>/halaman/paket">Paket</a></li>
                    <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/halaman/about"">About Us</a></li>
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
    <!-- End Header/Navigation -->
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>About Us</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <section id="why" class="why">
        <!-- Start Why Choose Us Section -->
        <div class="why-choose-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <h2 class="section-title">Kenapa sih Harus Di VIXS BARBERSHOP</h2>
                        <p></p>

                        <div class="row my-5">
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="<?= base_url() ?>/assets/frontend/images/truck.svg" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Fast &amp; Online Fast</h3>
                                    <p>Di VIXS BARBERSHOP Bisa pesan secara online yang membuat kamu tidak perlu datang ke studio dan pembuatan album cepat.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="<?= base_url() ?>/assets/frontend/images/bag.svg" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Easy to Shop</h3>
                                    <p>Cukup dengan Klik dan Pesan sudah bisa menikmati jasa dari kami.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="<?= base_url() ?>/assets/frontend/images/support.svg" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>24/7 Support</h3>
                                    <p>Full support untuk pelanggan yang kebingunan dengan harga dan ketentuan lainnya.</p>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="<?= base_url() ?>/assets/frontend/images/return.svg" alt="Image" class="imf-fluid">
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
                                <h3>Imral Nursaid</h3>
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
                                <h3>Muhammad iqbal S.kom</h3>
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
                                <h3>Boyke Meizola</h3>
                                <p>Videografer </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Popular Product -->


    <script src="<?= base_url() ?>/assets/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/js/tiny-slider.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/js/custom.js"></script>
</body>

</html>
<?php echo view('layout-frontend/footer'); ?>
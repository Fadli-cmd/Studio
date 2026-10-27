<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
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
    <title>Man Photo digital studio</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>/halaman">Home</a>
                    </li>
                    <li><a class="nav-link" href="#paket">Paket</a></li>
                    <li><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li><a class="nav-link" href="#why">About Me</a></li>
                    <li><a class="nav-link" href="#kontak">Contact us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"><?= $u = session()->get('username'); ?>&nbsp &nbsp<img src="<?= base_url() ?>/assets/frontend/images/user.svg">

                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Pesanan saya</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url() ?>/login/logout">Logout</a></li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt"><br></br><br></br>
                        <h1>Selamat Datang <span clsas="d-block"> di Man Photo digital studio</span></h1>
                        <p class="mb-4">Jasa foto dan video Proffesional yang berlokasi di Kota Padang Sumatera Barat yang menyediakan dari Wedding ,Event,dan Dokumentasi dan lainnya.</p>
                        <p><a href="<?= site_url('UserLogin') ?>" class="btn btn-secondary me-2">Pesan Sekarang</a><a href="" class="btn btn-white-outline">Explore</a></p>
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






    <!-- End Product Section -->
    <section id="why" class="why">
        <!-- Start Why Choose Us Section -->
        <div class="why-choose-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <h2 class="section-title">Kenapa sih Harus Di Man Photo digital studio</h2>
                        <p></p>

                        <div class="row my-5">
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="<?= base_url() ?>/assets/frontend/images/truck.svg" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Fast &amp; Online Fast</h3>
                                    <p>Di Man Photo digital studio Bisa pesan secara online yang membuat kamu tidak perlu datang ke studio dan pembuatan album cepat.</p>
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



    <!-- Start Footer Section -->
    <section id="kontak" class="kontak">
        <footer class="footer-section">
            <div class="container relative">


                <div class="row g-5 mb-5">
                    <div class="col-lg-4">
                        <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Man Photo digital studio<span>.</span></a></div>
                        <p class="mb-4">Jasa foto dan video Proffesional yang berlokasi di Kota Padang Sumatera Barat yang menyediakan dari Wedding ,Event,dan Dokumentasi dan lainnya.</p>

                        <ul class="list-unstyled custom-social">
                            <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>

                        </ul>
                    </div>

                    <div class="col-lg-8">
                        <div class="row links-wrap">
                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact us</a></li>

                                </ul>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <h5>Admin</h5>
                                <ul class="list-unstyled">

                                    <li><a href="<?= base_url('ogin/index'); ?>">Login Sebagai Admin</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="border-top copyright">
                    <div class="row pt-4">
                        <div class="col-lg-6">
                            <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
                            </p>
                        </div>

                        <div class="col-lg-6 text-center text-lg-end">
                            <ul class="list-unstyled d-inline-flex ms-auto">
                                <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </footer>
    </section>
    <!-- End Footer Section -->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->


    <script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/js/tiny-slider.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/js/custom.js"></script>
</body>

</html>
<!-- Start Footer Section -->
<section id="kontak" class="kontak">
    <footer class="footer-section">
        <div class="container relative">

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Vixs Barbershop<span>.</span></a></div>
                    <p class="mb-4">Barbershop profesional yang berlokasi di Kota Padang Panjang, Sumatera Barat. Kami menyediakan layanan potong rambut, cukur jenggot, perawatan rambut, dan lainnya.</p>

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
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Layanan</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Kontak Kami</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <h5>Admin</h5>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('login/index'); ?>">Login Sebagai Admin</a></li>
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
                            <li class="me-4"><a href="#">Syarat &amp; Ketentuan</a></li>
                            <li><a href="#">Kebijakan Privasi</a></li>
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
<script>
    function edit(id) {
        window.location = ('/layanan/detail/' + id);
    }
</script>

<script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/frontend/js/tiny-slider.js"></script>
<script src="<?= base_url() ?>/assets/frontend/js/custom.js"></script>
</body>

</html>

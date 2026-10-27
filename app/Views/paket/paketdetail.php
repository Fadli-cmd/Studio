<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php echo view('layout-frontend/header.php') ?>
<!-- jQuery -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<!-- notifikasi sukses keren sweeet alert -->
<link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Detail Paket</h1>


                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<!--Listing-detail-->
<br></br>
<section class="listing-detail">
    <div class="container">
        <div class="listing_detail_head row">
            <div class="col-md-9 ">
                <h3><?= $namapaket ?></h3>
            </div>
            <div class="col-md-3">
                <div class="price_info">
                    <p>
                    <h3>Rp.<?= number_format($harga) ?> </h3>
                    </p>/ Packs

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="main_features">
                </div>
                <div class="listing_more_info">
                    <div class="listing_detail_head_wrap">
                        <div class="col-sm-6">
                            <img src="<?= base_url() . '/' . $gambar ?>" class="img-thumbnail" style="width: 80%;" alt="GAMBAR paket KOSONG">

                        </div>

                        <!-- Nav tabs -->
                        <br></br>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active badge-success" aria-current="page" href="#vehicle-overview">Deskripsi Paket</a>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- vehicle-overview -->
                            <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                <div class="col-md-12 col-lg-6 mb-5 mb-lg-3">
                                    <p><?= $ket ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!--Side-Bar-->
            <aside class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="sidebar_widget">
                            <ul class="nav">
                                <li class="nav-item">
                                    <p><i class="fa fa-envelope" aria-hidden="true">&nbsp</i>Booking Sekarang</p>

                            </ul>

                            <!-- <form action="Booking" method="POST"> -->
                            <input type="hidden" class="form-control" name="id" value=<?php echo $kodepaket; ?> readonly>
                            <?php if (session()->get('login')) { ?>
                                <div class="form-group" align="center">
                                    <button class="btn" onclick="prosesbooking('<?= $kodepaket ?>')">

                                        <font color="white">Booking</font>
                                    </button>
                                </div>
                            <?php } else { ?>
                                <br></br>
                                <a href="<?= base_url() ?>/userlogin" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login Untuk Booking</a>

                            <?php } ?>
                            <!-- </form> -->
                        </div>
                        <div class="share_vehicle">
                            <!-- <p>Share: <a href="#"><i class="fa fa-facebook-btn" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p> -->
                        </div>
                    </div>
                </div>
            </aside>
            <!--/Side-Bar-->
        </div>

        <div class="space-20"></div>
        <div class="divider"></div>

    </div>
</section>
<script type="text/javascript">
    function valid() {
        if (document.sewa.todate.value < document.sewa.fromdate.value) {
            alert("Tanggal selesai harus lebih besar dari tanggal mulai sewa!");
            return false;
        }
        if (document.sewa.fromdate.value < document.sewa.now.value) {
            alert("Tanggal sewa minimal H-1!");
            return false;
        }

        return true;
    }

    function prosesbooking(kodepaket) {
        window.location = ('/Booking/index/' + kodepaket);
    }
</script>
<!--/Listing-detail-->
<br></br>
<?php echo view('layout-frontend/footer.php') ?>
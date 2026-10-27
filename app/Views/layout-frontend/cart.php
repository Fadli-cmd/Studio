<?php echo view('layout-frontend/header') ?>

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Pesanan</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Gambar</th>
                                <th class="product-name">Paket</th>
                                <th class="product-price">Total Bayar</th>
                                <th class="product-quantity">Sisa Bayar</th>
                                <th class="product-total">Status</th>
                                <th class="product-remove">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($orderan); $i++) {
                                $test = $orderan[$i]['stts_trx']; ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="/<?= $orderan[$i]['url_gambar'] ?>" alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?= $orderan[$i]['nama_paket'] ?></h2>
                                    </td>
                                    <td><?= $orderan[$i]['ttl_bayar'] ?></td>
                                    <td><?= $orderan[$i]['sisa_bayar'] ?></td>
                                    <?php if ($orderan[$i]['sisa_bayar'] > 0 && $test=="PEMBAYARAN DIKONFIRMASI") { ?>
                                        <td class="text-warning">(BELUM LUNAS)<br><?= $orderan[$i]['stts_trx'] ?></td>
                                    <?php } else if ($orderan[$i]['sisa_bayar'] == 0 && $test=="PEMBAYARAN DIKONFIRMASI") {?>
                                        <td class="text-success">(LUNAS)<br><?= $orderan[$i]['stts_trx'] ?></td>
                                    <?php } else {?>
                                        <td><br><?= $orderan[$i]['stts_trx'] ?></td>
                                    <?php } ?>
                                    <?php if ($test == "MENUNGGU PEMBAYARAN") { ?>
                                        <td><a href="<?= base_url('booking/bayarindex') ?>/<?= $orderan[$i]['id_pemesanan'] ?>" class="btn btn-black btn-sm" style="color: red;">KONFIRMASI PEMBAYARAN</a></td>
                                    <?php } ?>
                                    <?php if ($test == "MENUNGGU KONFIRMASI") { ?>
                                        <td><a href="<?= base_url('booking/thankyou') ?>" class="btn btn-black btn-sm" style="color: green;">MENUNGGU KONFIRMASI</a></td>
                                    <?php } ?>
                                    <?php if ($test == "PEMBAYARAN DIKONFIRMASI") {
                                        $inv = $orderan[$i]['id_pemesanan']; ?>
                                        <td><a href="<?= base_url("booking/processed/$inv") ?>" class="btn btn-black btn-sm" style="color: blue;">PEMBAYARAN DIKONFIRMASI</a></td>
                                    <?php } ?>
                                    <?php if ($test == "PEMBAYARAN DIBATALKAN") {
                                        $inv = $orderan[$i]['id_pemesanan']; ?>
                                        <td><a href="<?= base_url("booking/canceled/$inv") ?>" class="btn btn-black btn-sm" style="color: orange;">PEMBAYARAN DIBATALKAN</a></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php echo view('layout-frontend/footer') ?>
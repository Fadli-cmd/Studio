<?= $this->extend('main/layout') ?>

<head>
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<?= $this->section('judul') ?>
<b>Menunggu Pembayaran</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>



<div class="card">
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-bordered table-striped table-hover " id="tabelpaket">
            <thead>
                <tr>
                    <th style="width: 5%"><b>NO</b></th>
                    <th><b>INVOICE</b></th>
                    <th><b>NAMA PELANGGAN - NAMA PAKET </b></th>
                    <th><b>TGL TAKE</b></th>
                    <th><b>JAM </b></th>
                    <th><b>TOTAL BAYAR </b></th>
                    <th><b>SISA BAYAR </b></th>
                    <th><b>STATUS </b></th>
                    <th style="width:10%">
                        <center><b>AKSI</b></center>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php $a = 1;
                for ($i = 0; $i < count($data); $i++) { ?>
                    <tr>
                        <td><?= $a;
                            $a++ ?></td>
                        <td><?= $data[$i]['id_pemesanan'] ?></td>
                        <td><?= $data[$i]['nama_member'] ?> - <?= $data[$i]['nama_paket'] ?></td>
                        <td><?= $data[$i]['tgl_take'] ?></td>
                        <td><?= $data[$i]['jam'] ?></td>
                        <td>Rp.<?= number_format($data[$i]['ttl_bayar']) ?></td>
                        <td>Rp.<?= number_format($data[$i]['sisa_bayar']) ?></td>
                        <td><?= $data[$i]['stts_trx'] ?></td>
                        <td><button class="btn btn-sm bg-danger" onclick="hapus('<?= $data[$i]['id_pemesanan'] ?>')">HAPUS TRANSAKSI</button></td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>



<script>
    $(document).ready(function() {
        $('#transaksi').addClass('nav-item menu-is-opening menu-open');
        $('#transaksi2').addClass('nav-link active');
        $('#Mpembayaran').addClass('nav-link active');
    });

    function hapus(invo) {
        swal({
                title: "Hapus Transaksi?",
                text: "Transaksi yang dibuat akan dihapus dari dari database, Pelanggan tidak akan menemukan transaksi tersebut!",
                icon: "warning",
                buttons: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "/transaksi/hapustransaksi/" + invo,
                        data: {
                            invoice: invo
                        },
                        dataType: "json",

                        success: function(response) {
                            swal(response.success, {
                                icon: "success",
                            });
                            window.location.reload();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + '\n' + thrownError);
                        }
                    });
                } else {}
            });
    }

    $(document).ready(function() {
        $('#tabelpaket').DataTable();

    });
</script>


<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/frontend/js/mysweet.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</script>


<?= $this->endSection('isi') ?>
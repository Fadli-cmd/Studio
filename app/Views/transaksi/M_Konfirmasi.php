<?= $this->extend('main/layout') ?>

<head>
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<?= $this->section('judul') ?>
<b>Menunggu Konfirmasi</b>
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
                        <td><button class="btn btn-sm bg-info" onclick="showModal('<?= $data[$i]['id_pemesanan'] ?>','<?= $data[$i]['nama_member'] ?>','<?= $data[$i]['nama_paket'] ?>','<?= $data[$i]['nama_pengirim'] ?>','<?= $data[$i]['rek_pelanggan'] ?>','<?= $data[$i]['bukti_tf'] ?>')">CEK PEMBAYARAN</button></td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- /.modal -->
<div class="modal fade" id="modalData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cek Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Invoice</label>
                    <input type="text" class="form-control" id="invoice" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namapelanggan" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Paket</label>
                    <input type="text" class="form-control" id="namapaket" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pengirim</label>
                    <input type="text" class="form-control" id="namapengirim" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Rekening</label>
                    <input type="text" class="form-control" id="nomorpengirim" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                    <div class="position-relative">
                        <img src="../../dist/img/photo2.png" alt="Photo 2" class="img-fluid" id="bukti">
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <div class="btn-group">
                    <button type="button" onclick="batalbayar()" class="btn btn-warning">Batalkan Pembayaran</button>
                    <button type="button" onclick="terimabayar()" class="btn btn-success">Terima Pembayaran</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.modal -->
<div class="modal fade" id="modalBatal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Batalkan Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Alasan Pembatalan</label>
                    <textarea type="text" class="form-control" id="alasan"></textarea>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <div class="btn-group">
                    <button type="button" onclick="hapustransaksi()" class="btn btn-danger">Hapus Transaksi</button>
                    <button type="button" onclick="pembatalan()" class="btn btn-warning">Buat Pembatalan</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function showModal(invoice, nama_member, nama_paket, namapengirim, norek, bukti) {
        $('#invoice').val(invoice);
        $('#namapelanggan').val(nama_member);
        $('#namapaket').val(nama_paket);
        $('#namapengirim').val(namapengirim);
        $('#nomorpengirim').val(norek);
        $("#bukti").attr('src', "/" + bukti);
        $('#modalData').modal('show');
    }
    $(document).ready(function() {
        $('#transaksi').addClass('nav-item menu-is-opening menu-open');
        $('#transaksi2').addClass('nav-link active');
        $('#Mkonfirmasi').addClass('nav-link active');
    });

    function terimabayar() {
        var invo = $('#invoice').val();
        swal({
                title: "Terima Pembayaran?",
                text: "Pastikan dana sudah masuk sesuai bukti pengiriman, Setelah menekan OK transaksi tidak dapat dibatalkan!",
                icon: "warning",
                buttons: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: "/transaksi/confirmtransaksi/" + invo,
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

    function hapustransaksi() {
        var invo = $('#invoice').val();
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

    function batalbayar() {
        $('#modalData').modal('hide');
        $('#modalBatal').modal('show');

    }

    function pembatalan() {
        var invo = $('#invoice').val();
        var alasan = $('#alasan').val();
        $.ajax({
            type: "post",
            url: "/transaksi/bataltransaksi",
            data: {
                invoice: invo,
                alasan :alasan
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
<script src="<?= base_url() ?>/assets/frontend/js/mysweet.js"></script>
<script src="<?= base_url() ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</script>


<?= $this->endSection('isi') ?>
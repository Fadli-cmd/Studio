<?php echo view('layout-frontend/header')  ?>

<!-- jQuery -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/common.js"></script>
<!-- notifikasi sukses keren sweeet alert -->
<link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/datepickercustom/dist/mc-calendar.min.css" />
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>

                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<div class="untree_co-section">
    <div class="container">

        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Detail Booking</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    <div class="form-group">
                        <label for="c_country" class="text-black">Invoice <span class="text-danger"></span></label>
                        <input type="text" class="form-control" id="idpemesanann" name="idpemesanann" placeholder="id pemesanan paket" disabled>
                    </div>

                    <div class="form-group">
                        <label for="c_country" class="text-black">Tanggal Pemesanan <span class="text-danger"></span></label>
                        <input type="date" class="form-control" id="tglpemesanan" name="tglpemesanan" value="<?= date('Y-m-d') ?>" placeholder="" disabled>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="hidden" name="idpel" id="idpel" value="<?= $idUser ?>">
                            <label for=" c_companyname" class="text-black">Nama Pelanggan </label>
                            <input type="text" class="form-control" id="member" name="member" value="<?= $u = session()->get('login'); ?>" placeholder="Keterangan paket" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_state_country" class="text-black">Tanggal Pengambilan *<span class="text-danger"></span></label>
                            <input type="text" class="form-control" id="tgltake" name="tgltake" placeholder="Pilih tanggal">
                            <small class="text-secondary">Beberapa tanggal sudah terisi</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_email_address" class="text-black">Jam *<span class="text-danger"></span></label>
                            <select class="form-control" name="jam" id="jam" required>
                                <option value="" selected>== Pilih Jam ==</option>
                                <option value="07:00">07:00</option>
                                <option value="08:00">08:00</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Lokasi Acara/Pesan *</label>
                        <textarea name="c_order_notes" id="catt" cols="30" rows="4" class="form-control" placeholder="Write your notes here..."></textarea>
                    </div>

                </div>
            </div>
            <div class="col-md-6">

                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <input type="hidden" name="harga" id="harga" value="<?= $harga ?>">
                            <table class="table site-block-order-table">
                                <thead>
                                    <th>Paket Pemesanan</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $namapaket ?> <strong class="mx-2"></strong> </td>
                                        <td>Rp.<?= number_format($harga) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Total Bayar</strong></td>
                                        <td class="text-black" id="total">....</td>
                                        <input type="hidden" name="ttl_bayar" id="ttl_bayar">
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Sisa Bayar</strong></td>
                                        <td class="text-black font-weight-bold" id="sisabayar" name="sisabayar"><strong></strong></td>
                                        <input type="hidden" name="sisa_bayar" id="sisa_bayar">
                                    </tr>
                                </tbody>
                            </table>
                            <div id="note" class="mb-5"></div>
                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" role="button" aria-expanded="false" aria-controls="collapsebank">Pembayaran</a></h3>

                                <div>
                                    <div class="py-2">
                                        <select class="form-select form-select-sm" id="jenis" aria-label=".form-select-sm example" onchange="total()">
                                            <option value="0" selected>Jenis Pembayaran</option>
                                            <option value="1">Dp (30%)</option>
                                            <option value="2">Lunas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-black btn-lg py-3 btn-block" onclick="bayar(<?= $idUser ?>)">Bayar Sekarang</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </form> -->
        <!-- </form> -->
    </div>


    <br></br> <br></br> <br></br> <br></br>

    <script src="<?= base_url() ?>/assets/frontend/datepickercustom/dist/mc-calendar.min.js"></script>


    <script>
        function buatnofaktur() {

            $.ajax({
                type: "post",
                url: "/booking/buatfaktur",
                data: {
                    tanggal: $('#tglpemesanan').val()
                },
                dataType: "json",

                success: function(response) {
                    $('#idpemesanann').val(response.nofaktur)
                    // dataTemp();

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });

        }

        function bayar(idpelanggan) {
            
            var nofak = $('#idpemesanann').val();
            var id = idpelanggan;
            var namapel = $('#member').val();
            var id_paket = "<?= $kodepaket ?>";
            var namapaket = "<?= $namapaket ?>";
            var biaya = "<?= $harga ?>";
            var tanggaltrx = "<?= date('Y-m-d') ?>";
            var status = "MENUNGGU PEMBAYARAN";
            var tgl_take = $('#tgltake').val();
            var jam = $('#jam').val();
            var catt = $('#catt').val();
            var jenispembayaran = $('#jenis option:selected').val();
            var ttl_bayar = $('#ttl_bayar').val();
            var sisa_bayar = $('#sisa_bayar').val();

            if (tgl_take == "") {
                alert("Tanggal Pengambilan belum diisi!");
            } else {
                if (jam == "") {
                    alert("Jam belum diisi!")
                } else {
                    if (catt == "") {
                        alert("Catatan belum diisi!");
                    } else {
                        if (jenispembayaran == 0) {
                            alert("Silahkan pilih Direct Pembayaran lalu pilih menu Jenis Pembayaran")
                        } else {

                            $.ajax({
                                type: "post",
                                url: "/booking/terimapembayaran",
                                data: {
                                    nofak: nofak,
                                    idpelanggan: id,
                                    namapel: namapel,
                                    id_paket : id_paket,
                                    namapaket: namapaket,
                                    sisa_bayar: sisa_bayar,
                                    ttl_bayar: ttl_bayar,
                                    tanggaltrx: tanggaltrx,
                                    status: status,
                                    tgl_take: tgl_take,
                                    jam: jam,
                                    catt: catt
                                },
                                dataType: "json",

                                success: function(response) {
                                    location.href = "<?= base_url('/booking/bayarindex/') ?>/" + nofak

                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status + '\n' + thrownError);
                                }
                            });
                        }
                    }
                }

            }
        }


        $(document).ready(function() {
            buatnofaktur();
            $('#jenis').val(0).change();
            // var d = new Date(2022, 7, 2);
            // alert(d);
            const myDatePicker = MCDatepicker.create({
                el: '#tgltake',
                dateFormat: 'YYYY-m-DD',
                disableWeekends: false,
                minDate: new Date(),
                disableDates: [<?php for ($i = 0; $i < count($tanggalSibuk); $i++) {
                                    $tgl1 = $tanggalSibuk[$i][0];
                                    $tgl2 = $tanggalSibuk[$i][1];
                                    $tgl3 = $tanggalSibuk[$i][2];

                                    echo "new Date($tgl1, $tgl2, $tgl3), ";
                                } ?>] // ex: [0,2,5]
                // customWeekDays: ['M', 'S', 'S', 'R', 'K', 'J', 'S'],
                // customMonths: [
                //     'Januari',
                //     'FebruarI',
                //     'Maret',
                //     'April',
                //     'Mei',
                //     'Juni',
                //     'Juli',
                //     'Agustus',
                //     'September',
                //     'Oktober',
                //     'November',
                //     'Desember'
                // ]
            })
        });

        $('#tglpemesanan').change(function(e) {
            buatnofaktur();
        });

        function total() {
            var jenis = $('#jenis').val();
            var harga = $('#harga').val();
            if (jenis == '1') {
                var dp = 30 * harga / 100;
                var sisa = harga - dp;
                $('#total').html('Rp ' + formatRupiah(dp.toString(), ''));
                $('#sisabayar').html('Rp ' + formatRupiah(sisa.toString(), ''));
                var sisabayar = formatRupiah(sisa.toString(), '');
                var html = '';
                html += '<h3>Catatan</h3>';
                html += "<p>Sisa pembayaran Rp " + sisabayar + ", dibayarkan setelah pemberian album .</p>";
                $('#note').html(html);
                $('#ttl_bayar').val(dp);
                $('#sisa_bayar').val(sisa);
            } else if (jenis == '2') {
                $('#total').html('Rp. ' + formatRupiah(harga, ''));
                $('#sisabayar').html('&mdash;');
                $('#note').html('');
                $('#ttl_bayar').val(harga);
                $('#sisa_bayar').val(0);
            }

        }


        // $('#simpan').click(function(e) {
        //     e.preventDefault();


        //     $.ajax({
        //         type: "post",
        //         url: "/booking/simpanBooking",
        //         data: {
        //             idpemesanan: $('#idpemesanan').val(),
        //             tglpemesanan: $('#tglpemesanan').val(),
        //             hargapaket: $('#hargapaket').val(),
        //             member: $('#member').val()
        //         },
        //         dataType: "json",
        //         success: function(response) {
        //             if (response.error) {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Oppss....',
        //                     text: response.error,

        //                 })
        //             }

        //             if (response.data) {
        //                 $('booking').html(response.data).show();
        //                 $('booking').modal('show');
        //             }

        //         },
        //         error: function(xhr, ajaxOptions, thrownError) {
        //             alert(xhr.status + '\n' + thrownError);
        //         }
        //     });

        // });
    </script>

    <?php echo view('layout-frontend/footer')  ?>
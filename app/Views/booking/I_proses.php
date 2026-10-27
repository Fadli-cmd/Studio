<?php echo view('layout-frontend/header')  ?>

<!-- jQuery -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<!-- notifikasi sukses keren sweeet alert -->
<link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>


<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3">
                <div class="intro-excerpt">
                    <br></br>
                    <!-- <h1>From Pemesanan</h1> -->
                    <h2>
                        <font color="#F9BF00">Pembayaran</font>
                    </h2>
                </div>
            </div>
            <div class="col-lg-12">
                <p>silahkan isi form Pembayaran</p>
            </div>
        </div>
    </div>
</div>


<br></br>
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Detail Pembayaran</h2>

            <?= form_open_multipart('booking/prosespembayaran', 'class="bayar"') ?>
            <div class="form-group">
                <label for="c_country" class="text-black">Invoice <span class="text-danger"></span></label>
                <input type="text" class="form-control" id="invoice" name="invoice" placeholder="" value="<?= $invoice ?>" readonly>
            </div>

            <div class="form-group">
                <label for="c_country" class="text-black"> <span class="text-black">Nama Pengirim*</span></label>
                <input type="hidden" name="idpelanggan" id="idpelanggan" value="<?= $id ?>">
                <input type="text" class="form-control" id="namapengirim" name="namapengirim" value="" placeholder="Nama Pengirim">
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for=" c_companyname" class="text-black">No Rek Pengirim* </label>
                    <input type="text" class="form-control" id="norek" name="norek" value="" placeholder="No Rek Pengirim">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="c_state_country" class="text-black">Upload Bukti Transfer *<span class="text-danger"></span></label>
                    <input type="file" class="form-control" id="bukti_tf" name="bukti_tf">
                </div>
            </div>
            <br>
            <div class="form-group">

                <button type="button" class="btn btn-black btn-lg py-3 btn-block" onclick="selesai()">Selesai</button>
            </div>
            <?= form_close() ?>
        </div>
        <div class="col-md-6">

            <div class="row mb-5">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Silahkan Lakukan Pembayaran Melalui: </h2>
                    <h5 class="h5 mb-5 text-black">BRI : 0058-01119932-503 A/N Boyke Meizola</h5>
                    <h2 class="h3 mb-3 text-black">Total Bayar</h2>
                    <h2 class="h3 mb-3 text-black">Rp. <?= number_format($biaya) ?></h2>
                    <br><br>
                    <p class="mb-3 text-primary">Untuk informasi lebih lanjut, Silahkan konfirmasi Admin melalui Whatsapp <br>(+62 822 8743 4767) atau melalui tombol dibawah</p>
                    <a href="https://api.whatsapp.com/send/?phone=6282287434767&text=Halo+Saya+ingin+bertanya&type=phone_number&app_absent=0" class="btn btn-primary">Hubungi</a>
                </div>
            </div>

        </div>
    </div>
    <!-- </form> -->
    <!-- </form> -->
</div>

<br></br> <br></br> <br></br> <br></br>

<script>
    $(document).ready(function() {
        // buatnofaktur();
    });

    // $('.bayar').submit(function(e) {
    function selesai() {

        // var data = $(".bayar").serialize();
        // console.log(data);
        var invoice = $('#invoice').val();
        var idpelanggan = $('#idpelanggan').val();
        var namapengirim = $('#namapengirim').val();
        var norek = $('#norek').val();
        var bukti_tf = $('#bukti_tf').val();
        var rekisnomor = $.isNumeric(norek);
        if (namapengirim == "") {
            alert("Nama Pengirim Wajib diisi!")
        } else {
            if (norek == "") {
                alert("Nomor Rekening Wajib diisi!")
            } else {
                if (rekisnomor == false) {
                    alert("Nomor Rekening yang diisi bukanlah berupa Angka!")
                } else {
                    if (bukti_tf == "") {
                        alert("Bukti Transaksi dibutuhkan");
                    } else {
                        $('.bayar').trigger('submit');
                    }
                }

            }


        }
    }

    // function selesai() {

    //     if (namapengirim == "") {
    //         alert("Nama Pengirim Wajib diisi!")
    //     } else {
    //         if (norek == "") {
    //             alert("Nomor Rekening Wajib diisi!")
    //         } else {
    //             if (rekisnomor == false) {
    //                 alert("Nomor Rekening yang diisi bukanlah berupa Angka!")
    //             } else {
    //                 if (bukti_tf == "") {
    //                     alert("Bukti Transaksi dibutuhkan");
    //                 } else {
    //                     $.ajax({
    //                         type: "post",
    //                         url: "/booking/prosespembayaran",
    //                         data: {
    //                             invoice: invoice,
    //                             idpelanggan: idpelanggan,
    //                             namapengirim: namapengirim,
    //                             norek: norek,
    //                             bukti_tf: bukti_tf,
    //                             data_tf: $formData
    //                         },
    //                         dataType: "json",

    //                         success: function(response) {
    //                             alert(response.success);
    //                             // location.href = "<?= base_url('/booking/bayarindex/') ?>/" + nofak

    //                         },
    //                         error: function(xhr, ajaxOptions, thrownError) {
    //                             alert(xhr.status + '\n' + thrownError);
    //                         }
    //                     });
    //                 }
    //             }

    //         }


    //     }
    // }
</script>

<?php echo view('layout-frontend/footer')  ?>
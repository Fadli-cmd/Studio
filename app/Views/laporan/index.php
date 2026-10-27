<?= $this->extend('main/layout') ?>

<head>
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<?= $this->section('judul') ?>
<b>Laporan</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>



<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Master</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <a href="<?= base_url("laporan/pelanggan") ?>" class="btn btn-outline-info btn-block"><i class="fa fa-book"></i> Pelanggan</a>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url("laporan/karyawan") ?>" class="btn btn-outline-info btn-block"><i class="fa fa-book"></i> Karyawan</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Pendapatan Perbulan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Bulan:</p>
                        <select id="bulan" class="form-control">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <p>Tahun:</p>
                        <input id="bTahun" type="number" class="form-control" id="exampleInputEmail1" value="2022">
                    </div>
                </div>
                <br>
                <a onclick="lapBulan();" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i> Tampilkan</a>

            </div>
            <div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan Pendapatan Pertahun</h3>
    </div>
    <div class="card-body row">
        <p>Tahun:</p>
        <input id="tahun" type="number" class="form-control" value="2022">
        <br><br>
        <a onclick="lapTahun();" class="btn btn-outline-info btn-block">
            <i class="fa fa-search"></i> Tampilkan
        </a>
    </div>
</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Pemesanan Per Tanggal</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dari</p>
                        <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                            <input type="text" id="tglDari" class="form-control datetimepicker-input" data-target="#datetimepicker7" />
                            <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Sampai</p>
                        <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                            <input type="text" id="tglSampai" class="form-control datetimepicker-input" data-target="#datetimepicker8" />
                            <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <a onclick="lapTanggal();" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i> Tampilkan</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Booking Per Tanggal</h3>
            </div><form action="<?= base_url('laporan/tampilkanLaporan') ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dari</p>
             
                        <label for="startDate">Tanggal Mulai:</label>
                        <input type="date" id="startDate" name="startDate" required>
                        
                    </div>
                    <div class="col-md-6">
                        <p>Sampai</p>
                        <label for="endDate">Tanggal Selesai:</label>
                        <input type="date" id="endDate" name="endDate" required>
                    </div>
                </div>
                <br>
                <center><button  type="submit" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i> Tampilkan</button>
                </form> </div>
                <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Status Pembayaran</h3>
            </div><form action="<?= base_url('laporan/status') ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dari</p>
             
                        <label for="startDate">Tanggal Mulai:</label>
                        <input type="date" id="startDate" name="startDate" required>
                        
                    </div>
                    <div class="col-md-6">
                        <p>Sampai</p>
                        <label for="endDate">Tanggal Selesai:</label>
                        <input type="date" id="endDate" name="endDate" required>
                    </div>
                </div>
                <br>
                <center><button  type="submit" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i> Tampilkan</button>
                </form> </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Jadwal Pemotretan</h3>
            </div><form action="<?= base_url('laporan/showReport') ?>" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dari</p>
             
                        <label for="startDate">Tanggal Mulai:</label>
                        <input type="date" id="startDate" name="startDate" required>
                        
                    </div>
                    <div class="col-md-6">
                        <p>Sampai</p>
                        <label for="endDate">Tanggal Selesai:</label>
                        <input type="date" id="endDate" name="endDate" required>
                    </div>
                </div>
                <br>
                <center><button  type="submit" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i> Tampilkan</button>
                </form> </div>
        </div>
        
    
    </div>
</div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#laporan').addClass('nav-item menu-is-opening menu-open');
        $('#laporan2').addClass('nav-link active');
        $('#laporan2').addClass('nav-link active');
    });

    function lapTanggal() {
        var tgDari = $('#tglDari').val();
        var tgSampai = $('#tglSampai').val();

        if (tgDari == "") {
            alert("Tanggal Awal tidak boleh kosong!");
        } else {
            if (tgSampai == "") {
                alert("Tanggal Akhir tidak boleh kosong!");
            } else {
                $.ajax({
                    type: "post",
                    url: "/laporan/pertanggal",
                    data: {
                        'awal': tgDari,
                        'akhir': tgSampai
                    },
                    dataType: "json",
                    success: function(response) {
                        location.replace(response.success);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + '\n' + thrownError);
                    }
                });
            }
        }
    }

    function lapBulan() {
        var bulan = $('#bulan').val();
        var bulanText = $('#bulan').find(":selected").text();
        var tahun = $('#bTahun').val();
        var gbng = tahun + "-" + bulan + "-" + bulanText;
        window.location.replace("<?= base_url('/laporan/perbulan/') ?>/" + gbng)
    }

    function lapTahun() {
        var tahun = $('#tahun').val();
        window.location.replace("<?= base_url('/laporan/tahun/') ?>/" + tahun)
    }

    $(function() {
        //Date range picker
        $('#reservation').daterangepicker()

        $('#datemonthly').datetimepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });

        $('#datetimepicker7').datetimepicker();
        $('#datetimepicker8').datetimepicker({
            useCurrent: false
        });
        $("#datetimepicker7").on("change.datetimepicker", function(e) {
            $('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function(e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
        });
        $('#datetimepicker9').datetimepicker();
        $('#datetimepicker10').datetimepicker({
            useCurrent: false
        });
        $("#datetimepicker9").on("change.datetimepicker", function(e) {
            $('#datetimepicker10').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker10").on("change.datetimepicker", function(e) {
            $('#datetimepicker9').datetimepicker('maxDate', e.date);
        });
    });
</script>


<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>



<?= $this->endSection('isi') ?>
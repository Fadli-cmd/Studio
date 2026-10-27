<?= $this->extend('main/layout') ?>


<?= $this->section('judul') ?>
<b>Home</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<img src="<?= base_url() ?>/dist/img/halaman.png" style="width: 100%;" alt="GAMBAR BARANG KOSONG">
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<div class="row">
  <?php if (session()->idLevel == 1) : ?>
    <div class="col-lg-4 col-6">
      <!-- small card -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>Pembayaran</h3>

          <p><?= $countMenungguPembayaran ?> Menunggu Pembayaran</p>
        </div>
        <div class="icon">
          <i class="fas fa-list-alt"></i>
        </div>
        <a href="<?= base_url('transaksi/Mpembayaran') ?>" class="small-box-footer">
          Rincian <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small card -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>Konfirmasi<sup style="font-size: 20px"></sup></h3>

          <p><?= $countMenungguKonfirmasi ?> Menunggu Konfirmasi</p>
        </div>
        <div class="icon">
          <i class="fas fa-weight"></i>
        </div>
        <a href="<?= base_url('transaksi/Mkonfirmasi') ?>" class="small-box-footer">
          Rincian <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small card -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>Jadwal</h3>

          <p><?= $ttlJadwal ?> Jadwal Hari ini </p>
        </div>
        <div class="icon">
          <i class="fas fa-box-open"></i>
        </div>
        <a href="<?= base_url('main/jadwal') ?>" class="small-box-footer">
          Rincian <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>


  <?php endif ?>

  <?php if (session()->idLevel == 2) : ?>
  <?php endif ?>

  <?php if (session()->idLevel == 3) : ?>
    <div class="col-lg-12 col-6">
      <!-- small card -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>Jadwal</h3>

          <p><?= $ttlJadwal ?> Jadwal Hari ini </p>
        </div>
        <div class="icon">
          <i class="fas fa-box-open"></i>
        </div>
        <a href="<?= base_url('main/jadwal') ?>" class="small-box-footer">
          Rincian <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endif ?>


</div>


<script>
  $(document).ready(function() {

    $('#home').addClass('nav-link active');

  });
</script>



<?= $this->endSection('isi') ?>
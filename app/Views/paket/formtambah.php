<?= $this->extend('main/layout') ?>



<?= $this->section('judul') ?>
<b>FORM TAMBAH paket
</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fas fa-fast-backward"></i> <b>KEMBALI</b>', [
  'class' => 'btn btn-warning',
  'onclick' => "location.href=('" . site_url('paket/index') . "')"
]) ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>


<?= form_open_multipart('paket/simpandata') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<div class="card-body">

  <div class="card-body">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">ID PAKET</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="kodepaket" name="kodepaket" placeholder="ID PAKET" autofocus>
      </div>
    </div>

    <div class="form-group row">
      <label for="text" class="col-sm-2 col-form-label">NAMA PAKET</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="namapaket" name="namapaket" placeholder="NAMA PAKET">
      </div>
    </div>


    <div class="form-group row">
      <label for="text" class="col-sm-2 col-form-label">HARGA</label>
      <div class="col-sm-6">
        <input type="number" class="form-control" id="hargapaket" name="hargapaket" placeholder="harga">
      </div>
    </div>

    <div class="form-group row">
      <label for="text" class="col-sm-2 col-form-label">KETERANGAN</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
      </div>
    </div>
    <div class="form-group row">
      <label for="text" class="col-sm-2 col-form-label">UPLOUD GAMBAR paket <i>(JIKA ADA)</i> </label>
      <div class="col-sm-6">
        <input type="file" class="form-control" id="gambar" name="gambar">
      </div>
    </div>

    <div class="form-group row">
      <label for="text" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-6">
        <input type="submit" value="Simpan" class="btn btn-success">
      </div>
    </div>




    <?= form_close() ?>

    <script>
      $(document).ready(function() {
        $('#master').addClass('nav-item menu-is-opening menu-open');
        $('#master2').addClass('nav-link active');
        $('#paket').addClass('nav-link active');

      });
    </script>

    <?= $this->endSection('isi') ?>
<?= $this->extend('main/layout') ?>



<?= $this->section('judul') ?>
<b>FORM EDIT PAKET
</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fas fa-fast-backward"></i> <b>KEMBALI</b>', [
  'class' => 'btn btn-warning',
  'onclick' => "location.href=('" . site_url('galeri/index') . "')"
]) ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>


<?= form_open_multipart('galeri/updatedata') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<?= session()->getFlashdata('erorupdate'); ?>

<div class="card-body">

  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">GAMBAR YANG SUDAH ADA <i>(JIKA ADA)</i> </label>
    <div class="col-sm-6">
      <img src="<?= base_url() . '/' . $gambar ?>" class="img-thumbnail" style="width: 20%;" alt="GAMBAR paket KOSONG">
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
      $(document).ready(function() {
        $('#master').addClass('nav-item menu-is-opening menu-open');
        $('#master2').addClass('nav-link active');
        $('#galeri').addClass('nav-link active');

      });
    });
  </script>
  <?= $this->endSection('isi') ?>
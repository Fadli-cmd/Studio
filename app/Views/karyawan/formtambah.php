<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
<b>FORM TAMBAH SATUAN
</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fas fa-fast-backward"></i> <b>KEMBALI</b>', [
  'class' => 'btn btn-warning',
  'onclick' => "location.href=('" . site_url('karyawan/index') . "')"
]) ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<?= form_open_multipart('karyawan/simpandata') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<div class="card-body">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ID KARYAWAN</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="kd" name="kd" placeholder="ID KARYAWAN" autofocus>
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">NAMA KARYAWAN</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="namakaryawan" name="namakaryawan" placeholder="NAMA KARYAWAN">
    </div>
  </div>



  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">ALAMAT</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="ALAMAT">
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">NO HP</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="nohp" name="nohp" placeholder="NO HP">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">BIDANG KERJA</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="bidang" name="bidang" placeholder="BIDANG">
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
      $('#master2').addClass('nnav-link active');
      $('#karyawan').addClass('nav-link active')
    });
  </script>


  <?= $this->endSection('isi') ?>
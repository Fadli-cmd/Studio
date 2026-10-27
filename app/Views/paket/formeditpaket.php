<?= $this->extend('main/layout') ?>



<?= $this->section('judul') ?>
<b>FORM EDIT PAKET
</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fas fa-fast-backward"></i> <b>KEMBALI</b>', [
  'class' => 'btn btn-warning',
  'onclick' => "location.href=('" . site_url('paket/index') . "')"
]) ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>


<?= form_open_multipart('paket/updatedata') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<?= session()->getFlashdata('erorupdate'); ?>

<div class="card-body">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ID Paket</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="kodepaket" name="kodepaket" placeholder="KODE paket" readonly value="<?= $kodepaket ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">NAMA paket</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="namapaket" name="namapaket" placeholder="NAMA paket" value="<?= $namapaket ?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">HARGA paket</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" id="hargapaket" name="hargapaket" placeholder="HARGA paket" value="<?= $harga ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">Keterangan Paket</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan paket" value="<?= $ket ?>">
    </div>
  </div>

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
        $('#paket').addClass('nav-link active');

      });
    });
  </script>
  <?= $this->endSection('isi') ?>
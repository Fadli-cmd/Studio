<?= $this->extend('main/layout') ?>



<?= $this->section('judul') ?>
<b>MANAJAEMEN DATA GALERI</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>


<?= form_open_multipart('galeri/simpandata') ?>
<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>

<div class="form-group row">
  <label for="text" class="col-sm-2 col-form-label">Upload Foto</label>
  <div class="col-sm-8">
    <input type="file" class="form-control" id="gambar" name="gambar">
  </div>
  <div class="col-sm-2">
    <input type="submit" value="Simpan" class="btn btn-success">
  </div>
</div>

<?= form_close() ?>


<!-- /.card-header -->
<div class="card-body p-0">
  <div class="col-sm-12mt-2">
    <div class="card">
      <div class="card-header">
        Foto TerUpload
      </div>
      <div class="card-body">
        <div class="row">
          <?php if ($tampildata) : ?>
            <?php foreach ($tampildata as $row) : ?>
              <div class="col-sm-4 p-2">
                <div class="card">
                  <div class="card-body">
                    <img src="<?= base_url() . '/' . $row['foto_galery'] ?>" class="img-thumbnail" alt="GAMBAR galery KOSONG" id="gambar">
                  </div>
                  <div class="card-footer">
                    <form method="POST" action="/galeri/hapus/<?= $row['id_galery'] ?>" Style="display:inline">
                      <button type="submit" class="btn btn-danger" title="HAPUS DATA">
                        <i class="fa fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="col-sm-4">
              <h3 class="text-danger">Data Masih Kosong</h3>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- /.card-body -->



<div class="float-center">
  <?= $pager->links('galeri', 'default_full') ?>
</div>
<script>
  function edit(id) {
    window.location = ('/galeri/edit/' + id);
  }

  function hapus(id) {
    pesan = confirm('YAKIN DATA ANDA MAU DI HAPUS ?..');
    if (pesan) {
      return true;
    } else {
      return false;
    }
  }

  $(document).ready(function() {
    $('#master').addClass('nav-item menu-is-opening menu-open');
    $('#master2').addClass('nav-link active');
    $('#galeri').addClass('nav-link active');

  });
</script>

<?= $this->endSection('isi') ?>
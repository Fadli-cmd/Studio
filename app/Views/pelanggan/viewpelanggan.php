<?= $this->extend('main/layout') ?>

<head>
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<?= $this->section('judul') ?>
<b>MANAJAEMEN DATA PELANGGAN</b>
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fas fa-plus-square"></i> <b>TAMBAH PAKET</b>', [
  'class' => 'btn btn-success',
  'onclick' => "location.href=('" . site_url('pelanggan/tambah') . "')"
]) ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<!-- CARI DATA -->

<!-- <?= form_open('pelanggan/index') ?>
<div class="input-group">
  <input type="text" class="form-control form-control-lg" placeholder="CARI DATA BARANG" name="cari" autofocus>
  <div class="input-group-append">
    <button type="submit" class="btn btn-lg btn-primary" id="tombolcari" name="tombolcari">
      <i class="fa fa-search"></i>
    </button>
  </div>
</div>
<?= form_close() ?> -->


<?= session()->getFlashdata('sukses'); ?>
<?= session()->getFlashdata('erorupdate'); ?>



<div class="card">
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table class="table table-bordered table-striped table-hover " id="tabelpelanggan">
      <thead>
        <tr>
          <th style="width: 5%"><b>No</b></th>
          <th><b>USERNAME</b></th>
          <th><b>EMAIL</b></th>
          <th style="width:20%"><b>ALAMAT</b></th>
          <th><b>NO HP</b></th>
          <th style="width:10%">
            <center><b>AKSI</b></center>
          </th>

        </tr>
      </thead>
      <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($tampildata as $row) :
        ?>

          <tr>
            <td><?= $nomor++ ?></td>

            <td><?= $row['user_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['telp'] ?></td>
            <td style="width: 15%">
              <center>
                <!-- <button type="button" class="btn btn-info" title="EDIT DATA" onclick="edit('<?= $row['idmember'] ?>')">
                  <i class="fa fa-edit"></i>
                </button> -->

                <form method="POST" action="/pelanggan/hapus/<?= $row['idmember'] ?>" Style="display:inline" onsubmit="return hapus()">
                  <input type="hidden" value="DELETE" name="_method">
                  <button type="submit" class="btn btn-danger" title="HAPUS DATA">
                    <i class="fa fa-trash-alt"></i>
                  </button>
                </form>

              </center>

            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<div class="float-center">
  <?= $pager->links('pelanggan', 'default_full') ?>
</div>

<script>
  function edit(id) {
    window.location = ('/pelanggan/formedit/' + id);
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
    $('#master2').addClass('nnav-link active');
    $('#satuan').addClass('nav-link active')
  });

  $(document).ready(function() {
    $('#tabelpelanggan').DataTable();

  });
</script>


<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</script>



<?= $this->endSection('isi') ?>
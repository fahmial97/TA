<!-- Begin Page Content -->
<div class="container-fluid">
  <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= $this->session->flashdata('success'); ?>
    </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= $this->session->flashdata('error'); ?>
    </div>
  <?php endif; ?>

  <!-- Page Heading -->
  <h1 class="h3 text-gray-800">Jadwal Ruang</h1>
  <div class="card shadow-sm mb-5">
    <div class="row no-gutters m-2 text-center">
      <div class="col-6 col-md-3 p-md-2">
        <h6 class="font-weight-bold">Hari</h6>
        <h6>Senin</h6>
      </div>
      <div class="col-6 col-md-3 p-md-2">
        <h6 class="font-weight-bold">Status<h6>
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Pilih Status</option>
              <option value="1">Buka</option>
              <option value="2">Tutup</option>
            </select>
      </div>
      <div class="col-6 col-md-2  p-md-2">
        <h6 class="font-weight-bold">Buka</h6>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Pilih Jam Buka</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <div class="col-6 col-md-2 p-md-2">
        <h6 class=" font-weight-bold">Tutup</h6>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Pilih Jam Tutup</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <div class="col-6 col-md-2 p-md-2">
        <h6 class=" font-weight-bold">Aksi</h6>
        <button class="btn btn-primary btn-sm">Button</button>
      </div>
    </div>

  </div>

  <div class="row">
    <div>
      <h3 class="col-6 h3 text-gray-800"> Ruang</h3>
    </div>

    <div class="col-6 text-right">
      <a href="<?= base_url('admin/addRuang') ?>" class="btn btn-primary btn-sm">Tambah Ruang <i class="fas fa-plus pl-2"></i></a>
    </div>
  </div>


  <table class="table table-responsive-sm ">
    <thead class="bg-info text-white">
      <?php $no = 1; ?>
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nomor ruang</th>
        <th>Status</th>
        <th>Action</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="table table-hover">
      <?php foreach ($tb_ruang as $r) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td>
            <img src="<?= base_url('asset/img/ruang/' . $r->image) ?>" width="200" />
          </td>
          <td width="150">
            <?= $r->no_ruang ?>
          </td>
          <td>
            <div class="mb-2 btn btn-sm btn-<?= statusHelpers($r->id_status)['style'] ?>"><?= statusHelpers($r->id_status)['status'] ?></div>
          </td>
          <td width="250">
            <a href="<?= site_url('admin/editRuang/' . $r->id) ?>" class="btn btn-small text-success"><i class="fas fa-edit"></i> Edit
            </a>
            <a onclick="deleteConfirm('<?= site_url('admin/deleteRuang/' . $r->id) ?>')" href="#!" class="btn btn-small text-danger">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
<!-- /.container-fluid -->

<script>
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>
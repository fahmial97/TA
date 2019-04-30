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


  <div class="row">
    <div class="col-12 col-lg-6">
      <h3 class="text-gray-800"> Ruang</h3>
    </div>
    <div class="col-12 col-lg-6">
      <div class="row">
        <div class="col-6 col-lg-4 ml-auto px-0 text-right">
          <a href="<?= base_url('admin/jadwal-ruang') ?>" class="btn btn-info btn-sm">Jam Buka <i class="far fa-calendar-alt pl-2"></i></a>
        </div>
        <div class="col-6 col-lg-4 text-right">
          <a href="<?= base_url('admin/addRuang') ?>" class="btn btn-primary btn-sm">Tambah Ruang <i class="fas fa-plus pl-2"></i></a>
        </div>
      </div>
    </div>
  </div>
  <hr class="p-0 m-0">

  <div class="row mt-4">
    <div class="col-6">
      <h5 class="text-gray-800"> <?php $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
                                  echo $hari[date("w", time())];  ?>, <?= ucfirst($status_buka->status); ?> ( <?= $status_buka->jam_buka; ?> s/d <?= $status_buka->jam_tutup; ?> )</h5>
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
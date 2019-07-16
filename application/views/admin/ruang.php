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
          <a href="<?= base_url('admin/jadwal-ruang') ?>" class="btn btn-info btn-sm">Jadwal Ruang <i class="far fa-calendar-alt pl-2"></i></a>
        </div>
        <div class="col-6 col-lg-4 text-right">
          <a href="<?= base_url('admin/tambah-ruang') ?>" class="btn btn-primary btn-sm">Tambah Ruang <i class="fas fa-plus pl-2"></i></a>
        </div>
      </div>
    </div>
  </div>
  <hr class="p-0 m-0">

  <div class="row mt-4">
    <div class="col-6">
      <h5 class="text-gray-800">
        <?php echo getHariIndonesia()[date("w", time())];  ?>,
        <?= ucfirst($status_buka->status); ?> ( <?= $status_buka->jam_buka; ?> s/d <?= $status_buka->jam_tutup; ?> )
      </h5>
    </div>
  </div>

  <table class="table table-responsive-sm ">
    <thead class="bg-info text-white">
      <?php $no = 1; ?>
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nomor ruang</th>
        <th>Action</th>
        <th colspan="2">Status</th>
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
          <!-- <td>
                  <div class="mb-2 btn btn-sm btn-<?= statusHelpers($r->id_status)['style'] ?>"><?= statusHelpers($r->id_status)['status'] ?></div>
                </td> -->
          <td width="250">
            <a href="<?= site_url('admin/edit-ruang/' . encrypt_url($r->id)); ?>" class="btn btn-small text-success"><i class="fas fa-edit"></i> Edit
            </a>
            <a onclick="deleteConfirm('<?= site_url('admin/deleteRuang/' . $r->id) ?>')" href="#!" class="btn btn-small text-danger">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
          <td>
            <?php if ($r->id_keterangan == 1) : ?>
              <input type="checkbox" class="cbx" id="cbx<?= $r->id ?>" style="display:none" value="<?= $r->id ?>" checked />
              <label for="cbx<?= $r->id ?>" class="toggleRuang"><span></span></label>
            <?php else : ?>
              <input type="checkbox" class="cbx" id="cbx<?= $r->id ?>" style="display:none" value="<?= $r->id ?>" />
              <label for="cbx<?= $r->id ?>" class="toggleRuang"><span></span></label>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($r->id_keterangan == 1) : ?>
              <i class=" fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="<?= $r->keterangan  ?>"></i>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="modalKeteranganRuang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/updateKeterangan'); ?>" method="post">
          <input type="hidden" name="idRuang" id="idRuangKeterangan">
          <div class="input-group">
            <input class="form-control" name="input_keterangan" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeBtnCheck" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>
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
    <!-- <div class="col-6 text-right">
      <h5 class="text-gray-800">24 Mei 2019 (Cuti Bersama) </h5>
    </div> -->
  </div>

  <table class="table table-responsive-sm ">
    <thead class="bg-info text-white">
      <?php $no = 1; ?>
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nomor ruang</th>
        <th>Status</th>
        <th class="text-center">Action</th>
        <th class="text-center">edit</th>



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
            <a href="<?= site_url('admin/edit-ruang/' . encrypt_url($r->id)); ?>" class="btn btn-small text-success"><i class="fas fa-edit"></i> Edit
            </a>
            <a onclick="deleteConfirm('<?= site_url('admin/deleteRuang/' . $r->id) ?>')" href="#!" class="btn btn-small text-danger">
              <i class="fas fa-trash"></i> Hapus
            </a>
          </td>
          <td>
            <select class="custom-select" name="status" id="status">
              <?php foreach ($status as $s) : ?>
                <?php if ($r->id_status == $s->id) : ?>
                  <option value="<?= $s->id ?>" selected><?= $s->nama_status ?></option>
                <?php else : ?>
                  <option value="<?= $s->id ?>"><?= $s->nama_status ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
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
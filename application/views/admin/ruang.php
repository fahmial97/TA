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
    <div class="col-6 col-lg-6">
      <h3 class="text-gray-800"> Ruang</h3>
    </div>

    <div class="col-6">
      <div class="row">
        <div class="col-4 ml-auto px-0 text-right">
        <a href="#" data-toggle="modal" data-target="#modal-jamBuka" class="btn btn-primary btn-sm">Jam Buka <i class="far fa-calendar-alt pl-2"></i></a>
        </div>
        <div class="col-4 text-right">
          <a href="<?= base_url('admin/addRuang') ?>" class="btn btn-primary btn-sm">Tambah Ruang <i class="fas fa-plus pl-2"></i></a>
        </div>
      </div>
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
<div class="modal fade" id="modal-jamBuka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title h3 text-gray-800">Jadwal Ruang</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Page Heading -->
        <?php foreach($jam_buka as $jam) : ?>
        <div class="card shadow-sm mb-5">
          <div class="row no-gutters m-2 text-center">
            <div class="col-6 col-md-1 p-md-2">
              <h6 class="font-weight-bold">Hari</h6>
              <h6><?= ucfirst($jam->hari) ?></h6>
            </div>
            <div class="col-6 col-md-2 p-md-2">
              <h6 class="font-weight-bold">Status<h6>
                  <select class="custom-select" id="inputGroupSelect01" disabled>
                    <option>Pilih Status</option>
                    
                    <?php foreach($status_buka as $buka) : ?>
                      <?php if($jam->status == $buka) : ?>
                        <option value="<?= $buka; ?>" selected><?= ucfirst($buka); ?></option>
                      <?php else : ?>
                        <option value="<?= $buka; ?>"><?= ucfirst($buka); ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>

                  </select>
            </div>
            <div class="col-6 col-md-4  p-md-2">
              <h6 class="font-weight-bold">Buka</h6>
              <div class="row">
                <div class="col-6">
                  <select class="custom-select" id="inputGroupSelect01" disabled>
                    <option>Pilih Jam Buka</option>
                    
                    <?php $jamBuka = substr($jam->jam_buka,0,2);
                          $menitBuka = substr($jam->jam_buka,-1,2);
                    for ($i=0; $i <= 23; $i++) : ?>
                      <?php if($i < 10) : ?>
                        <?php if($jamBuka == '0'.$i) : ?>
                          <option value="<?= '0'.$i; ?>" selected><?= '0'.$i; ?></option>
                        <?php else : ?>
                          <option value="<?= '0'.$i; ?>"><?= '0'.$i; ?></option>
                        <?php endif; ?>
                      <?php else : ?>
                        <?php if($jamBuka == $i) : ?>
                          <option value="<?= $i; ?>" selected><?= $i; ?></option>
                        <?php else : ?>
                          <option value="<?= $i; ?>"><?=$i; ?></option>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="col-6">
                  <select class="custom-select" id="inputGroupSelect01" disabled>
                    <option>Pilih Menit Buka</option>
                    <?php for ($i=0; $i <= 59; $i++) : ?>
                      <?php if($i < 10) : ?>
                        <?php if($menitBuka == '0'.$i) : ?>
                          <option value="<?= '0'.$i; ?>" selected><?= '0'.$i; ?></option>
                        <?php else : ?>
                          <option value="<?= '0'.$i; ?>"><?= '0'.$i; ?></option>
                        <?php endif; ?>
                      <?php else : ?>
                        <?php if($menitBuka == $i) : ?>
                          <option value="<?= $i; ?>" selected><?= $i; ?></option>
                        <?php else : ?>
                          <option value="<?= $i; ?>"><?=$i; ?></option>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 p-md-2">
              <h6 class=" font-weight-bold">Tutup</h6>
              <div class="row">
                <div class="col-6">
                  <select class="custom-select" id="inputGroupSelect01" disabled>
                    <option>Pilih Jam Tutup</option>
                    
                    <?php $jamTutup = substr($jam->jam_tutup,0,2);
                          $menitTutup = substr($jam->jam_tutup,-1,2);
                    for ($i=0; $i <= 23; $i++) : ?>
                      <?php if($i < 10) : ?>
                        <?php if($jamTutup == '0'.$i) : ?>
                          <option value="<?= '0'.$i; ?>" selected><?= '0'.$i; ?></option>
                        <?php else : ?>
                          <option value="<?= '0'.$i; ?>"><?= '0'.$i; ?></option>
                        <?php endif; ?>
                      <?php else : ?>
                        <?php if($jamTutup == $i) : ?>
                          <option value="<?= $i; ?>" selected><?= $i; ?></option>
                        <?php else : ?>
                          <option value="<?= $i; ?>"><?=$i; ?></option>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="col-6">
                  <select class="custom-select" id="inputGroupSelect01" disabled>
                    <option>Pilih Menit Tutup</option>
                    <?php for ($i=0; $i <= 59; $i++) : ?>
                      <?php if($i < 10) : ?>
                        <?php if($menitTutup == '0'.$i) : ?>
                          <option value="<?= '0'.$i; ?>" selected><?= '0'.$i; ?></option>
                        <?php else : ?>
                          <option value="<?= '0'.$i; ?>"><?= '0'.$i; ?></option>
                        <?php endif; ?>
                      <?php else : ?>
                        <?php if($menitTutup == $i) : ?>
                          <option value="<?= $i; ?>" selected><?= $i; ?></option>
                        <?php else : ?>
                          <option value="<?= $i; ?>"><?=$i; ?></option>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-1 p-md-2">
              <h6 class=" font-weight-bold">Aksi</h6>
              <button class="btn btn-primary btn-sm">Ubah</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

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
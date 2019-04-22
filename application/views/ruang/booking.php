<div class="container">
  <h4 class="text-center m-3 m-sm-5 ">Masukkan Data Peminjam</h4>
  <form method="post" enctype="multipart/form-data" action="<?php if ($dataBooking->id_status == 1) {
                                                              echo base_url('ruang/bookingRuang');
                                                            } else {
                                                              echo base_url('ruang/pesanRuang');
                                                            } ?>">
    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img class="card-img" src="<?= base_url('asset/img/ruang/' . $dataBooking->image) ?>" />
        </div>
        <div class="col-md-8">
          <div class="card-body text-center">
            <h5 class="card-title text-center"><?= $dataBooking->no_ruang ?></h5>
            <div class="btn btn-sm btn-<?= statusHelpers($dataBooking->id_status)['style'] ?> mb-3">
              <?= statusHelpers($dataBooking->id_status)['status'] ?>
            </div>
            <input type="hidden" name="id" value="<?= $dataBooking->id ?>">
            <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
            <input type="hidden" name="id_status" value="<?= $dataBooking->id_status ?>">

            <div class="row mb-3">
              <h6 class="pl-3 pt-md-2">Data 1 :</h6>
              <div class="col-sm mb-2">
                <input type="text" class="form-control" placeholder="Nama" value="<?= $user['nama'] ?>" readonly>
              </div>
              <div class="col-sm mb-2">
                <input type="text" class="form-control" placeholder="Nama" value="<?= $user['nim'] ?>" readonly>
              </div>
              <div class="col-sm mb-2">
                <input type="text" class="form-control" placeholder="Nama" value="<?= $user['no_telpon'] ?>" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <h6 class="pl-3 pt-md-2">Data 2 :</h6>
              <div class="col-sm mb-2">
                <input type="text" class="form-control form-control-user" id="fullname" name="nama_pinjam[]" placeholder="Nama" required>
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col-sm mb-2">
                <input type="number" class="form-control form-control-user" id="nim" name="nim_pinjam[]" placeholder="NIM" required>
                <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col-sm mb-2">
                <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon_pinjam[]" placeholder="Nomor Telepon" required>
              </div>
            </div>
            <div class="row mb-3">
              <h6 class="pl-3 pt-md-2">Data 3 :</h6>
              <div class="col-sm mb-2">
                <input type="text" class="form-control form-control-user" id="fullname" name="nama_pinjam[]" placeholder="Nama" required>
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col-sm mb-2">
                <input type="number" class="form-control form-control-user" id="nim" name="nim_pinjam[]" placeholder="NIM" required>
                <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="col-sm mb-2">
                <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon_pinjam[]" placeholder="Nomor Telepon" required>
              </div>
            </div>
            <div class="insert-form">
            </div>
            <hr>
            <input type="hidden" name="no-data" value="3">
            <div class="row pl-3">
              <div class="list-btn-hidden pr-2">
                <button type="button" id="btn-tambah-form" class="btn btn-info btn-sm"><i class="fas fa-plus-square pr-1"></i>Tambah Data</button>
              </div>
              <div class="list-reset d-none">
                <button type="button" id="btn-reset-form" class="btn btn-danger btn-sm"><i class="fas fa-minus-square pr-1"></i>Reset Data</button>
              </div>
            </div>
            <?php if ($dataBooking->id_status == 1) {
              echo '<div class="text-right mt-3">
                    <input type="submit" class="btn btn-success" value="Pinjam">
                    </div>';
            } else {
              echo '<div class="text-right mt-3">
               
                    <input type="submit" class="btn btn-success" value="Pesan">
                    </div>';
            } ?>

            <input type="hidden" id="jumlah-form" value="2">

          </div>
        </div>
      </div>
    </div>

  </form>

</div>
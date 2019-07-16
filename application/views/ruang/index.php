<div class="container">
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

  <div class="container">
    <div>
      <h5 class="text-gray-800">
        <?= getHariIndonesia()[date('w')] ?> (<?= $waktu_ruang->jam_buka; ?> s/d <?= $waktu_ruang->jam_tutup; ?>)
      </h5>
    </div>
    <hr>

    <!-- belom bisa -->
    <?php if ((date('h:i') < $waktu_ruang->jam_buka) && (date('h:i') > $waktu_ruang->jam_tutup)) : ?>
      <div>
        <h5>Ruang Sedang tutup</h5>
      </div>
    <?php endif; ?>

    <?php if ($waktu_ruang->libur == 0) :  ?>
      <?php foreach ($tb_ruang as $r) : ?>
        <?php if ($r->id_status == 1 || $r->id_status == 3) { ?>
          <div class="card mb-4 shadow">
            <div class="row no-gutters">
              <?php if ($r->id_keterangan == 0) { ?>
                <div class="col-md-3">
                  <img class="card-img-top" src="<?= base_url('asset/img/ruang/' . $r->image) ?>" max_width="500" />
                </div>
                <div class="col-md-9 text-center text-md-left">
                  <div class="card-body ">
                    <h4 class="card-title border-bottom "> <?= $r->no_ruang ?></h4>
                    <div class="mb-2 btn btn-sm btn-<?= statusHelpers($r->id_status)['style'] ?>">
                      <?= statusHelpers($r->id_status)['status'] ?>
                    </div>
                    <div class="waktu">
                      <?php if ($r->id_status == 3) {
                        echo 'Waktu Selesai : ' . date('H : i', getDataHitungMundur($r->id));
                      }
                      ?>
                    </div>
                    <div class="text-md-right pt-md-5 pl-md-5 ">
                      <a class="btn btn-info" href=" <?= base_url('ruang/booking/') ?><?= encrypt_url($r->id) ?>">
                        <i class="far fa-bookmark pr-2"></i> Pinjam
                      </a>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
        <?php } elseif ($r->id_keterangan == 1) {  ?>
          <div class="card mb-4 shadow ">
            <div class="row no-gutters">
              <div class="col-md-3">
                <img class="card-img-top" src="<?= base_url('asset/img/ruang/' . $r->image) ?>" max_width="500" />
              </div>
              <div class="col-md-9 text-center text-md-left">
                <div class="card-body ">
                  <h4 class="card-title border-bottom "> <?= $r->no_ruang ?></h4>
                  <div class="mb-2 btn btn-sm btn-<?= statusHelpers($r->id_status = 4)['style'] ?>">
                    <?= statusHelpers($r->id_status = 4)['status'] ?>
                  </div>
                  <div>
                    <h6> <?= $r->keterangan; ?></h6>
                  </div>
                  <div class="text-md-right pt-md-3 pl-md-5 ">
                    <a class="btn btn-info disabled" href=" <?= base_url('ruang/booking/') ?><?= encrypt_url($r->id) ?>" disabled>
                      <i class="far fa-bookmark pr-2"></i> Pinjam
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        <?php } else { ?>
          <div class="card mb-4 shadow">
            <div class="row no-gutters">

              <div class="col-md-3">
                <img class="card-img-top" src="<?= base_url('asset/img/ruang/' . prosesHelpers($r->id_ruang)['gambar']) ?>" max_width="500" />
              </div>
              <div class="col-md-9 text-center text-md-left">
                <div class="card-body ">
                  <h4 class="card-title border-bottom "><?= prosesHelpers($r->id_ruang)['no_ruang'] ?></h4>

                  <h6 class="timer ">
                    <?php
                    $deadline = $r->jam_pinjam;
                    $tampil =  $deadline + 600 - time();
                    if ($tampil > 0) {
                      echo '<b>Sisa Waktu Konfirmasi Peminjaman Ruangan</b>';
                      echo '<p class="d-none">  ' . $tampil . '</p>';
                    }
                    ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php endforeach; ?>

    <?php else :  ?>
      <div class="text-center">
        <i class="fas fa-times-circle fa-10x py-5 text-danger"></i>
        <h2>Hari Libur, Ruangan Tidak Dibuka</h2>
      </div>
    <?php endif;  ?>

    <?php if ($nonAktif['validasi'] == 1) : ?>
      <?php foreach ($nonAktif['data'] as $non) : ?>
        <div class="card mb-4 shadow ">
          <div class="row no-gutters">
            <div class="col-md-3">
              <img class="card-img-top" src="<?= base_url('asset/img/ruang/' . $non->image) ?>" max_width="500" />
            </div>
            <div class="col-md-9 text-center text-md-left">
              <div class="card-body ">
                <h4 class="card-title border-bottom "> <?= $non->no_ruang ?></h4>
                <div class="mb-2 btn btn-sm btn-<?= statusHelpers($non->id_status = 4)['style'] ?>">
                  <?= statusHelpers($non->id_status = 4)['status'] ?>
                </div>
                <div class="row">
                  <h6 class="col-6">
                    <marquee>
                      <?= $non->keterangan; ?> &nbsp; &nbsp; &nbsp; &nbsp;
                    </marquee>
                  </h6>
                </div>
                <div class="text-md-right pt-md-3 pl-md-5 ">
                  <a class="btn btn-info disabled" href=" <?= base_url('ruang/booking/') ?><?= encrypt_url($non->id) ?>" disabled>
                    <i class="far fa-bookmark pr-2"></i> Pinjam
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <br class="d-sm-block">

  </div>
  <!--container-->
</div>
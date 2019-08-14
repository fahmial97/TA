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


    <?php if ($waktu_ruang->libur == 0) :  ?>
      <?php if (date('H:i') > $waktu_ruang->jam_buka && date('H:i') < $waktu_ruang->jam_tutup) : ?>
     
        <?php foreach ($tb_ruang as $r) : ?> 

          <?php if ($r->id_status == 1 || $r->id_status == 3) { ?>
            <?php if ($r->id_status == 3) : ?>
              <div class=" my-5 rounded" style="background-color : #5691c7">
                <div class="py-3 text-white container">
                  <div class="row">
                    <div class="col-sm-2 pl-lg-5">
                      <i class="far fa-frown-open fa-5x"></i>
                    </div>
                    <div class="col-sm-10 pt-2">
                      <h2>Ruang telah Penuh</h2>
                      <h6>Saat ini semua ruang sedang digunakan </h6>
                      <hr class="m-0" style="background-color:white;">
                      <i class="pt-1" style="font-size:14px;">
                        dibawah ini adalah ruang dengan waktu tunggu paling cepat
                      </i>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

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
          <?php } else { ?>
            <div class=" my-5 rounded" style="background-color:	#f0a413; opacity: 0.93;">
              <div class="py-3 text-dark container">
                <div class="row">
                  <div class="col-sm-2 pl-lg-5">
                    <i class="far fa-meh fa-5x"></i>
                  </div>
                  <div class="col-sm-10 pt-2">
                    <h2>Ruang Kosong tidak tersedia</h2>
                    <h6>Saat ini semua ruang sedang dalam proses peminjaman </h6>
                  </div>
                </div>
              </div>
            </div>

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
                        <i class="far fa-bookmark pr-2"></i> pinjam
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>

      <?php else :  ?>
        <div class="row">
          <div class="col text-center">
            <i class="fas fa-door-closed fa-8x mt-5 text-danger"></i>
            <h2 class="mt-4">Perpustakaan Sedang Tutup</h2>
          </div>
        </div>
      <?php endif;  ?>
    <?php else : ?>

      <div class="text-center">
        <i class="fas fa-times-circle fa-10x py-5 text-danger"></i>
        <h2>Hari Libur, Ruangan Tidak Dibuka</h2>
      </div>
    <?php endif; ?>


    <br class="d-sm-block">

  </div>
  <!--container-->
</div>
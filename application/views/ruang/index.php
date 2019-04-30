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
      <h5 class="text-gray-800"> <?= getHariIndonesia()[date('w')] ?>, <?= ucfirst($waktu_ruang->status); ?> ( <?= $waktu_ruang->jam_buka; ?> s/d <?= $waktu_ruang->jam_tutup; ?> )</h5>
    </div>
    <hr>
    <?php foreach ($tb_ruang as $r) : ?>
      <?php if ($r->id_status == 1 || $r->id_status == 3) { ?>
        <div class="card mb-4 shadow">
          <div class="row no-gutters">
            <div class="col-md-3">
              <img class="card-img-top" src="<?= base_url('asset/img/ruang/' . $r->image) ?>" max_width="500" />
            </div>
            <div class="col-md-9 text-center text-md-left">
              <div class="card-body ">
                <h4 class="card-title border-bottom "> <?= $r->no_ruang ?></h4>
                <div class="mb-2 btn btn-sm btn-<?= statusHelpers($r->id_status)['style'] ?>"><?= statusHelpers($r->id_status)['status'] ?></div>
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
        <!-- <h6 class="text-center">Ruang Diatas adalah ruang dengan Waktu Tunggu Tercepat</h6> -->

      <?php } ?>
    <?php endforeach; ?>

    <br class="d-sm-block">

  </div>
  <!--container-->
</div>
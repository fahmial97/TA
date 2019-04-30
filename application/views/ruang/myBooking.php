<div class="col-9 offset-3 col-md-2 offset-md-9 ">
  <p>
    <span class="jam"></span>
  </p>
</div>
<div class="container">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Ruang Pinjaman Anda</h1>
  <?php $no = 1; ?>
  <?php $nonama = 1; ?>
  <?php foreach ($proses['peminjaman'] as $pp) : ?>
    <div class="card shadow-sm mb-5">
      <div class="card-header border-info text-center">
        <div class="row">
          <div class="col-2 pl-md-5">
            #<?= $no++; ?>
          </div>
          <div class="col-10">
            <h5 class="pr-3"> <?= prosesHelpers($pp['id_ruang'])['no_ruang'] ?></h5>
          </div>
        </div>
      </div>

      <div class="row text-md-center">
        <div class="col-3 pt-1 pr-2 col-md-3">
          <img src="<?= base_url('asset/img/ruang/') . prosesHelpers($pp['id_ruang'])['gambar'] ?>" class="w-100" />
        </div>
        <div class="col-3 p-2 p-md-4">
          <h6 class="text-primary font-md-weight-bold">Tanggal</h6>
          <h6>
            <?php
            $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
            $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            echo $hari[date("w", $pp['jam_pinjam'])] . ", <br>" . date("j ", $pp['jam_pinjam']);
            echo $bulan[date("n", $pp['jam_pinjam'])] . "  " . date("Y");
            ?>
          </h6>

        </div>
        <div class="col-3 p-2 p-md-4">
          <h6 class="text-success">Mulai</h6>
          <h6><?= date('H:i', $pp['jam_pinjam']); ?></h6>
        </div>
        <div class="col-3 p-2 p-md-4">
          <h6 class="text-danger">Selesai</h6>
          <h6><?= date('H:i', $pp['jam_selesai']); ?></h6>
        </div>
        <hr class="w-75">
      </div>

      <div class="row p-2 pl-3 pl-md-5">
        <div class="col-6 col-md-3">
          <h6 class="font-weight-bold">Nama</h6>
          <?= ' 1. ' . $user['nama'] ?> <br>
          <?php
          $i = 2;
          $data = $pp['nama_pinjam'];
          $dataExplode = explode(",", $data);
          array_pop($dataExplode);
          foreach ($dataExplode as $value) {
            echo $i . '. ' . $value . '<br>';
            $i++;
          }
          ?>
        </div>
        <div class="col-6 col-md-3">
          <h6 class="font-weight-bold">NIM</h6>
          <?= '1. ' . $user['nim'] ?> <br>
          <?php
          $i = 2;
          $data = $pp['nim_pinjam'];
          $dataExplode = explode(",", $data);
          array_pop($dataExplode);
          foreach ($dataExplode as $value) {
            echo  $i . '. '  . $value . '<br>';
            $i++;
          }
          ?>
        </div>
        <div class="col-6 col-md-3 pt-2 pt-md-0">
          <h6 class="font-weight-bold">No.Telpon</h6>
          <?= '1. ' . $user['no_telpon'] ?> <br>
          <?php
          $i = 2;
          $data = $pp['no_telpon_pinjam'];
          $dataExplode = explode(",", $data);
          array_pop($dataExplode);
          foreach ($dataExplode as $value) {
            echo  $i . '. '  . $value . '<br>';
            $i++;
          }
          ?>
        </div>
        <div class="col-6 col-md-3 pt-2 pt-md-0">
          <h6 class="font-weight-bold">Status</h6>
          <div class="btn btn-sm btn-<?= statusHelpers($pp['id_status'])['style'] ?>">
            <?= statusHelpers($pp['id_status'])['status'] ?>
          </div>
        </div>

        <hr class="w-75 pb-0 mb-0">
        <div class="col-12 pt-2 text-center pr-md-5">
          <div class="timer">
            <?php
            $deadline = $pp['jam_pinjam'];
            $jam_selesai = $pp['jam_selesai'];
            $id = $pp['id_status'];
            if ($id == 5) {
              $tampil =  $deadline + 600 - time();
              if ($tampil > 0) {
                echo '<b>Waktu Tunggu</b>';
                echo '<p class="d-none">  ' . $tampil . '</p>';
              }
            } else if ($id == 3) {
              $tampil_selesai = $jam_selesai - time();
              if ($tampil_selesai > 0) {
                echo '<b>waktu penggunaan</b>';
                echo '<p class="d-none"> ' . $tampil_selesai . '</p>';
              }
            }
            ?>
          </div>
        </div>

      </div> <!-- Row -->
    </div> <!-- Card -->
  <?php endforeach; ?>

  <?php if ($proses['peminjaman'] == null) : ?>
    <?php
    echo '
            <div class="text-center m-5">
            <br><br>
              <h3>Ruang Pinjaman Anda Kosong <i class="far fa-sad-tear pr-2"></i></h3>
              <hr class="w-75">
              <a href="' . base_url('ruang') . '">Pinjam Ruang <i class="fas fa-caret-right"></i></a> <br><br><br><br><br><br><br>
            </div>
             ';
    ?>
  <?php endif; ?>

</div> <!-- /container-->








<!-- <div>
  <?php
  $id = $pp->id_status;
  if ($id == 5) {
    echo '<a href="' . base_url('validasi/confirm/') . $pp->id;
    '" class="btn btn-primary btn-sm">Confirm</a>';
    echo '<a href="' . base_url('validasi/selesai/') . $pp->id;
    '" class="btn btn-success btn-sm mt-2">Selesai</a>';
  } else {
    echo '<a href="' . base_url('validasi/cancel/') . $pp->id;
    '" class="btn btn-danger btn-sm mt-2">Cancel</a>';
  }
  ?>
</div> -->
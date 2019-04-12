<div class="col-9 offset-3 col-md-2 offset-md-9 ">
  <p>
    <span class="jam"></span>
  </p>
</div>
<div class="container">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Ruang Pinjaman Anda</h1>
  <div class="row no-gutters">
    <div class="col">
      <table class="table table-responsive table-striped">
        <thead class="bg-info text-white">
          <?php $no = 1; ?>
          <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>No Ruang</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>No Telpon</th>
            <th>Status</th>
            <th width="10%">Deadline</th>
          </tr>
        </thead>
        <tbody class="table table-hover">
          <?php foreach ($proses['peminjaman'] as $pp) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td>
                <img src="<?= base_url('asset/img/ruang/') . prosesHelpers($pp['id_ruang'])['gambar'] ?>" width="100" />

              </td>
              <td>
                <?= prosesHelpers($pp['id_ruang'])['no_ruang'] ?>
              </td>
              <td>
                <?= date('H:i', $pp['jam_pinjam']); ?>
              </td>
              <td>
                <?= date('H:i', $pp['jam_selesai']); ?>
              </td>
              <td>
                <?= $user['nama'] ?> <br>
                <?php
                $data = $pp['nama_pinjam'];
                $data = explode(",", $data);
                foreach ($data as $value) {
                  echo '' . $value . '<br>';
                }
                ?>
              </td>
              <td>

                <?= $user['nim'] ?> <br>
                <?php
                $data = $pp['nim_pinjam'];
                $data = explode(",", $data);
                foreach ($data as $key => $value) {
                  echo '' . $value . '<br>';
                }
                ?>
              </td>
              <td>
                <?= $user['no_telpon'] ?> <br>
                <?php
                $data = $pp['no_telpon_pinjam'];
                $data = explode(",", $data);
                foreach ($data as $key => $value) {
                  echo '' . $value . '<br>';
                }
                ?>
              </td>
              <td>
                <div class="badge p-2 <?= statusHelpers($pp['id_status'])['style'] ?>">
                  <?= statusHelpers($pp['id_status'])['status'] ?>
                </div>
              </td>
              <td class="timer">
                <?php
                $deadline = $pp['jam_pinjam'];
                $jam_selesi = $pp['jam_selesai'];
                $id = $pp['id_status'];
                if ($id == 5) {
                  $tampil =  $deadline + 600 - time();
                  if ($tampil > 0) {
                    echo '<p>' . $tampil . '</p>';
                  }
                } else if ($id == 3) {
                  $tampil_selesai = $jam_selesi - time();
                  if ($tampil_selesai > 0) {
                    echo '<p>' . $tampil_selesai . '</p>';
                  }
                }

                ?>
              </td>
            </tr>
          <?php endforeach; ?>



        </tbody>
      </table>
      <?php if ($proses['peminjaman'] == null) : ?>
        <?php echo 'maaf anda belum pernah meminjam ruang' ?>
      <?php endif; ?>

    </div>
  </div>


</div> <!-- /container-->
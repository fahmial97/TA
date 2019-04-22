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


    <!-- Page Heading -->
    <h1 class="h3 text-gray-800">History Peminjaman</h1>
    <table class="table table-responsive table-striped">
      <thead class="bg-info text-white">
        <?php  ?>
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>No Ruang</th>
          <th>Tanggal</th>
          <th style="width:100px;">Jam Mulai</th>
          <th>Jam Selesai</th>
          <th style="width:150px;">Nama</th>
          <th style="width:150px;">Nim</th>
          <th>No Telpon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table table-hover">
        <?php $no = $offset + 1;
        foreach ($proses_peminjaman as $pp) : ?>
          <tr>
            <td><?= $no++; ?></td>

            <td>
              <img src="<?= base_url('asset/img/ruang/' . prosesHelpers($pp->id_ruang)['gambar']) ?>" width="60" />

            </td>
            <td>
              <?= prosesHelpers($pp->id_ruang)['no_ruang'] ?>
            </td>
            <td>
              <?php
              $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
              $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
              echo $hari[date("w", $pp->jam_pinjam)] . ", <br>" . date("j ", $pp->jam_pinjam);
              echo $bulan[date("n", $pp->jam_pinjam)] . "  " . date("Y");
              ?>
            </td>
            <td>
              <?= date('H : i', $pp->jam_pinjam); ?>
            </td>
            <td>
              <?= date('H : i', $pp->jam_selesai); ?>
            </td>
            <td>
              <?= ' 1) ' . getUserHelpers($pp->id_user)['nama'] ?> <br>
              <?php
              $i = 2;
              $data = $pp->nama_pinjam;
              $dataExplode = explode(",", $data);
              array_pop($dataExplode);
              foreach ($dataExplode as $value) {
                echo $i . ') ' . $value . '<br>';
                $i++;
              }
              ?>

            </td>
            <td>
              <?= ' 1) ' . getUserHelpers($pp->id_user)['nim'] ?> <br>
              <?php
              $i = 2;
              $data = $pp->nim_pinjam;
              $dataExplode = explode(",", $data);
              array_pop($dataExplode);
              foreach ($dataExplode as $value) {
                echo $i . ') ' . $value . '<br>';
                $i++;
              }
              ?>
            </td>
            <td>
              <?= ' 1) ' . getUserHelpers($pp->id_user)['no_telpon'] ?> <br>
              <?php
              $i = 2;
              $data = $pp->no_telpon_pinjam;
              $dataExplode = explode(",", $data);
              array_pop($dataExplode);
              foreach ($dataExplode as $value) {
                echo $i . ') ' . $value . '<br>';
                $i++;
              }
              ?>
            </td>
            <td>
              <a onclick="deleteConfirm('<?= site_url('ruang/deleteDataBooking/' . $pp->id) ?>')" href="#!" class="btn btn-small text-danger">
                <i class="fas fa-trash"></i> Hapus
              </a>
            </td>
            </td>
          </tr>
        <?php endforeach; ?>


      </tbody>
    </table>
    <div class="justify-content-center d-flex">
      <?php echo $page; ?>
    </div>
  </div>
  <!-- /.container-fluid -->

  <!-- Modal Delete Peminjaman Ruang -->
  <div class="modal fade" id="deletePeminjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Ruang Peminjaman yang dihapus tidak akan bisa dikembalikan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a id="btn-deletePeminjaman" class="btn btn-danger" href="#">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deleteConfirm(url) {
      $('#btn-deletePeminjaman').attr('href', url);
      $('#deletePeminjaman').modal();
    }
  </script>
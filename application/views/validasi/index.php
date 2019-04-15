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
  <h1 class="h3 text-gray-800">Validasi Peminjaman</h1>
  <table class="table table-responsive table-striped">
    <thead class="bg-info text-white">
      <?php $no = 1; ?>
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
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="table table-hover">
      <?php foreach ($proses_peminjaman as $pp) : ?>
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
            <div class="text-<?= statusHelpers($pp->id_status)['style'] ?>">
              <?= statusHelpers($pp->id_status)['status'] ?>
            </div>
          </td>
          <td class="aksi-td">
            <?php
            $ids = $pp->id_status;
            if ($ids == 5) {
              echo '<a href="' . site_url('validasi/confirm/') . $pp->id . '" class="btn btn-primary btn-sm UpdateModal">
              Confirm</a> <br>';
              echo '<a href="' . site_url('validasi/cancel/') . $pp->id . '"  class="btn btn-danger btn-sm mt-2 UpdateModal">Cancel</a>';
            } else if ($ids == 3) {
              echo '<a href="' . site_url('validasi/selesai/') . $pp->id . '" class="btn btn-success btn-sm mt-2 UpdateModal">
                  Selesai </a>';
            } else {
              echo '<b> - </b>';
            }
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- /.container-fluid -->




<div class="modal fade" id="ModalStatus" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal"></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-success" href="#" id="btn-StatusModal"></a>
      </div>
    </div>
  </div>
</div>
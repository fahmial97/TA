  <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
          </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error'); ?>
          </div>
          <?php endif; ?>

          <!-- Page Heading -->
          <h1 class="h3 text-gray-800">Riwayat Peminjaman</h1>
                <table class="table table-responsive ">
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
									</tr>
								</thead>
								<tbody class="table table-hover">
									<?php foreach ($proses_peminjaman as $pp): ?>
									<tr>
                    <td><?= $no++; ?></td>
                    <td>
                      <img src="<?= base_url('asset/img/ruang/'.$pp->image) ?>" width="100" />

                    </td>
                    <td>
											<?= $pp->no_ruang ?>
										</td>
										<td>
											<?= date('H:i',$pp->jam_pinjam);?>
										</td>
										<td>
											<?= date('H:i',$pp->jam_selesai); ?>
										</td>
                    <td>
                      <?= $pp->nama?> <br>
                      <?php
                          $data = $pp->nama_pinjam;
                          $data = explode (",",$data);
                          foreach ($data as $key => $value) {
                          echo ''.$value.'<br>';
                          }
                        ?>
                    </td>
                    <td>
                      <?= $pp->nim?> <br>
                      <?php
                          $data = $pp->nim_pinjam;
                          $data = explode (",",$data);
                          foreach ($data as $key => $value) {
                          echo ''.$value.'<br>';
                          }
                        ?>
                    </td>
                    <td>
                      <?= $pp->no_telpon?> <br>
                      <?php
                          $data = $pp->no_telpon_pinjam;
                          $data = explode (",",$data);
                          foreach ($data as $key => $value) {
                          echo ''.$value.'<br>';
                          }
                        ?>
                    </td>
									</tr>
									<?php endforeach; ?>

								</tbody>
                   </table>
        </div>
        <!-- /.container-fluid -->

        <script>
          function deleteConfirm(url){
          	$('#btn-delete').attr('href', url);
          	$('#deleteModal').modal();
          }
        </script>

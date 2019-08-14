<div class="container">
  <h4 class="mb-3">Dashboard Admin</h4>

  <div class="row">
    <!-- ruang -->
    <div class="col-md-4 col-12 p-3">
      <a href="<?= base_url('admin/ruang') ?>" style="text-decoration:none">
        <div class="card border-left-info shadow-sm h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-info text-uppercase mb-1">Ruang</div>
                <h2 class="p-2 mb-0 font-weight-bold text-gray-800"> <?= $tb_ruang ?></h2>
              </div>
              <div class="col-auto">
                <i class="fas fa-chair fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- validasi -->
    <div class="col-md-4 col-12 p-3">
      <a href="<?= base_url('admin/validasi') ?>" style="text-decoration:none">
        <div class="card border-left-info shadow-sm h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-info text-uppercase mb-1">Ruang digunakan</div>
                <h2 class="p-2 mb-0 font-weight-bold text-gray-800"><?= $sedang_digunakan ?> </h2>
              </div>
              <div class="col-auto">
                <i class="fas fa-vote-yea fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- histori-peminjaman -->
    <div class="col-md-4 col-12  p-3">
      <a href="<?= base_url('admin/validasi') ?>" style="text-decoration:none">
        <div class="card border-left-info shadow-sm h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-info text-uppercase mb-1">Proses Peminjaman</div>
                <h2 class="p-2 mb-0 font-weight-bold text-gray-800"><?= $proses ?> </h2>
              </div>
              <div class="col-auto">
                <i class="fas fa-history fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>


    <!-- mahasiswa -->
    <div class="col-md-6 col-12  p-3">
      <a href="<?= base_url('admin/mahasiswa') ?>" style="text-decoration:none">
        <div class="card border-left-success shadow-sm h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="font-weight-bold text-success text-uppercase mb-1">Mahasiswa</div>
                <h2 class=" p-2 mb-0 font-weight-bold text-gray-800"><?= $user ?></h2>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-3x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!---admin -->
    <?php if ($this->session->userdata('role_id') == 1) : ?>
      <div class="col-md-6 col-12  p-3">
        <a href="<?= base_url('admin/list-admin') ?>" style="text-decoration:none">
          <div class="card border-left-warning shadow-sm h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-warning text-uppercase mb-1">Admin</div>
                  <h2 class="p-2 mb-0 font-weight-bold text-gray-800"><?= $admin ?></h2>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user-cog fa-3x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php else : ?>
      <div class="d-none"></div>
    <?php endif; ?>


  </div>

</div>
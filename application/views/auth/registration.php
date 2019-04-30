<div class="container">
  <div class="text-center pt-4" href="<?= base_url(); ?>">
    <img src="<?= base_url('asset/img/logo_ruang.png') ?>" style="width:200px" alt="">
  </div>

  <div class="card o-hidden border-0 shadow-lg my-2 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">

          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Halaman Register</h1>
            </div>

            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
              <div class="form-group">
                <input type="number" class="form-control form-control-user" id="nim" name="nim" placeholder="NIM" value="<?= set_value('nim'); ?>">
                <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="fullname" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select class="custom-select" name="fakultas" id="fakultas" value="<?= set_value('fakultas'); ?>">
                  <option selected>Pilih Fakultas</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <?= form_error('fakultas', '<small class="text-danger">', '</small>'); ?>

                <!-- <input type="text" class="form-control form-control-user" id="fakultas" name="fakultas" placeholder="Fakultas" value="<?= set_value('fakultas'); ?>"> -->
              </div>
              <div class="form-group">
                <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon" placeholder="Nomor Telepon" value="<?= set_value('no_telpon'); ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-user btn-block">
                Register
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login Disini!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
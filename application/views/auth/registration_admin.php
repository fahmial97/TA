
  <div class="container">
    <div class="text-center pt-4" href="<?= base_url();?>">
      <img src="<?=base_url('asset/img/logo_ruang.png') ?>"style="width:200px" alt="">
    </div>

    <div class="card o-hidden border-0 shadow-lg my-2 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">

            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register Admin</h1>
              </div>

              <form class="user" method="post" action="<?=base_url('auth/registrationAdmin'); ?>">
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                  <?= form_error('nip','<small class="text-danger">', '</small>'); ?>
                </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="fullname" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama','<small class="text-danger">', '</small>'); ?>
                  </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email','<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon" placeholder="Nomor Telepon" value="<?= set_value('no_telpon'); ?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password_admin1" name="password_admin1" placeholder="Password">
                    <?= form_error('password_admin1','<small class="text-danger">', '</small>'); ?>

                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password_admin2" name="password_admin2" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Register
                </button>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

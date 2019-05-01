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
              <h1 class="h4 text-gray-900 mb-4">Halaman Lupa Password</h1>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form class="user" method="post" action="<?= base_url('auth/forgot'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nim" name="email" placeholder="Masukan email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-success btn-user btn-block">
                Lupa Password
              </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="<?= base_url ('auth/registration');?>">Belum Punya akun? Daftar Disini!</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login Disini!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
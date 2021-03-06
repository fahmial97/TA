  <div class="container ">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-6 mb-5">
        <div class="text-center pt-4" href="<?= base_url();?>">
          <img src="<?=base_url('asset/img/logo_ruang.png') ?>"style="width:200px" alt="">
        </div>
        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('auth/loginAdmin'); ?>">
                    <div class="form-group">   <!-- aria-describedby="emailHelp" -->
                      <input type="number" class="form-control form-control-user" id="nip" name="nip"  placeholder="NIP" value="<?= set_value('nip'); ?>">
                      <?= form_error('nip','<small class="text-danger">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password','<small class="text-danger">', '</small>'); ?>
                    </div>
                      <button type="submit" class="btn btn-success btn-user btn-block">
                        Login
                      </button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

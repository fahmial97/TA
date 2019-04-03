<div class="container text-center">
  <h3 class="text-secondary"> Ubah Password</h3>


      <form action="<?= base_url('profile/ubahPassword') ?>" method="post">
          <div class="form-group">
            <label for="password_ini">Password saat ini</label>
            <input type="password" class="form-control" id="password_ini" name="password_ini">
            <?= form_error('password_ini','<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="new_password1">Password Baru</label>
            <input type="password" class="form-control" id="new_password1" name="new_password1">
            <?= form_error('new_password1','<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="new_password2">Ulangi Password</label>
            <input type="password" class="form-control" id="new_password2" name="new_password2">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Ubah Password</button>
          </div>
      </form>


</div>

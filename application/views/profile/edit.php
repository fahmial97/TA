<div class="container">
      <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
          <label for="image">Foto</label>
          <input class="form-control-file <?= form_error('image') ? 'is-invalid':'' ?>"
           type="file" name="image" placeholder="" value="<?=$user->image ?>"/>
          <div class="invalid-feedback">
            <?= form_error('image') ?>
          </div>
        </div>

        <div class="form-group">
          <label for="no_ruang">Nama</label>
          <input class="form-control <?= form_error('nama') ? 'is-invalid':'' ?>"
           type="text" name="nama" value="<?=$user->nama ?>"/>
          <div class="invalid-feedback">
            <?= form_error('nama') ?>
          </div>
        </div>

        <div class="form-group">
          <label for="Status">Fakultas</label>
          <input class="form-control <?= form_error('fakultas') ? 'is-invalid':'' ?>"
           type="text" name="fakultas"  placeholder="" value="<?=$user->fakultas ?>"/>
          <div class="invalid-feedback">
            <?= form_error('fakultas') ?>
          </div>
        </div>
        <div class="form-group">
          <label for="Status">Email</label>
          <input class="form-control <?= form_error('email') ? 'is-invalid':'' ?>"
           type="text" name="email" placeholder="" value="<?=$user->email ?>"/>
          <div class="invalid-feedback">
            <?= form_error('email') ?>
          </div>
        </div>
        <div class="form-group">
          <label for="Status">Nomor Telpon</label>
          <input class="form-control <?= form_error('no_telpon') ? 'is-invalid':'' ?>"
           type="number" name="no_telpon"  placeholder="" value="<?=$user->no_telpon ?>"/>
          <div class="invalid-feedback">
            <?= form_error('no_telpon') ?>
          </div>
        </div>
        <div class="form-group">
          <label for="Status">Password</label>
          <input class="form-control <?= form_error('password') ? 'is-invalid':'' ?>"
           type="text" name="password" min="0" placeholder="" value="<?=$user->password ?>"/>
          <div class="invalid-feedback">
            <?= form_error('password') ?>
          </div>
        </div>

        <div class="text-right">
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </div>
      </form>

</div>

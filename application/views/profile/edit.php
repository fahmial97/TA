<div class="container">

      <form method="post" enctype="multipart/form-data" action="<?= base_url('profile/editUser/'.$dataEdit->id.''); ?>">
        <div class="form-group">  
          <label for="image">Foto</label>
          <input class="form-control-file"
           type="file" name="image" placeholder="" value=""/>
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="form-group">
          <label for="no_ruang">Nama</label>
          <input class="form-control "
           type="text" name="nama" value="<?=$dataEdit->nama ?>"/>
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="form-group">
          <label for="Status">Fakultas</label>
          <input class="form-control"
           type="text" name="fakultas"  placeholder="" value="<?=$dataEdit->fakultas ?>"/>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="form-group">
          <label for="Status">Email</label>
          <input class="form-control"
           type="text" name="email" placeholder="" value="<?=$dataEdit->email ?>"/>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="form-group">
          <label for="Status">Nomor Telpon</label>
          <input class="form-control"
           type="number" name="no_telpon"  placeholder="" value="<?=$dataEdit->no_telpon ?>"/>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="form-group">
          <label for="Status">Password</label>
          <input class="form-control "
           type="text" name="password" min="0" placeholder="" value="<?=$dataEdit->password ?>"/>
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="text-right">
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </div>
      </form>

</div>

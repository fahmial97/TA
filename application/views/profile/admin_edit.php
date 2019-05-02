
<div class="container">
      <form method="post" enctype="multipart/form-data" action="<?= base_url('profile/editAdmin/'.$dataEditAdmin->id.''); ?>">
        <div class="form-group">
          <label for="image">Foto</label>
          <input class="form-control-file"
           type="file" name="image" placeholder="" value=""/>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="form-group">
          <label for="nim">NIP</label>
          <input class="form-control "
           type="text" name="nip" value="<?=$dataEditAdmin->nip ?>" disabled/>
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="form-group">
          <label for="nama">Nama</label>
          <input class="form-control "
           type="text" name="nama" value="<?=$dataEditAdmin->nama ?>" required/>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control"
           type="text" name="email" placeholder="" value="<?=$dataEditAdmin->email ?>" required/>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="form-group">
          <label for="no_telpon">Nomor Telpon</label>
          <input class="form-control"
          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
           type="number" name="no_telpon"  placeholder="" value="<?=$dataEditAdmin->no_telpon ?>" />
          <div class="invalid-feedback">
          </div>
        </div>

        <div class="text-right">
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </div>
      </form>

</div>

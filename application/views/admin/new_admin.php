<div class="container-fluid">
  <h3 class="h4 text-gray-900 mb-4">Tambah Admin</h3>
  <div class="card mb-3">
    <div class="card-header text-right">
      <a href="<?= site_url('admin/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
      <!-- <form method="post" enctype="multipart/form-data" > -->
      <?= form_open_multipart('admin/addAdmin'); ?>
      <div class="form-group">
        <label for="image">Foto</label>
        <input class="form-control-file <?= form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
        <input type="hidden" name="old_image">
        <div class="invalid-feedback">
          <?= form_error('image') ?>
        </div>
      </div>

      <div class="form-group">
        <input type="number" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
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
        <input type="number" class="form-control form-control-user" id="no_telp" name="no_telpon" placeholder="Nomor Telepon" value="<?= set_value('no_telpon'); ?>">
      </div>
      <div class="form-group">
        <select class="custom-select" name="status" id="status">
          <option selected>Pilih Role Akses</option>
          <?php foreach ($admin as $a) : ?>
            <option value="<?= getRoleHelpers($a["role_id"])['role'] ?>" </option> <?php endforeach; ?> </select> <?= form_error('status') ?> </div> <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="password" class="form-control form-control-user" id="password_admin1" name="password_admin1" placeholder="Password">
              <?= form_error('password_admin1', '<small class="text-danger">', '</small>'); ?>

            </div>
            <div class="col-sm-6">
              <input type="password" class="form-control form-control-user" id="password_admin2" name="password_admin2" placeholder="Ulangi Password">
            </div>
      </div>

      <div class="text-right">
        <input class="btn btn-success" type="submit" name="btn" value="Save" />
      </div>
      <?= form_close(); ?>
      <!-- </form> -->

    </div>
  </div>

</div>
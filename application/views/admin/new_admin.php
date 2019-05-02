<div class="container-fluid">
  <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= $this->session->flashdata('success'); ?>
    </div>
  <?php endif; ?>

  <h3 class="h4 text-gray-900 mb-4">Tambah Admin</h3>
  <div class="card mb-3">
    <div class="card-header text-right">
      <a href="<?= site_url('admin/admin') ?>"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body">
      <!-- <form method="post" enctype="multipart/form-data" > -->
      <form action="<?= base_url('admin/addAdmin'); ?>" method="post">
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
        <input type="number" class="form-control form-control-user" id="no_telpon" name="no_telpon" placeholder="Nomor Telepon" value="<?= set_value('no_telpon'); ?>">
        <?= form_error('no_telpon', '<small class="text-danger">', '</small>'); ?>

      </div>
      <div class="form-group">
        <select class="custom-select" name="user_role" id="user_role" value="<?= set_value('user_role'); ?>">
          <option selected>Pilih Role Akses</option>
          <?php foreach ($user_role as $u) : ?>
            <option value="<?= $u['id']; ?>"><?= $u['role']; ?></option>
          <?php endforeach; ?>
        </select>
        <?= form_error('user_role', '<small class="text-danger">', '</small>'); ?>
      </div>

      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="password" class="form-control form-control-user" id="password_admin1" name="password_admin1" placeholder="Password" value="<?= set_value('password_admin1'); ?>">
          <?= form_error('password_admin1', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <input type="password" class="form-control form-control-user" id="password_admin2" name="password_admin2" placeholder="Ulangi Password">
        </div>
      </div>

      <div class="text-right">
        <input class="btn btn-success" type="submit" name="btn" value="Save" />
      </div>
      </form>
      <!-- </form> -->

    </div>
  </div>

</div>
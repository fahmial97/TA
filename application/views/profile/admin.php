<!-- Begin Page Content -->
<div class="container">
  <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
      <?= $this->session->flashdata('success'); ?>
    </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= $this->session->flashdata('error'); ?>
    </div>
  <?php endif; ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
  <div class="card mb-3" style="max-width:1000px">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('asset/img/profile/') . $admin['image']; ?>" class="card-img" style="width:300px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <table class="table table-responsive-sm table-striped">
            <tr>
              <td>Nama</td>
              <td><?= $admin['nama']; ?></td>
            </tr>
            <tr>
              <td>NIP</td>
              <td><?= $admin['nip']; ?></td>
            </tr>
            <tr>
              <td>No.Telpon</td>
              <td><?= $admin['no_telpon']; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $admin['email']; ?></td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>
                <?= getRoleHelpers($admin['role_id'])['role'] ?>
              </td>
            </tr>

          </table>
          <div class="text-right">
            <a class="btn btn-outline-info btn-sm" href="<?= base_url('') ?>profile/edit/<?= encrypt_url($admin['id']) ?>" role="button">
              Edit <i class="fas fa-user-edit pl-2"></i>
            </a>
          </div>
          <p class="card-text"><small class="text-muted">Bergabung Sejak <?= date('d F Y', $admin['date_created']); ?></small></p>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

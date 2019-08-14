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
  <h1 class="h3 mb-4 text-gray-800">Profile</h1>
  <div class="card mb-3" >
    <div class="row no-gutters">
      <div class="col-md-4 text-center-sm">
        <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" class="card-img" style="width:300px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <table class="table table-responsive-sm">
            <tr>
              <td>Nama</td>
              <td><?= $user['nama']; ?></td>
            </tr>
            <tr>
              <td>NIM</td>
              <td><?= $user['nim']; ?></td>
            </tr>
            <tr>
              <td>Fakultas</td>
              <td><?= dataFakultas($user['id_fakultas']); ?></td>
            </tr>
            <tr>
              <td>No.Telpon</td>
              <td><?= $user['no_telpon']; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $user['email']; ?></td>
            </tr>
          </table>
          <div class="text-right">
            <a class="btn btn-outline-info btn-sm" href="<?= base_url('') ?>profile/edit/<?= encrypt_url($user['id']); ?>" role="button">
              Edit <i class="fas fa-user-edit pl-2"></i>
            </a>
          </div>
          <p class="card-text"><small class="text-muted">Bergabung Sejak <?= date('d F Y', $user['date_created']); ?></small></p>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
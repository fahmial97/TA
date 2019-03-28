<!-- Begin Page Content -->
<div class="container">
  <?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= $this->session->flashdata('success'); ?>
  </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger" role="alert">
    <?= $this->session->flashdata('error'); ?>
  </div>
  <?php endif; ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Profile</h1>
  <div class="card mb-3" style="max-width:1000px">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $user['nama']; ?></h5>
            <table class="table table-responsive-sm">
                <tr>
                  <td>NIM</td>
                  <td><?= $user['nim']; ?></td>
                </tr>
                 <tr>
                   <td>Fakultas</td>
                   <td><?= $user['fakultas']; ?></td>
                 </tr>
                 <tr>
                   <td>No.Telpon</td>
                   <td><?= $user['no_telpon']; ?></td>
                 </tr>
                 <tr>
                   <td>Email</td>
                   <td><?= $user['email']; ?></td>
                 </tr>
                 <tr>
                   <td>Password</td>
                   <td><?= $user['password'] ?></td>
                 </tr>
           </table>
           <div class="text-right">
             <a class="btn btn-primary" href="<?= base_url('')?>profile/getDataEdit/<?= $user['id'] ?>" role="button">edit</a>
           </div>
          <p class="card-text"><small class="text-muted">Bergabung Sejak <?= date('d F Y', $user['date_created']); ?></small></p>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

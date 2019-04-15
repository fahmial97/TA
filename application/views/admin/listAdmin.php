<!-- Begin Page Content -->
<div class="container">
  <?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= $this->session->flashdata('success'); ?>
  </div>
  <?php endif; ?>
  <!-- Page Heading -->
  <div class="row pb-3">
    <div class="col-6">
      <h1 class="h3 text-gray-800">Daftar Admin</h1>
    </div>
    <div class="col-6 text-right pt-0 pb-3">
      <a href="<?= base_url('admin/addAdmin') ?>" class="btn btn-primary btn-sm">Tambah Admin <i class="fas fa-plus pl-2"></i></a>
    </div>
  </div>

  <table class="table table-responsive-sm table-striped ">
      <thead class="bg-info text-white">
        <?php $no = 1; ?>
        <tr>
          <td>#</td>
          <td>Foto</td>
          <td>Nama</td>
          <td>NIM</td>
          <td>Email</td>
          <td>No. Telpon</td>
          <td>Role Id</td>
          <td>Aksi</td>
        </tr>
      </thead>
           <tbody class="">
              <?php
                foreach($all_admin as $a):?>
                 <tr>
                   <td><?= $no++; ?></td>
                   <td>	<img src="<?= base_url('asset/img/profile/'.$a['image']) ?>" width="100" /></td>
                   <td><?= $a['nama']; ?></td>
                   <td><?= $a['nip']; ?> </td>
                   <td><?= $a['email']; ?> </td>
                   <td><?= $a['no_telpon']; ?> </td>
                   <td><?= getRoleHelpers($a['role_id'])['role'] ?></td>
                   <td>
                     <a onclick="deleteConfirm('<?= site_url('admin/deleteMahasiswa/'.$a['id']) ?>')" href="#!" class="btn btn-small text-danger">
                       <i class="fas fa-trash"></i> Hapus
                     </a>
                   </td>
                 </tr>
                 <?php endforeach;?>
           </tbody>
     </table>


</div>
<!-- /.container-fluid -->

<!-- Modal Delete Mahasiswa -->
<div class="modal fade" id="deleteModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data Mahasiswa yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-deleteAdmin" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<script>
  function deleteConfirm(url){
    $('#btn-deleteAdmin').attr('href', url);
    $('#deleteModalAdmin').modal();
  }
</script>

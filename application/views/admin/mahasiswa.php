<!-- Begin Page Content -->
<div class="container">
  <?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= $this->session->flashdata('success'); ?>
  </div>
  <?php endif; ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Profile</h1>
  <table class="table table-responsive-sm table-striped ">
      <thead class="bg-info text-white">
        <?php $no = 1; ?>
        <tr>
          <td>#</td>
          <td>Foto</td>
          <td>Nama</td>
          <td>NIM</td>
          <td>Email</td>
          <td>Fakultas</td>
          <td>No. Telpon</td>
          <td>Aksi</td>
        </tr>
      </thead>

           <tbody class="">
              <?php
                foreach($all_user as $u):?>
                 <tr>
                   <td><?= $no++; ?></td>
                   <td>	<img src="<?= base_url('asset/img/profile/'.$u->image) ?>" width="100" /></td>
                   <td><?= $u->nama; ?></td>
                   <td><?= $u->nim; ?> </td>
                   <td><?= $u->email; ?> </td>
                   <td><?= $u->fakultas; ?> </td>
                   <td><?= $u->no_telpon; ?> </td>
                   <td>
                     <a onclick="deleteConfirm('<?= site_url('admin/deleteMahasiswa/'.$u->id) ?>')" href="#!" class="btn btn-small text-danger">
                       <i class="fas fa-trash"></i> Hapus
                     </a>
                   </td>
                 </tr>
                 <?php endforeach;?>
           </tbody>
     </table>


</div>
<!-- /.container-fluid -->

<script>
  function deleteConfirm(url){
    $('#btn-deleteMahasiswa').attr('href', url);
    $('#deleteModalMahasiswa').modal();
  }
</script>

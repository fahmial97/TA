<!-- Begin Page Content -->
<div class="container">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Profile</h1>

  <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <td>Nama</td>
          <td>NIM</td>
          <td>Email</td>
          <td>Fakultas</td>
          <td>No. Telpon</td>
        </tr>
      </thead>

           <tbody>
              <?php
                foreach($user as $u):?>
                 <tr>
                   <td><?= $u->nama ?></td>
                   <td><?= $u->nim;?> </td>
                   <td><?= $u->email;?> </td>
                   <td><?= $u->fakultas;?> </td>
                   <td><?= $u->no_telpon;?> </td>
                 </tr>
                 <?php endforeach;?>
           </tbody>
     </table>


</div>
<!-- /.container-fluid >

<div class="col-9 offset-3 col-md-2 offset-md-9 ">
  <p>
    <span class="jam"></span>
  </p>
</div>
<div class="container">
 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Ruang Pinjaman Anda</h1>
   <div class="row no-gutters">
     <div class="col-md">
         <table class="table table-responsive ">
           <thead class="bg-info text-white">
             <?php $no = 1; ?>
           <tr>
             <th>#</th>
             <th>Gambar</th>
             <th>No Ruang</th>
             <th>Jam Mulai</th>
             <th>Jam Selesai</th>
             <th>Nama</th>
             <th>Nim</th>
             <th>No Telpon</th>
             <th>Status</th>
           </tr>
         </thead>
         <tbody class="table table-hover">
           <?php foreach ($proses['peminjaman'] as $pp): ?>
           <tr>
             <td><?= $no++; ?></td>
             <td>
               <img src="<?= base_url('asset/img/ruang/').prosesHelpers($pp['id_ruang'])['gambar'] ?>" width="100" />

             </td>
             <td>
               <?= prosesHelpers($pp['id_ruang'])['no_ruang'] ?>
             </td>
             <td>
               <?= date('H:i',$pp['jam_pinjam']);?>
             </td>
             <td>
               <?= date('H:i',$pp['jam_selesai']); ?>
             </td>
             <td>
               <?= $user['nama']?> <br>
               <?php
                   $data = $pp['nama_pinjam'];
                   $data = explode (",",$data);
                   foreach ($data as $value) {
                   echo ''.$value.'<br>';
                   }
                 ?>
             </td>
             <td>
               <?= $user['nim']?> <br>
               <?php
                   $data = $pp['nim_pinjam'];
                   $data = explode (",",$data);
                   foreach ($data as $key => $value) {
                   echo ''.$value.'<br>';
                   }
                 ?>
             </td>
             <td>
               <?= $user['no_telpon']?> <br>
               <?php
                   $data = $pp['no_telpon_pinjam'];
                   $data = explode (",",$data);
                   foreach ($data as $key => $value) {
                   echo ''.$value.'<br>';
                   }
                 ?>
             </td>
             <td>
               <div class="badge <?= statusHelpers($pp['id_status'])['style'] ?>">
                 <?= statusHelpers($pp['id_status'])['status'] ?>
               </div>
              </td>
           </tr>
           <?php endforeach; ?>

         </tbody>
            </table>

       </div>
 </div>



 <p class="card-text text-right"><small class="text-muted">Segera Menuju Perpustakaan untuk mengisi Ruang</small></p>


</div> <!-- /container-->

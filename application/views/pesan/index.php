<div class="col-9 offset-3 col-md-2 offset-md-9 ">
  <p>
    <span class="jam"></span>
  </p>
</div>
<div class="container">


 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Ruang Pesanan Anda</h1>
 <div class="card mb-3">
   <div class="row no-gutters">
     <div class="col-md-4">
       <img class="card-img-top" src="<?= base_url('asset/img/') ?>ruang.jpg" alt="Card image cap">
     </div>
     <div class="col-md-8">
       <div class="card-body">
           <table class="table table-responsive-sm">
             <tr class="pemesanan">
               <td><h5>Pemesanan Berakhir</h5></td>
               <td><div id='timer'></div></td>
             </tr>
               <tr>
                 <td>No. Ruang</td>
                 <td><?= $user['nim']; ?></td>
               </tr>
                <tr>
                  <td>Jam Peminjaman</td>
                  <td><?= $user['fakultas']; ?></td>
                </tr>
                <tr>
                  <td>Nama Peminjam</td>
                  <td>Muhammad Fahmissurur <br>
                  Muhammad AKbar
                  </td>
                </tr>
          </table>
       </div>

     </div>
   </div>
 </div>
 <p class="card-text text-right"><small class="text-muted">Segera Menuju Perpustakaan untuk mengisi Ruang</small></p>



</div> <!-- /container-->

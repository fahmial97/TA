<h1>Data Siswa</h1>
  <a href="<?php echo base_url("ruang/peminjam/formPeminjam"); ?>">Tambah Data</a><br><br>
  <style>
  table {
    border-collapse: collapse;
  }
  table, td, th {
    border: 1px solid black;
  }
  </style>
  <table border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>No telpon</th>
  </tr>
  <?php
  if( ! empty($data_peminjam)){
    $no = 1;
    foreach($data_peminjam as $data){
      echo "<tr>";
      echo "<td>".$no."</td>";
      echo "<td>".$data->nim_pinjam."</td>";
      echo "<td>".$data->nama_pinjam."</td>";
      echo "<td>".$data->no_telpon_pinjam."</td>";
      echo "</tr>";
      $no++;
    }
  }
  ?>
  </table>

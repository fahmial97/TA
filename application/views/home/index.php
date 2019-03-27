<div class="container mb-5 ">
    <div class="jumbotron ">
      <h2 class="display-4">Selamat Datang di Ruang Diskusi</h2>
      <?php
      if ($this->session->userdata('nim')) {
        echo '<p class="d-none">Silahkan <a href="'.base_url().'auth" role="button">Login</a> untuk memesan Ruangan</p>';


      }else{
        echo '<p class="mt-2">Silahkan <a href="'.base_url().'auth" role="button">Login</a> untuk memesan Ruangan</p>';

      }
       ?>
          <hr class="my-4">
                <a class="btn btn-primary btn-lg text-center" href="<?= base_url()?>ruang" role="button">Lihat Ruang</a>
    </div>
</div>
<br>

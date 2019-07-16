<div class="bd-example" style="margin-top:-50px;">
  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('asset/img/carousel/glassbook.jpg') ?>" class="d-block w-100" alt="...">
        <div class="carousel-caption pb-md-5 ">
          <img src="<?= base_url('asset/img/logo_ruang.png') ?>" style="width:70%;" />

          <h1 class="d-none d-md-block pb-sm-5 ">Selamat Datang di Ruang Diskusi</h1> <!-- md -->
          <h6 class="font-italic display-5 d-block d-md-none">Selamat Datang di Ruang Diskusi</h6> <!-- sm -->

        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('asset/img/carousel/study.jpg') ?>" class="d-block w-100">
        <div class="carousel-caption">
          <img class="pb-lg-5 " src="<?= base_url('asset/img/logo_ruang.png') ?>" style="width:70%;" />
          <?php
          if ($this->session->userdata('nim')) {
            echo '<p class="d-none">Silahkan <a href="' . base_url() . 'auth" role="button">Login</a> untuk memesan Ruangan</p>';
            echo '<br> <a class="btn btn-outline-light btn-sm text-center pt-0" href="' . base_url('ruang') . '" role="button">Lihat Ruang</a>';
          } else {
            echo '<p>Silahkan <a href="' . base_url() . 'auth" role="button">Login</a> untuk memesan Ruangan</p>';
          }
          ?>
          <hr class=" d-none d-md-block">

        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container text-center py-3">
  <h1 class="d-none d-md-block">About</h1>
  <h4 class="d-block d-md-none">About</h4>
  <hr>
  <p>
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
  </p>
  <a class="btn btn-primary  btn-sm text-center" href="<?= base_url() ?>ruang" role="button">Lihat Ruang</a>
</div>
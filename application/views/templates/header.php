<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/css/style.css">
  <title><?php echo $judul; ?></title>

  <link rel="shortcut icon" href="<?= base_url('asset/img/favicon.png') ?>">
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark pt-3 sticky-top mb-5 text-center" style="background-color:	#0e5e8c;">
    <div class="container">
      <!-- Navbar-sm -->
      <div id="mySidenav" class="sidenav d-sm-none text-left">
        <a href="javascript:void(0)" class="closebtn">&times;</a>
        <?php
        if ($this->session->userdata('nim')) {
          echo '<a class="nav-link" href="' . base_url('profile/mahasiswa') . '">
                    <img class="img-profile img-logo-size rounded-circle mb-2" src="' . base_url('asset/img/profile/') . $user['image'] . '"> <br>
                    <span class=" d-lg-inline text-gray-600 small font-italic"> ' . $user['nama'] . '</span>
                  </a>
                  <hr class="mt-0 shadow-sm">
                  ';
        } else { }
        ?>
        <a class="nav-link" href="<?= base_url(); ?>"><i class="fas fa-home fa-fw pr-5"></i>Home
          <hr class="mt-0 mb-1"></a>
        <a class="nav-link" href="<?= base_url(); ?>ruang"><i class="fas fa-chalkboard fa-fw pr-5"></i>Ruang
          <hr class="mt-0 mb-1"></a>
        <a class="nav-link" href="<?= base_url(); ?>ruang/dataBooking"><i class="fas fa-bookmark fa-fw pr-5"></i>Pesanan saya
          <hr class="mt-0 mb-1"></a>
        <?php
        if ($this->session->userdata('nim')) {
          echo '<a class="nav-link" href="' . base_url('auth/logout') . '" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-fw pr-5"></i>Logout<hr class="mt-0 mb-1"></a>
                  ';
        } else {
          echo '<a class="nav-link" href="' . base_url('auth') . '"><i class="fas fa-sign-in-alt fa-fw pr-5"></i>Login </a>';
        }
        ?>

      </div>
      <!-- / Navbar-sm -->



      <!-- / Navbar-Medium -->
      <span class="d-sm-none burger-bar" id="btnRes"><i class="fas fa-bars"></i></span>
      <a class="navbar-brand" href="<?= base_url(); ?>">
        <img src="<?= base_url('asset/img/logo_ruang.png') ?>" class="logo_ruang" alt="">
      </a>
      <div class="d-md-none">
        <?php
        if (!$this->session->userdata('nim')) {
          echo '<a class="btn btn-outline-light btn-sm text-center" href="' . base_url('auth') . '" role="button"><i class="fas fa-sign-in-alt"></i></a>';
        } else { }
        ?>

      </div>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

          <li class="nav-item <?php if ($this->uri->segment(1) == '') {
                                echo "active";
                              } ?>">
            <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if ($judul == 'Ruang Diskusi') {
                                echo "active";
                              } elseif ($judul == 'Pesan Ruang') {
                                echo 'active';
                              } ?>">
            <a class="nav-link" href="<?= base_url(); ?>ruang">Ruang</a>
          </li>
          <li class="nav-item <?php if ($judul == 'Ruang Pinjaman Anda') {
                                echo "active";
                              } ?>">
            <a class="nav-link" href="<?= base_url(); ?>ruang/data-booking">Pesanan saya</a>
          </li>
        </ul>
        <?php
        if ($this->session->userdata('nim')) {
          echo '<ul class="navbar-nav ml-auto d-none d-md-block">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> ' . $user['nama'] . '</span>
                    <img class="img-profile img-logo rounded-circle" src="' . base_url('asset/img/profile/') . $user['image'] . '">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="' . base_url('profile/mahasiswa') . '">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="' . base_url('profile/ubahPassword') . '">
                      <i class="fas fa-lock-open fa-sm fa-fw mr-2 text-gray-400"></i>
                      Ubah Password
                    </a>
                    <hr class="sidebar-divider">
                    <a class="dropdown-item" href="' . base_url('auth/logout') . '" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
              ';
        } else {
          echo '<a class="btn btn-outline-light text-center" href="' . base_url('auth') . '" role="button">Login <i class="fas fa-sign-in-alt"></i></a>';
        }
        ?>
      </div>
      <!-- / Navbar-Medium -->


    </div> <!-- /Container -->
  </nav>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik Logout jika ingin keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
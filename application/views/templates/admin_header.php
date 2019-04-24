<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?= $judul; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('asset/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('asset/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url('asset/img/favicon.png') ?>">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <a class="sidebar-brand-text mx-3" href="<?= base_url(); ?>">
          <img src="<?= base_url('asset/img/logo_ruang.png') ?>" style="width: 140px;" alt="">
        </a>

      </div>
      <li class="nav-item <?php if ($this->uri->segment(1) == 'validasi') {
                            echo 'active';
                          } ?>">
        <a class="nav-link" href="<?= base_url('validasi/index'); ?>">
          <i class="fas fa-vote-yea"></i>
          <span>Peminjaman Ruang</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?php if ($this->uri->segment(2) == 'ruang') {
                            echo 'active';
                          } ?>">
        <a class="nav-link" href="<?= base_url('admin/ruang'); ?>">
          <i class="fas fa-fw fa-chair"></i>
          <span>Ruang</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?php if ($this->uri->segment(2) == '') {
                            echo 'active';
                          } ?>">
        <a class="nav-link" href="<?= base_url('admin/'); ?>">
          <i class="fas fa-fw fa-history"></i>
          <span>History Peminjaman</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item <?php if ($this->uri->segment(2) == 'mahasiswa') {
                            echo 'active';
                          } ?>">
        <a class="nav-link" href="<?= base_url('admin/mahasiswa') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Mahasiswa</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item <?php if ($this->uri->segment(2) == 'admin') {
                            echo 'active';
                          } ?>">
        <a class="nav-link" href="<?= base_url('admin/admin') ?>">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Admin</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logoutAdmin'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- ==================== End of Sidebar ==================== -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <div class=" text-left" style="color:rgb(4, 112, 158);">
            <i class="fas fa-users-cog pr-2"></i>Admin Page
          </div>
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $admin['nama']; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('asset/img/profile/') . $admin['image']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('profile/admin'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logoutAdmin'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

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
                <a class="btn btn-primary" href="<?= base_url('auth/logoutadmin'); ?>">Logout</a>
              </div>
            </div>
          </div>
        </div>
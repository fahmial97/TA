<?php

class Ruang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_ruang");
    $this->load->model("M_pinjam");
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = 'Ruang Diskusi';
    $data['user']  = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['ruang_tersedia'] = $this->M_ruang->tersedia();
    $data["tb_ruang"] = $this->M_ruang->getAll();
    $data['nonAktif'] = $this->M_ruang->getRuangNonAktif();
    $data['waktu_ruang'] = $this->M_ruang->getWaktuBuka();


    $this->load->view('templates/header', $data);
    $this->load->view('ruang/index', $data);
    $this->load->view('templates/footer');
  }

// menu proses peminjaman
  public function booking($id)
  {
    if (!$this->session->userdata('nim')) {
      redirect('blocked/booking');
    }
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['dataBooking'] = $this->M_ruang->getById($id);
    $data['judul'] = 'Pinjam Ruang';

    $this->load->view('templates/header', $data);
    $this->load->view('ruang/booking', $data);
    $this->load->view('templates/footer');
  }

  public function bookingRuang()
  {
    //get data hari ini di database
    $today = $this->M_ruang->getWaktuBuka();

    //ambil data user yang meminjam
    $getDataUser = $this->M_ruang->getDataUserPeminjam();


    // validasi peminjam dalam 1 hari
    // if($getDataUser['peminjaman'] == 'belum'){
      $this->_inputData($today->jam_buka, $today->jam_tutup);
      redirect('ruang');
    // }else{
    //   $this->session->set_flashdata('error', 'Gagal Meminjam Ruang, Peminjaman hanya boleh 1 kali per 1 hari');
    //   redirect('ruang');
    // }
  }

  // memasukkan data ke proses peminjaman
  private function _inputData($jamBuka, $jamTutup)
  {
    $tb_ruang = $this->M_pinjam;
    $datePinjam = date('H:i', time());

    // validasi waktu peminjaman
    if ($datePinjam > $jamBuka && $datePinjam < $jamTutup) {

      // $getDataUser = $tb_ruang->getDataUser(); //validasi peminjaman user

      // if ($getDataUser == 0) {
      // jika tidak ada data yang aktif di dalam table maka proses pemesanan dilanjutkan
      $stats_ruang = $tb_ruang->statusRuang();
      $id_ruang = $this->db->get_where('proses_peminjaman', ['id_ruang' => $stats_ruang->id, 'id_status' => 5])->row();

      // spesifik validasi agar data yang di input kan tidak mengalami double input
      if ($stats_ruang->id_status == 1) {
        if (count($id_ruang)  == null) {
          $tb_ruang->prosesPinjam($jamTutup);
          return $this->session->set_flashdata('success', 'Berhasil Meminjam Ruangan, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
        } else {
          return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang'); //spesifik vaidasi biar data gk double input
        }
      } else {
        return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang');
      }
      // } else {
      //   return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang, Anda sedang dalam Proses Peminjaman, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
      // }
    } else {
      return $this->session->set_flashdata('error', 'Gagal meminjam ruangan, waktu peminjaman sudah habis');
    }
  }

  // memesan ruang yg sedang digunakan
  public function pesanRuang()
  {
    //get data hari ini di database
    $today = $this->M_ruang->getWaktuBuka();

    //amnbil mengenai data user yang meminjam
    // $getDataUser = $this->M_ruang->getDataUserPeminjam();

    // if($getDataUser['peminjaman'] == 'belum'){
      $this->_updateData($today->jam_buka, $today->jam_tutup);
      redirect('ruang');
    // }else{
    //   $this->session->set_flashdata('error', 'Gagal Meminjam Ruang, Peminjaman hanya boleh 1 kali per 1 hari');
    //   redirect('ruang');
    // }
  }

  // mengupdate status peminjaman yg  sedang digunakan menjadi di pesan
  private function _updateData($jamBuka, $jamTutup)
  {
    $tb_ruang = $this->M_pinjam;
    $datePinjam = date('H:i', time());

    if ($datePinjam > $jamBuka && $datePinjam < $jamTutup) {

      $getDataUser = $tb_ruang->getDataUser();

      if ($getDataUser == 0) {

      $stats_ruang = $tb_ruang->statsRuang();
      $id_ruang = $this->db->get_where('proses_peminjaman', ['id_ruang' => $stats_ruang->id_ruang, 'id_status' => 2])->row();
      $mulai = $stats_ruang->jam_selesai;

      if ($stats_ruang->status_booking == 2) {
        if ($id_ruang == null) {

          // validasi peminjaman di jam tutup(tambahan)
          if ($mulai > $jamBuka && $mulai < $jamTutup) {
            $this->db->update('proses_peminjaman', ['status_booking' => 1], ['id' => $stats_ruang->id]);
            $tb_ruang->prosesBooking($mulai, $jamTutup);
            return $this->session->set_flashdata('success', 'Berhasil Meminjam Ruangan, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
          } else {
            return $this->session->set_flashdata('error', 'Gagal meminjam ruangan, waktu peminjaman sudah habis ');
          }
        } else {
          return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang');
        }
      } else {
        return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang, ruang sudah dipesan');
      }
      } else {
        return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang, Anda sedang dalam Proses Peminjaman, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
      }
    } else {
      return $this->session->set_flashdata('error', 'Gagal meminjam ruangan, waktu peminjaman sudah habis');
    }
  }

  public function dataBooking()
  {
    if (!$this->session->userdata('nim')) {
      redirect('blocked/Mybooking');
    }

    if (!$this->session->userdata('id')) {
      redirect('blocked/Mybooking');
    }
    $data['judul'] = 'Ruang Pinjaman Anda';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['proses'] = $this->M_pinjam->getAllByUser($data['user']['id']);

    $this->load->view('templates/header', $data);
    $this->load->view('ruang/mybooking', $data);
    $this->load->view('templates/footer');
  }

  function deleteDataBooking($id)
  {
    if (!isset($id)) show_404();

    $this->M_pinjam->delete($id);
    $this->session->set_flashdata('success', 'Berhasil Dihapus');
    redirect('admin');
  }
}

<?php

class Ruang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("m_ruang");
    $this->load->model("m_pinjam");
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['judul'] = 'Ruang Diskusi';
    $data['user']  = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data["tb_ruang"] = $this->m_ruang->getAll();

    $this->load->view('templates/header', $data);
    $this->load->view('ruang/index', $data);
    $this->load->view('templates/footer');
  }

  public function booking($id)
  {
    if (!$this->session->userdata('nim')) {
      redirect('blocked/booking');
    }
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['dataBooking'] = $this->m_ruang->getById($id);
    $data['judul'] = 'Pesan Ruang';

    $this->load->view('templates/header', $data);
    $this->load->view('ruang/booking', $data);
    $this->load->view('templates/footer');
  }

  public function bookingRuang()
  {
    //validasi jam buka jam tutup
    $jam_pinjam = time();
    $datePinjam = date('H:i', strtotime('+2 hours', $jam_pinjam));

    $pinjamRabu = date('d', strtotime('tue'));
    $hariIni = date('d', time());

    if ($hariIni == $pinjamRabu) {
      $this->_inputData($datePinjam, "24:00");
      redirect('ruang');
    } else {
      $this->_inputData($datePinjam, "16:00");
      redirect('ruang');
    }
  }

  private function _inputData($datePinjam, $jamTutup)
  {
    $tb_ruang = $this->m_pinjam;

    // validasi waktu peminjaman
    if ($datePinjam > "08:00" && $datePinjam < $jamTutup) {

      $getDataUser = $tb_ruang->getDataUser();

      if ($getDataUser == 0) {
      //jika tidak ada data yang aktif di dalam table maka proses pemesanan dilanjutkan
      $stats_ruang = $tb_ruang->statusRuang();
      $id_ruang = $this->db->get_where('proses_peminjaman', ['id_ruang' => $stats_ruang->id, 'id_status' => 5])->row();

      // spesifik validasi agar data yang di input kan tidak mengalami double input
      if ($stats_ruang->id_status == 1) {
        if (count($id_ruang) < 1) {
          $tb_ruang->prosesPinjam();
          return $this->session->set_flashdata('success', 'Berhasil Meminjam Ruangan, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
        } else {
          return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang'); //spesifik vaidasi biar data gk double input
        }
      } else {
        return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang');
      }
      } else {
        return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang, Anda sedang dalam Proses Peminjaman, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
      }
    } else {
      return $this->session->set_flashdata('error', 'Gagal meminjam ruangan, waktu peminjaman sudah habis');
    }
  }

  public function pesanRuang()
  {
    //validasi jam buka jam tutup
    $jam_pinjam = time();
    $datePinjam = date('H:i', strtotime('+2 hours', $jam_pinjam));

    $pinjamRabu = date('d', strtotime('tue'));
    $hariIni = date('d', time());

    if ($hariIni == $pinjamRabu) {
      $this->_updateData($datePinjam, "24:00");
      redirect('ruang');
    } else {
      $this->_updateData($datePinjam, "16:00");
      redirect('ruang');
    }
  }

  private function _updateData($datePinjam, $jamTutup)
  {
    $tb_ruang = $this->m_pinjam;

    if ($datePinjam > "08:00" && $datePinjam < $jamTutup) {

      $getDataUser = $tb_ruang->getDataUser();

      if ($getDataUser == 0) {

      $stats_ruang = $tb_ruang->statsRuang();
      $id_ruang = $this->db->get_where('proses_peminjaman', ['id_ruang' => $stats_ruang->id_ruang, 'id_status' => 2])->row();
      $mulai = $stats_ruang->jam_selesai;

      if ($stats_ruang->status_booking == 2) {
        if (count($id_ruang) < 1) {
          $this->db->update('proses_peminjaman', ['status_booking' => 1], ['id' => $stats_ruang->id]);
          $tb_ruang->prosesBooking($mulai);
          return $this->session->set_flashdata('success', 'Berhasil Meminjam Ruangan, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
        } else {
          return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang');
        }
      } else {
        return $this->session->set_flashdata('error', 'Gagal Meminjam Ruang');
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
    $data['proses'] = $this->m_pinjam->getAllByUser($data['user']['id']);

    $this->load->view('templates/header', $data);
    $this->load->view('ruang/mybooking', $data);
    $this->load->view('templates/footer');
  }

  function deleteDataBooking($id)
  {
    if (!isset($id)) show_404();

    $this->m_pinjam->delete($id);
    $this->session->set_flashdata('success', 'Berhasil Dihapus');
    redirect('admin');
  }
}

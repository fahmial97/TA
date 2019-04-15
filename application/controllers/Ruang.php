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
    $tb_ruang = $this->m_pinjam;

    //validasi jam buka jam tutup
    $waktuBuka = "08:00";
    $waktuTutup = "16:00";
    $jam_pinjam = time();
    $datePinjam = date('H:i', strtotime('+2 hours', $jam_pinjam));

    if ($datePinjam > $waktuBuka && $datePinjam < $waktuTutup) {
      $tb_ruang->prosesPinjam();

      $this->session->set_flashdata('success', 'Berhasil Meminjam Ruangan, <a href="' . base_url('ruang/dataBooking') . '">Lihat Disini</a>');
      redirect('ruang');
    } else {
      $this->session->set_flashdata('error', 'Gagal meminjam ruangan, waktu peminjaman sudah habis');
      redirect('ruang');
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


  public function formPeminjam()
  {
    $this->load->view('form'); // Load view form.php
  }
}

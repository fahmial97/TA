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
     $data['judul'] = 'Ruang Pesanan';
     $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

     $tb_ruang = $this->m_pinjam;
     $tb_ruang->prosesPinjam();

     $this->session->set_flashdata('success','Berhasil Meminjam Ruangan, <a href="'.base_url('ruang/dataBooking').'">Lihat Disini</a>
 ');
     redirect('ruang');


  }

  public function dataBooking()
  {
    $data['judul'] = 'Ruang Pinjaman Anda';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['proses'] = $this->m_pinjam->getAllByUser($data['user']['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('ruang/mybooking', $data);
        $this->load->view('templates/footer');

  }


  Public function formPeminjam(){
    $this->load->view('form'); // Load view form.php
  }


}


// public function booking($id)
// {
//   if (!$this->session->userdata('nim')) {
//     redirect('blocked/booking');
//   }
//   $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
//   $data['dataBooking'] = $this->m_ruang->getById($id);
//   $data['judul'] = 'Pesan Ruang';
//
//   $this->load->view('templates/header', $data);
//   $this->load->view('ruang/booking', $data);
//   $this->load->view('templates/footer');
//
// }
//
// public function bookingRuang($id)
// {
//  if (!isset($id)) redirect('ruang');
//
//    $user = $this->m_ruang;
//
//    if ($validation->run()) {
//      $data["tb_ruang"] = $tb_ruang->getById($id);
//      if (!$data["tb_ruang"]) show_404();
//    }
//
// }





//
// public function peminjam(){
//
//   $data['judul'] = 'Ruang Diskusi';
//   $data['user']  = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
//   $data['data_peminjam'] = $this->m_peminjam->view();
//
//   $this->load->view('templates/header', $data);
//   $this->load->view('ruang/booking', $data);
//   $this->load->view('templates/footer');
//  }
//
//  public function formPeminjam(){
//    $this->load->view('form'); // Load view form.php
//  }
//
//  public function savePeminjam(){
//    // Ambil data yang dikirim dari form
//    $nim_pinjam = $_POST['nim_peminjam'];
//    $nama_pinjam = $_POST['nama_pinjam'];
//    $no_telpon_pinjam = $_POST['no_telpon_pinjam'];
//    $data = array();
//
//    $index = 0; // Set index array awal dengan 0
//    foreach($nim_pinjam as $datanim){ // Kita buat perulangan berdasarkan nis sampai data terakhir
//      array_push($data, array(
//        'nim_pinjam'=>$nim_pinjam,
//        'nama_pinjam'=>$nama_pinjam[$index],  // Ambil dan set data nama sesuai index array dari $index
//        'no_telpon_pinjam'=>$no_telpon_pinjam[$index],  // Ambil dan set data telepon sesuai index array dari $index
//      ));
//
//      $index++;
//    }
//
//    $sql = $this->m_peminjam->save_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
//
//    // Cek apakah query insert nya sukses atau gagal
//    if($sql){ // Jika sukses
//      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('ruang/')."';</script>";
//    }else{ // Jika gagal
//      echo "<script>alert('Data gagal disimpan');window.location = '".base_url('ruang/booking')."';</script>";
//    }
//  }


// $validation = $this->form_validation;
//
// if ($validation->run()) {
//   // Ambil data yang dikirim dari form
//   }
//
//   $sql = $this->m_peminjam->save_batch($data); // Panggil fungsi save_batch yang ada di model
//
//   // Cek apakah query insert nya sukses atau gagal
//   if($sql){ // Jika sukses
//     echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('ruang/')."';</script>";
//   }else{ // Jika gagal
//     echo "<script>alert('Data gagal disimpan');window.location = '".base_url('ruang/booking')."';</script>";
//   }

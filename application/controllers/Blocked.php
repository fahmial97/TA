<?php

class Blocked extends CI_Controller
{
  public function booking()
  {

    $data['judul'] = 'Pesan Ruang';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('blocked/booking', $data);
    $this->load->view('templates/footer');
  }

  public function MyBooking()
  {

    $data['judul'] = 'Ruang Pesanan anda';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('blocked/mybooking', $data);
    $this->load->view('templates/footer');
  }

  public function notFound()
  {
    $data['judul'] = 'Not Found';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('blocked/404', $data);
    $this->load->view('templates/footer');
  }
}

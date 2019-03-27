<?php

class Booking extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      if (!$this->session->userdata('nim')) {
        redirect('blocked/booking');
      }
  }

  public function index()
  {

    $data['judul'] = 'Pesan Ruang';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();


    $this->load->view('templates/header', $data);
    $this->load->view('booking/index', $data);
    $this->load->view('templates/footer');

  }
}

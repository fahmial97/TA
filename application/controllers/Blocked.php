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
}

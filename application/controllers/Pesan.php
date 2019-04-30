<?php

class Pesan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("m_ruang");
    if (!$this->session->userdata('nim')) {
      redirect('blocked/booking');
    }
  }

  public function index()
  {
    $data['judul'] = 'Ruang Pesanan';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('pesan/index', $data);
    $this->load->view('templates/footer');
  }
}

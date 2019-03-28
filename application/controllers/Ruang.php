<?php

class Ruang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("m_ruang");
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

}

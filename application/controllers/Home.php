<?php

class Home extends CI_Controller
{

  public function index()
  {

    $data['judul'] = 'Home';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();


    $this->load->view('templates/header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');

  }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("m_ruang");
    $this->load->library('form_validation');
  }

  public function index()
  {

    $data['judul'] = 'Halaman Admin';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data["tb_ruang"] = $this->m_ruang->getAll();

    $this->load->view('templates/admin_header',$data);
    $this->load->view('admin/index', $data) ;
    $this->load->view('templates/admin_footer',$data);

}

}

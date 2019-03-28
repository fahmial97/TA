<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model("m_ruang");
    $this->load->model("profile_model");
    $this->load->library('form_validation');
  }

  public function index()
  {

    $data['judul'] = 'Halaman Admin';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row();
    $data["tb_ruang"] = $this->m_ruang->getAll();

    $this->load->view('templates/admin_header',$data);
    $this->load->view('admin/index', $data) ;
    $this->load->view('templates/admin_footer');

}

  public function mahasiswa()
  {

    $data['judul'] = 'Halaman Admin';
    $data['all_user'] = $this->profile_model->getAll();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row();

    $this->load->view('templates/admin_header',$data);
    $this->load->view('admin/mahasiswa', $data) ;
    $this->load->view('templates/admin_footer');
  }

}

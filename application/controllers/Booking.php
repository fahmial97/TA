<?php

class Booking extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model("m_ruang");
      $this->load->library('form_validation');

      if (!$this->session->userdata('nim')) {
        redirect('blocked/booking');
      }
  }

 }

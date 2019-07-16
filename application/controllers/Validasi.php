<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Validasi extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model("M_ruang");
        $this->load->model("Profile_model");
        $this->load->model("M_pinjam");
        $this->load->library('form_validation');
        $this->load->model('M_validasi', 'valid');


        if (!$this->session->userdata('nip')) {
            redirect('auth/loginadmin');
        }
    }

    public function index()
    {
        $data['judul'] = 'Peminjaman Ruang';
        $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
        $data["proses_peminjaman"] = $this->M_pinjam->getAllPinjam();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('validasi/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function confirm($id)
    {
        $this->valid->validData($id);
        $this->session->set_flashdata('success', 'Berhasil meminjamkan ruang');
        redirect('validasi/index');
    }

    public function cancel($id)
    {
        $this->valid->validCancel($id);
        $this->session->set_flashdata('success', 'Peminjaman Berhasil Dibatalkan');
        redirect('validasi/index');
    }

    public function selesai($id)
    {
        $this->valid->validSelesai($id);
        $this->session->set_flashdata('success', 'Peminjaman Ruang Telah Selesai');
        redirect('validasi/index');
    }
}

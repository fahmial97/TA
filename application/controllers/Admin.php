<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model("m_ruang");
    $this->load->model("profile_model");
    $this->load->model("m_pinjam");
    $this->load->model("m_profileAdmin");

    $this->load->library('form_validation');

    if (!$this->session->userdata('nip')) {
      redirect('auth/loginadmin');
    }
  }
  public function index()
  {

    $data['judul'] = 'Halaman Admin';
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data["proses_peminjaman"] = $this->m_pinjam->getAllPinjam();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/admin_footer');
  }
  // ======================== Ruang =======================
  public function ruang()
  {

    $data['judul'] = 'Halaman Admin';
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data["tb_ruang"] = $this->m_ruang->getAll();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/ruang', $data);
    $this->load->view('templates/admin_footer');
  }

  function addRuang()
  {
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['judul'] = 'Tambah Ruang';
    $data['status'] = $this->m_ruang->getAllStatus();

    $tb_ruang = $this->m_ruang;
    $validation = $this->form_validation;
    $validation->set_rules($tb_ruang->rules());

    if ($validation->run()) {
      // setting konfigurasi upload
      $config['upload_path']    = './asset/img/ruang/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_width']      = 2048;
      $config['max_height']     = 2048;
      // load library upload
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('image')) {
        $error = $this->upload->display_errors();
        // menampilkan pesan error
        $this->session->set_flashdata('error', 'Maaf Gambar Tidak Sesuai');
        redirect('admin'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $tb_ruang->save($result);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('admin/ruang'); //selesai proses di redirect
      }
    }

    $this->load->view('templates/admin_header', $data);
    $this->load->view("admin/new_ruang");
    $this->load->view('templates/admin_footer');
  }

  function editRuang($id)
  {
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['judul'] = 'Edit Ruang';


    if (!isset($id)) redirect('admin');

    $tb_ruang = $this->m_ruang;
    $validation = $this->form_validation;
    $validation->set_rules($tb_ruang->rules());

    if ($validation->run()) {
      // setting konfigurasi upload
      $config['upload_path']    = './asset/img/ruang/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_width']      = 2048;
      $config['max_height']     = 2048;
      // load library upload
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('image')) {
        $error = $this->upload->display_errors();
        // menampilkan pesan error
        $this->session->set_flashdata('error', 'Maaf File/Ukuran Gambar Tidak Sesuai');
        redirect('admin/ruang'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $tb_ruang->update($id, $result);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('admin/ruang'); //selesai proses di redirect
      }
    }

    $data["tb_ruang"] = $tb_ruang->getById($id);
    if (!$data["tb_ruang"]) show_404();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/edit_ruang', $data);
    $this->load->view('templates/admin_footer');
  }

  function deleteRuang($id)
  {
    if (!isset($id)) show_404();

    $this->m_ruang->delete($id);
    $this->session->set_flashdata('success', 'Berhasil Dihapus');
    redirect('admin');
  }


  // ==================================================================================================
  public function admin()
  {
    $data['judul'] = 'List Mahasiswa';
    $data['all_admin'] = $this->m_profileAdmin->getAll();
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();


    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/listAdmin', $data);
    $this->load->view('templates/admin_footer');
  }

  function addAdmin()
  {
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['judul'] = 'Tambah Admin';
    $data['status'] = $this->m_profileAdmin->getAllStatus();

    $admin = $this->m_profileAdmin;
    $validation = $this->form_validation;
    $validation->set_rules($admin->rules());

    if ($validation->run()) {
      // setting konfigurasi upload
      $config['upload_path']    = './asset/img/ruang/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_width']      = 2048;
      $config['max_height']     = 2048;
      // load library upload
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('image')) {
        $error = $this->upload->display_errors();
        // menampilkan pesan error
        $this->session->set_flashdata('error', 'Maaf Gambar Tidak Sesuai');
        redirect('admin/listAdmin'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $admin->save($result);
        $this->session->set_flashdata('success', 'Admin Berhasil Ditambahkan');
        redirect('admin/listAdmin'); //selesai proses di redirect
      }
    }

    $this->load->view('templates/admin_header', $data);
    $this->load->view("admin/new_admin");
    $this->load->view('templates/admin_footer');
  }



  // ========================================== Mahasiswa ============================================
  // ==================================================================================================

  public function mahasiswa()
  {
    $data['judul'] = 'List Mahasiswa';
    $data['all_user'] = $this->profile_model->getAll();
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/mahasiswa', $data);
    $this->load->view('templates/admin_footer');
  }

  function deleteMahasiswa($id)
  {
    if (!isset($id)) show_404();

    $this->profile_model->delete($id);
    $this->session->set_flashdata('success', 'Data Berhasil Mahasiswa  Dihapus');
    redirect('admin/mahasiswa');
  }
}

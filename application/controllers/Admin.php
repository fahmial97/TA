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
    // $this->load->helper("url");

    $this->load->library('pagination');
    $this->load->library('form_validation');

    if (!$this->session->userdata('nip')) {
      redirect('auth/loginadmin');
    }
  }
  public function index($offset = 0)
  {
    $dataPinjam = $this->db->get('proses_peminjaman');

    $config['base_url'] = base_url() . 'admin/index';
    $config['total_rows'] = $dataPinjam->num_rows();
    $config['per_page'] = 10;

    // Config Pagination Bootstrap
    $config['attributes'] = ['class' => 'page-link'];

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['first_link'] = 'First Page';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last Page';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';


    $this->pagination->initialize($config);
    $data['page'] = $this->pagination->create_links();
    $data['offset'] = $offset;

    $data['judul'] = 'Halaman Admin';
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data["proses_peminjaman"] = $this->m_pinjam->getAllHistory($config['per_page'], $offset);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/admin_footer');
  }
  // ======================== Ruang =======================
  public function ruang()
  {

    $data['judul'] = 'Halaman Admin';
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data["tb_ruang"] = $this->m_ruang->getAllruang();
    $data['jam_buka'] = $this->m_ruang->getAllJam();
    $data['status_buka'] = [
      'buka',
      'tutup'
    ];

    $this->load->view('templates/admin_header', $data);
    $this->load->view('admin/ruang', $data);
    $this->load->view('templates/admin_footer');
  }
  function bukaRuang()
  { }

  function TutupRuang()
  { }


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
    $data['judul'] = 'List Admin';
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
        redirect('admin/Admin'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $admin->save($result);
        $this->session->set_flashdata('success', 'Admin Berhasil Ditambahkan');
        redirect('admin/Admin'); //selesai proses di redirect
      }
    }

    $this->load->view('templates/admin_header', $data);
    $this->load->view("admin/new_admin");
    $this->load->view('templates/admin_footer');
  }

  function deleteADmin($id)
  {
    if (!isset($id)) show_404();

    $this->m_profileAdmin->delete($id);
    $this->session->set_flashdata('success', 'Data Berhasil Mahasiswa  Dihapus');
    redirect('admin/listAdmin');
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

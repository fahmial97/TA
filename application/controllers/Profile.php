<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('profile_model');
    $this->load->model('m_profileAdmin');
    $this->load->helper('url');
  }

  public function mahasiswa()
  {
    if (!$this->session->userdata('nim')) {
      redirect('blocked/notFound');
    }

    $data['judul'] = 'My Profile';
    $data['user'] = $this->profile_model->getAll();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('profile/mahasiswa', $data);
    $this->load->view('templates/footer');
  }

  function getDataEdit($id)
  {
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Edit Ruang';
    $data['dataEdit'] = $this->profile_model->getById($id);


    $this->load->view('templates/header', $data);
    $this->load->view('profile/edit', $data);
    $this->load->view('templates/footer');
  }

  public function editUser($id)
  {
    if (!isset($id)) redirect('profile/mahasiswa');

    $user = $this->profile_model;
    $validation = $this->form_validation;
    $validation->set_rules($user->rules());

    if ($validation->run()) {
      // setting konfigurasi upload
      $config['upload_path']    = './asset/img/profile/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_width']      = 2048;
      $config['max_height']     = 2048;

      // load library upload
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $error = $this->upload->display_errors();
        // menampilkan pesan error
        $this->session->set_flashdata('error', 'Maaf File/Ukuran Gambar Tidak Sesuai');
        redirect('profile/mahasiswa'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $user->update($id, $result);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('profile/mahasiswa'); //selesai proses di redirect
      }
    }

    $data["user"] = $user->getById($id);
    if (!$data["user"]) show_404();
  }


  public function ubahPassword()
  {
    $data['judul'] = 'My Profile';
    $data['user'] = $this->profile_model->getAll();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->form_validation->set_rules('password_ini', 'Password_ini', 'reuqired|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'reuqired|trim|min_length[5]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'reuqired|trim|min_length[5]|matches[new_password1]');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('profile/password', $data);
      $this->load->view('templates/footer');
    }
  }


  // =========================================================================================
  // ===================================  ADMIN  =============================================
  // =========================================================================================


  public function admin()
  {
    if (!$this->session->userdata('nip')) {
      redirect('blocked/notFoundAdmin');
    }

    $data['judul'] = 'My Profile';
    $data['admin'] = $this->m_profileAdmin->getAll();
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('profile/admin', $data);
    $this->load->view('templates/admin_footer');
  }

  function getDataEditAdmin($id)
  {
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['judul'] = 'Edit Ruang';
    $data['dataEditAdmin'] = $this->m_profileAdmin->getById($id);


    $this->load->view('templates/admin_header', $data);
    $this->load->view('profile/admin_edit', $data);
    $this->load->view('templates/admin_footer');
  }

  public function editAdmin($id)
  {
    if (!isset($id)) redirect('profile/admin');

    $admin = $this->m_profileAdmin;
    $validation = $this->form_validation;
    $validation->set_rules($admin->rules());

    if ($validation->run()) {
      // setting konfigurasi upload
      $config['upload_path']    = './asset/img/profile/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_width']      = 2048;
      $config['max_height']     = 2048;

      // load library upload
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $error = $this->upload->display_errors();
        // menampilkan pesan error
        $this->session->set_flashdata('error', 'Maaf File/Ukuran Gambar Tidak Sesuai');
        redirect('profile/admin'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $admin->update($id, $result);
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('profile/admin'); //selesai proses di redirect
      }
    }

    $data["admin"] = $admin->getById($id);
    if (!$data["admin"]) show_404();
  }


  public function ubahPasswordAdmin()
  {
    $data['judul'] = 'My Profile';
    $data['admin'] = $this->m_profileAdmin->getAll();
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();

    $this->form_validation->set_rules('password_ini', 'Password_ini', 'reuqired|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'reuqired|trim|min_length[5]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'reuqired|trim|min_length[5]|matches[new_password1]');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('profile/passwordAdmin', $data);
      $this->load->view('templates/footer');
    }
  }
}

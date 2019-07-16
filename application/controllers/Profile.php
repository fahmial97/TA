<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Profile_model');
    $this->load->model('M_profileAdmin');
    $this->load->helper('url');
  }

  public function mahasiswa()
  {
    if (!$this->session->userdata('nim')) {
      redirect('blocked/notFound');
    }

    $data['judul'] = 'My Profile';
    $data['user'] = $this->Profile_model->getAll();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('profile/mahasiswa', $data);
    $this->load->view('templates/footer');
  }

  function getDataEdit($id)
  {
    $decrypt = decrypt_url($id);
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data['judul'] = 'Edit Profile';
    $data['dataEdit'] = $this->Profile_model->getById($decrypt);
    $data['fakultas'] = $this->db->get('data_fakultas')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('profile/edit', $data);
    $this->load->view('templates/footer');
  }

  public function editUser($id)
  {
    if (!isset($id)) redirect('profile/mahasiswa');

    $user = $this->Profile_model;
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
    $data['judul'] = 'Ubah Password';
    $data['user'] = $this->Profile_model->getAll();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->form_validation->set_rules('password_ini', 'Password_ini', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[5]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Ulangi Password ', 'required|trim|min_length[5]|matches[new_password1]');


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('profile/password', $data);
      $this->load->view('templates/footer');
    } else {
      $password_ini = $this->input->post('password_ini');
      $new_password = $this->input->post('new_password1');

      if(!password_verify($password_ini, $data['user']['password'])){
        // jika password lama salah
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah </div> ');
        redirect('profile/ubahPassword'); 
        } else {
          if ($password_ini == $new_password) {
            // jika password lama sama dgn baru
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama  </div>');
            redirect('profile/ubahPassword');
        } else {
          //password sudah ok
          $pasword_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $pasword_hash);
          $this->db->where('nim', $this->session->userdata('nim'));
          $this->db->update('user');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah  </div>');
          redirect('profile/ubahPassword');
        }
      }
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
    $data['data_admin'] = $this->M_profileAdmin->getAll();
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();

    $this->load->view('templates/admin_header', $data);
    $this->load->view('profile/admin', $data);
    $this->load->view('templates/admin_footer');
  }

  public function edit_admin($id)
  {
    $decryptId = decrypt_url($id);
    $data['admin'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();
    $data['judul'] = 'Edit Profile Admin';
    $data['dataEditAdmin'] = $this->M_profileAdmin->getById($decryptId);

    $this->load->view('templates/admin_header', $data);
    $this->load->view('profile/admin_edit', $data);
    $this->load->view('templates/admin_footer');
  }

  public function editAdmin($id)
  {
    $admin = $this->M_profileAdmin;
    $validation = $this->form_validation;
    $validation->set_rules($admin->rules_edit());

    if ($validation->run()) {
      // setting konfigurasi upload
      $config['upload_path']    = './asset/img/profile/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_width']      = 2048;
      $config['max_height']     = 2048;

      // load library upload
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        // menampilkan pesan error
        $this->session->set_flashdata('error', 'Maaf File/Ukuran Gambar Tidak Sesuai');
        redirect('profile/admin'); //selesai proses di redirect
      } else {
        $result = $this->upload->data();
        $admin->update($id, $result);
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('profile/admin'); //selesai proses di redirect
      }
    }else{
      redirect('profile/edit_admin');
    }
  }


  public function ubahPasswordAdmin()
  {
    $data['judul'] = 'Ubah Password Admin';
    $data['admin'] = $this->M_profileAdmin->getAll();
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

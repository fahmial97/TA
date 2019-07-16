<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('nim')) {
      redirect('');
    }
    $this->form_validation->set_rules('nim', 'Nim', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {

      $data['judul'] = 'Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // validasinya sukses
      $this->_login();
    }
  }

  //login user
  private function _login()
  {
    $nim = $this->input->post('nim');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['nim' => $nim])->row_array();

    // jika usernya ada
    if ($user) {

      // usernya aktif
      if ($user['is_active'] == 1) {

        // cek password
        if (password_verify($password, $user['password'])) {

          $data = [
            'nim'     => $user['nim'],
            'role_id' => $user['role_id'],
            'id'      => $user['id']
          ];
          $this->session->set_userdata($data);
          redirect('home');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password Salah!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Gagal login, akun belum diaktivasi!
        </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Nim Belum Terdaftar</div>');
      redirect('auth');
    }
  }

  //registrasi user
  public function registration() //
  {
    if ($this->session->userdata('nim')) {
      redirect('');
    }
    $this->form_validation->set_rules('nim', 'Nim', 'required|trim|is_unique[user.nim]', [
      'is_unique' => 'Nim Sudah pernah digunakan!'
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email Sudah pernah digunakan!'
    ]);
    $this->form_validation->set_rules('no_telpon', 'No_telpon', 'required|trim');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'password tidak sama!',
      'min_length' => 'password terlalu singkat!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


    if ($this->form_validation->run() ==  false) {
      $data['judul'] = 'Registration';
      $data['fakultas'] = $this->db->get('data_fakultas')->result_array();

      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $data  = [
        'nim' => htmlspecialchars($this->input->post('nim', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'id_fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
        'email' => htmlspecialchars($email),
        'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'is_active' => 0,
        'date_created' => time(),
        'peminjaman' => 'belum'
      ];

      //siapkan token
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Selamat!, akun telah dibuat. Silahkan aktivasi email anda!
      </div>');

      redirect('auth');
    }
  }

  //aktivasi email
  // 1 x 24 jam
  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
       
        if (time() -  $user_token['date_created'] < (60 * 60 * 24)) {  //24 jam
          $this->db->update('user', ['is_active' => 1], ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    ' . $email . ' berhasil di aktivasi, Silahkan login!
                </div>');
          redirect('auth');
        } else {

          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Akun gagal diaktivasi, token sudah kadaluarsa, Silahkan daftar kembali!
                </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              Akun gagal diaktivasi, token salah!
            </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Akun gagal diaktivasi, email salah
        </div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'diskusiperpus@gmail.com',
      'smtp_pass' => '2019diskusiperpus',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from( 'diskusiperpus@gmail.com', 'Ruang Dikusi Perpustakaan Mercu Buana');
    $this->email->to($this->input->post('email'));

    $dataVerif = [
      'email' => $this->input->post('email'),
      'nama' => $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array()['nama'],
      'token' => $token
    ];

    if ($type == 'verify') {

      $this->email->subject('Verifikasi Akun');
      $this->load->model('Verify_model', 'verif');

      $this->email->message($this->verif->verif($dataVerif));
    } else if ($type == 'forgot') {

      $this->email->subject('Lupa Password');
      $this->load->model('Verify_model', 'verif');

      $this->email->message($this->verif->forgot($dataVerif));
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  //lupa password
  public function forgot()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
      'valid_email' => 'Email tidak valid!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data['judul'] = 'Lupa Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/forgot');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        //kalau ada
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                  Silahkan cek email anda, untuk reset password!
              </div>');
        redirect('auth/forgot');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                  Email tidak terdaftar atau belum diaktivasi!
              </div>');
        redirect('auth/forgot');
      }
    }
  }


  //ganti password
  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      //jika ada
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        //kalo ada
        if (time() -  $user_token['date_created'] < (60 * 60 * 24)) {

          //jika ada
          $this->session->set_userdata('reset_email', $email);
          $this->changePassword();
        } else {

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Reset password gagal, token sudah kadaluarsa!
                </div>');
          redirect('auth');
        }
      } else {

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset password gagal, token salah!
            </div>');
        redirect('auth');
      }
    } else {

      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal, email salah!
        </div>');
      redirect('auth');
    }
  }

  public function changePassword()
  {
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Change Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/changePassword');
      $this->load->view('templates/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->update('user', ['password' => $password], ['email' => $email]);

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password berhasil diubah, siahkan login!
        </div>');
      redirect('auth');
    }
  }

  //logout user
  public function logout()
  {
    $this->session->unset_userdata('nim');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Berhasil Log Out!</div>');
    redirect('auth');
  }

  // ==================================================================================================
  // ========================================== Role Admin ============================================
  // ==================================================================================================

  public function loginAdmin()
  {
    if ($this->session->userdata('nip')) {
      redirect('admin');
    }
    $this->form_validation->set_rules('nip', 'Nip', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {

      $data['judul'] = 'Login Admin';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login_admin', $data);
      $this->load->view('templates/auth_footer');
    } else {
      // validasinya sukses
      $this->_loginAdmin();
    }
  }

  private function _loginAdmin()
  {
    $nip      = $this->input->post('nip');
    $password = $this->input->post('password');
    $admin = $this->db->get_where('admin', ['nip' => $nip])->row_array();

    // jika usernya ada
    if ($admin) {
      // cek password
      // 
      if (password_verify($password, $admin['password'])) {

        $data = [
          'nip' => $admin['nip'],
          'role_id' => $admin['role_id'],
          'id' => $admin['id']
        ];
        $this->session->set_userdata($data);
        redirect('admin');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                        Password Salah!</div>');
        redirect('auth/loginAdmin');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                      Nim Belum Terdaftar</div>');
      redirect('auth/loginAdmin');
    }
  }

  public function logoutAdmin()
  {
    $this->session->unset_userdata('nip');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                      Berhasil Log Out!</div>');
    redirect('auth/loginAdmin');
  }
}



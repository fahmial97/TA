<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('profile_model');
    $this->load->helper('url');
  }

  public function mahasiswa()
  {
    $data['judul'] = 'Profile';
    $data['user'] = $this->profile_model->tampil_data()->result();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('profile/mahasiswa', $data);
    $this->load->view('templates/footer');
  }

  public function edit($nim = 0)
  {
  	$where = array('nim' => $nim);
  	$data['user'] = $this->profile_model->edit_data($where,'user')->result();
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    
    $this->load->view('templates/header', $data);
  	$this->load->view('profile/edit',$nim);
    $this->load->view('templates/footer');
  }

  public function update()
  {
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


  	$data = array(
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
      'image' => 'default.jpg',
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
  	);

  	$where = array(
  		'nim' => $nim
  	);

  	$this->profile->update_data($where,$data,'user');
  	redirect('profile/mahasiswa');
  }

}

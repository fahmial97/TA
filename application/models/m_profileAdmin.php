<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_profileAdmin extends CI_Model
{
    private $_table = "admin";

    public $id;
    public $nip;
    public $nama;
    public $email;
    public $no_telpon;
    public $image = "default.jpg";
    public $password;
    public $role_id = 1;
    public $date_created;

    function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim'
            ],

            [
                'field' => 'no_telpon',
                'label' => 'Nomer Telpon',
                'rules' => 'required|trim'
            ],
        ];
    }

    function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function getAllStatus()
    {
      return $this->db->get('status')->result_array();
    }

    public function save($result)
    {
      $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[admin.nip]', [
        'is_unique' => 'Nip Sudah pernah digunakan!'
      ]);
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
        'is_unique' => 'Email Sudah pernah digunakan!'
      ]);
      $this->form_validation->set_rules('no_telpon', 'No_telpon', 'required|trim');
      $this->form_validation->set_rules('password_admin1', 'Password', 'required|trim|min_length[5]|matches[password_admin2]', [
        'matches' => 'password tidak sama!',
        'min_length' => 'password terlalu singkat!'
      ]);
      $this->form_validation->set_rules('password_admin2', 'Password', 'required|trim|matches[password_admin1]');


      if ($this->form_validation->run() ==  false) {
        $data['judul'] = 'Registration';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration_Admin');
        $this->load->view('templates/auth_footer');
      } else {
        $data  = [
          'nip' => htmlspecialchars($this->input->post('nip', true)),
          'nama' => htmlspecialchars($this->input->post('nama', true)),
          'email' => htmlspecialchars($this->input->post('email', true)),
          'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
          'password' => md5($this->input->post('password_admin1')),
          'role_id' => 1,
          'date_created' => time(),
        ];

        $this->db->insert('admin', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Register Berhasil! Silahkan Login</div>');
        redirect('admin/listadmin');
      }
    }

    function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function update($id, $result) //variabel id diinclude di fungsi modelnya terus di cari pakai id nya
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'Email Sudah pernah digunakan!'
        ]);
        $this->form_validation->set_rules('no_telpon', 'No_telpon', 'required|trim');
        if (!$this->form_validation->run()) {
            echo 'gagal load';
        }
        // data yang diambil dari form terus di masukin ke databasenya
        $data = [
            'image' => $result['file_name'],
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telpon' => $this->input->post('no_telpon'),
            'role_id' => $this->input->post('role_id')

        ];

        $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }
}

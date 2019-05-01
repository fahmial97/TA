<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profileAdmin extends CI_Model
{
  private $_table = "admin";

  function rules()
  {
    return [

       [
        'field' => 'nip',
        'label' => 'Nip',
        'rules' => 'required|trim|is_unique[admin.nip]'
      ],
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|is_unique[admin.email]'
      ],
      [
        'field' => 'no_telpon',
        'label' => 'Nomer Telpon',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'password_admin1',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[5]|matches[password_admin2]',
          [
            'matches' => 'password tidak sama!',
            'min_length' => 'password terlalu singkat!'
          ]
      ],
      [
        'field' => 'password_admin2',
        'label' => 'Password',
        'rules' => 'required|trim|matches[password_admin1]'
      ]
    ];
  }

  function getAll()
  {
    return $this->db->get($this->_table)->result_array();
  }


  public function save($result)
  {
      $data  = [
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
        'password' => password_hash($this->input->post('password_admin1'),PASSWORD_DEFAULT),
        'image' => $result['file_name'],
        'role_id' => $this->input->post('user_role', true),
        'date_created' => time(),
      ];

      $this->db->insert('admin', $data);
    
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

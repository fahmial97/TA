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
        'rules' => 'required|trim|is_unique[admin.nip]',
        'errors' => [
          'required' => 'Wajib diisi!',
          'trim' => 'Wajib diisi!',
          'is_unique' => 'Nip sudah digunakan, masukan nip lain!'
        ]
      ],
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required|trim',
        'errors' => [
          'required' => 'Wajib diisi!',
          'trim' => 'Wajib diisi!'
        ]
      ],
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|trim|valid_email|is_unique[admin.email]',
        'errors' => [
          'required' => 'Wajib diisi!',
          'trim' => 'Wajib diisi!',
          'is_unique' => 'Email sudah digunakan, masukan email lain!'
        ]
      ],
      [
        'field' => 'no_telpon',
        'label' => 'Nomer Telpon',
        'rules' => 'required|trim',
        'errors' => [
          'required' => 'Wajib diisi!',
          'trim' => 'Wajib diisi!'
        ]
      ],
      [
        'field' => 'user_role',
        'label' => 'User Role',
        'rules' => 'required|is_natural_no_zero',
        'errors' => [
            'required' => 'Role akses wajib dipilih!',
            'is_natural_no_zero' => 'Role akses wajib dipilih!'
          ]
      ],
      [
        'field' => 'password_admin1',
        'label' => 'Password',
        'rules' => 'required|trim|min_length[5]|matches[password_admin2]',
        'errors' =>  [
            'matches' => 'Password tidak sama!',
            'required' => 'Wajib diisi!',
            'trim' => 'Wajib diisi!',
            'min_length' => 'Minimal 5 karakter!'
          ]
      ],
      [
        'field' => 'password_admin2',
        'label' => 'Password',
        'rules' => 'required|trim|matches[password_admin1]',
        'errors' =>  [
          'matches' => 'Password tidak sama!',
          'required' => 'Wajib diisi!',
          'trim' => 'Wajib diisi!'
        ]
      ]
    ];
  }

  function rules_edit()
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
        'rules' => 'required|trim|valid_email'
      ],
      [
        'field' => 'no_telpon',
        'label' => 'Nomer Telpon',
        'rules' => 'required|trim'
      ]
    ];
  }

  function getAll()
  {
    return $this->db->get($this->_table)->result_array();
  }

  public function save()
  {
    $data  = [
      'nip' => htmlspecialchars($this->input->post('nip', true)),
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
      'password' => password_hash($this->input->post('password_admin1',true),PASSWORD_DEFAULT),
      'image' => 'default.jpg',
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
    $cariDataGambar = $this->db->get_where('admin',['id'=>$id])->row_array()['image'];

    if($cariDataGambar != 'default.jpg'){
      unlink(FCPATH .'asset/img/profile/' . $cariDataGambar);
    }
    // data yang diambil dari form terus di masukin ke databasenya
    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'no_telpon' => $this->input->post('no_telpon'),
      'image' => $result['file_name']
    ];

    $this->db->update($this->_table, $data, ['id' => $id]);
  }

  public function delete($id)
  {
    $cariDataGambar = $this->db->get_where('admin',['id'=>$id])->row_array()['image'];

    if($cariDataGambar != 'default.jpg'){
      unlink(FCPATH .'asset/img/profile/' . $cariDataGambar);
    }

    $this->db->delete($this->_table, ['id' => $id]);
    
  }
}

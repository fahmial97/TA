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
        //   $this->db->select('admin'.'role_id','user_role.'.'id');
        //   $this->db->from('admin');
        // $this->db->join('user_role', 'user_role.id = admin.role_id');

        return $this->db->get($this->_table)->result();
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
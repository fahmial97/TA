<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile_model extends CI_Model
{
	private $_table = "user";

	public $id;
	public $nim;
	public $nama;
	public $fakultas;
	public $email;
	public $no_telpon;
	public $image = "default.jpg";
	public $password;
	public $role_id;

	function rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required|trim'
			],

			[
				'field' => 'fakultas',
				'label' => 'Fakultas',
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
		return $this->db->get($this->_table)->result();
	}
	function getById($id)
	{
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function update($id, $result) //variabel id diinclude di fungsi modelnya terus di cari pakai id nya
	{
		// data yang diambil dari form terus di masukin ke databasenya
		$data = [
			'image' => $result['file_name'],
			'nama' => $this->input->post('nama'),
			'fakultas' => $this->input->post('fakultas'),
			'email' => $this->input->post('email'),
			'no_telpon' => $this->input->post('no_telpon')
		];

		$this->db->update($this->_table, $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, ['id' => $id]);
	}
}

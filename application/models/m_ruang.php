<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_ruang extends CI_Model
{

  private $_table = "tb_ruang";

  public $id;
  public $image = "default.jpg";
  public $no_ruang;
  public $id_status;

  function rules()
  {
    return [
      [
        'field' => 'no_ruang',
        'label' => 'Nomor ruang',
        'rules' => 'required'
      ]
    ];
  }
  function getALLruang()
  {
    return $this->db->get_where($this->_table)->result();
  }

  function getAll()
  {
    $tersedia = $this->db->get_where($this->_table, ['id_status' => 1])->result();
    $sedangDigunakan = $this->db->get_where($this->_table, ['id_status' => 3])->result();

    if (count($tersedia) > 0) {
      return $tersedia;
    } else if (count($sedangDigunakan) > 0) {
      $this->db->select_min('id');
      $db_sedang = $this->db->get_where('proses_peminjaman', ['id_status' => 3, 'status_booking' => 2])->row_array();
      $db_data = $this->db->get_where('proses_peminjaman', ['id' => $db_sedang['id']])->row_array()['id_ruang'];

      if ($db_sedang['id'] != null) {
        return $this->db->get_where($this->_table, ['id' => $db_data])->result();
      } else {
        $db_proses = $this->db->get_where('proses_peminjaman', ['id_status' => 5])->result();

        if (count($db_proses) > 0) {
          return $db_proses;
        } else {
          // tampilkan semua tabel yg statusnya dipinjam/dipesan
          return $sedangDigunakan;
        }
      }
    } else {
      // jika tinggal proses
      $this->db->select_min('id');
      $db_sedang = $this->db->get_where('proses_peminjaman', ['id_status' => 5])->row_array()['id'];
      $db_data = $this->db->get_where('proses_peminjaman', ['id' => $db_sedang])->result();

      return $db_data;
    }
  }

  function getById($id)
  {
    $decrypt = decrypt_url($id);
    return $this->db->get_where($this->_table, ["id" => $decrypt])->row();
  }


  public function getAllStatus()
  {
    return $this->db->get('status')->result_array();
  }

  public function save($result)
  {
    $post = $this->input->post();
    $this->no_ruang = $post["no_ruang"];
    $this->id_status = $post["status"];
    $this->image = $result['file_name'];
    $this->db->insert($this->_table, $this);
  }

  public function update($id, $result) //variabel id diinclude di fungsi modelnya terus di cari pakai id nya
  {
    // data yang diambil dari form terus di masukin ke databasenya
    $data = [
      'image' => $result['file_name'],
      'no_ruang' => $this->input->post('no_ruang'),
      'id_status' => $this->input->post('id_status')
    ];

    $this->db->update($this->_table, $data, ['id' => $id]);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, ['id' => $id]);
  }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ruang extends CI_Model
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


  public function tersedia()
  {
    $this->db->where('id_status', 1);
    $data = $this->db->get($this->_table)->num_rows();

    return $data;
  }

  function getALLruang()
  {
    return $this->db->get_where($this->_table)->result();
  }

  public function getAllJam()
  {
    return $this->db->get('waktu_ruang')->result();
  }

  public function updateKeterangan()
  {
    $input = $this->input;
    $id = $input->post('idRuang');
    $data = [
      'id_keterangan' => 1,
      'keterangan' => $input->post('input_keterangan')
    ];
    $this->db->update( $this->_table,$data,['id'=>$id]);
  }

  public function updateWaktuRuang()
  {
    $input = $this->input;
    $id = $input->post('id');
    $data = [
      'status' => $input->post('status'),
      'jam_buka' => $input->post('jam_buka') . ':' . $input->post('menit_buka'),
      'jam_tutup' => $input->post('jam_tutup') . ':' . $input->post('menit_tutup')
    ];

    $this->db->update('waktu_ruang', $data, ['id' => $id]);

    if ($this->db->affected_rows() > 0) {
      return $this->session->set_flashdata('success', 'Berhasil update jadwal');
    } else {
      return $this->session->set_flashdata('error', 'Gagal update jadwal');
    }
  }

  public function getWaktuBuka()
  {
    return $this->db->get_where('waktu_ruang', ['id' => date('N', time())])->row();
  }

  public function getRuangNonAktif()
  {
    $keterangan = $this->db->get_where($this->_table, ['id_keterangan' => 1])->result();

    if(count($keterangan) > 0){
      return [
        'validasi' => 1,
        'data' => $keterangan
      ];
    }else{
      return ['validasi'=>0];
    }
  }

  function getAll()
  {
    $tersedia = $this->db->get_where($this->_table, ['id_status' => 1, 'id_keterangan' => 0])->result();
    $sedangDigunakan = $this->db->get_where($this->_table, ['id_status' => 3, 'id_keterangan' => 0])->result();
  
    if (count($tersedia) > 0) {
        return $tersedia;
      } else if (count($sedangDigunakan) > 0) {
        $this->db->select_min('id');
        $db_sedang = $this->db->get_where('proses_peminjaman', ['id_status' => 3, 'status_booking' => 2])->row_array();
        $db_data = $this->db->get_where('proses_peminjaman', ['id' => $db_sedang['id']])->row_array()['id_ruang'];

        if ($db_sedang['id'] != null) {
          return $this->db->get_where($this->_table, ['id' => $db_data])->result();
        } else {
          $db_proses = $this->db->get_where('proses_peminjaman', ['id_status' => 5 ])->result();

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

  public function getDataUserPeminjam()
  {
    $id = $this->input->post('id_user');
    return $this->db->get_where('user',['id'=>$id])->row_array();
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

  public function OffKeteranganRuang($id)
  {
    $this->db->update('tb_ruang', ['id_keterangan'=>0],['id'=> $id]);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, ['id' => $id]);
  }

  public function ubahStatus($status,$id)
  {
    if($status == 0){
      $this->db->update('waktu_ruang',['libur'=>1], ['id'=>$id]);
    }else{
      $this->db->update('waktu_ruang', ['libur' => 0], ['id' => $id]);
    }
  }
}

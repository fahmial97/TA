<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pinjam extends CI_Model
{

  private $_table = "proses_peminjaman";

  public function getAllPinjam()
  {
    $this->db->join('user', 'user.id = proses_peminjaman.id_user');
    $this->db->join('tb_ruang', 'tb_ruang.id = proses_peminjaman.id_ruang');
    $this->db->join('status', 'status.id = proses_peminjaman.id_status');

    $this->db->order_by('proses_peminjaman.id', 'desc');
    return  $this->db->get($this->_table)->result();
  }

  public function getDataPinjam($id)
  {
    return $this->db->get_where($this->_table, ["id" => $id])->row();
  }

  public function getDataPinjamByUser()
  {
    $this->db->get_where($this->_table, ["id" => $id])->row();
  }

  public function prosesPinjam()
  {

    $user = $_POST['id_user'];
    $tb_ruang = $_POST['id'];
    $status = 5;
    $jam_pinjam = time();
    $jam_selesai = strtotime('+2 hours', $jam_pinjam);
    $nim_pinjam = $_POST['nim_pinjam'];
    $nama_pinjam = $_POST['nama_pinjam'];
    $no_telpon_pinjam = $_POST['no_telpon_pinjam'];
    $nim = '';
    $nama = '';
    $nomer = '';

    foreach ($nim_pinjam as $key => $value) {
      $nim .= $value . ',';
      $nama .= $nama_pinjam[$key] . ',';
      $nomer .= $no_telpon_pinjam[$key] . ',';
    }

    $data = [
      'id_user' => $user,
      'id_ruang' => $tb_ruang,
      'id_status' => $status,
      'jam_pinjam' => $jam_pinjam,
      'jam_selesai' => $jam_selesai,
      'nama_pinjam' => $nama,
      'nim_pinjam' => $nim,
      'no_telpon_pinjam' => $nomer
    ];

    $this->db->update('tb_ruang', ['id_status' => 5], ['id' => $tb_ruang]);
    $this->db->insert('proses_peminjaman', $data);
  }

  public function getAllByUser($data)
  {
    $this->db->order_by('id', 'desc');
    $getPeminjaman = $this->db->get_where('proses_peminjaman', ['id_user' => $data])->result_array();

    return $data = [
      'peminjaman' => $getPeminjaman,
    ];
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, ['id' => $id]);
  }
}

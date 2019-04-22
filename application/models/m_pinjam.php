<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pinjam extends CI_Model
{

  private $_table = "proses_peminjaman";

  public function getAllPinjam()
  {
    $this->db->order_by('id', 'desc');
    return  $this->db->get($this->_table)->result();
  }

  public function getAllHistory($perpage, $offset)
  {
    $this->db->order_by('id', 'desc');
    return  $this->db->get($this->_table, $perpage, $offset)->result();
  }

  public function getDataPinjam($id)
  {
    return $this->db->get_where($this->_table, ["id" => $id])->row();
  }

  public function getDataPinjamByUser()
  {
    $this->db->get_where($this->_table, ["id" => $id])->row();
  }

  public function getDataUser()
  {
    $id_status = $this->input->post('id_user');
    $this->db->where('id_user', $id_status);
    $this->db->where('id_status', 1);
    $this->db->or_where('id_status', 2);
    $this->db->or_where('id_status', 3);
    $this->db->or_where('id_status', 5);
    $data = $this->db->get('proses_peminjaman')->result_array();

    return ($data != null) ? 1 : 0;
  }

  public function statusRuang()
  {
    $id = $this->input->post('id');
    return $this->db->get_where('tb_ruang', ['id' => $id])->row();
  }

  public function statsRuang()
  {
    $id = $this->input->post('id');
    $id_status = $this->input->post('id_status');

    return $this->db->get_where('proses_peminjaman', ['id_ruang' => $id, 'id_status' => $id_status])->row();
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
      'no_telpon_pinjam' => $nomer,
      'status_booking' => 2
    ];

    $this->db->update('tb_ruang', ['id_status' => 5], ['id' => $tb_ruang]);
    $this->db->insert('proses_peminjaman', $data);
  }

  public function prosesBooking($mulai)
  {
    $input = $this->input;

    $nim_pinjam = $input->post('nim_pinjam', true);
    $nama_pinjam = $input->post('nama_pinjam', true);
    $no_telpon_pinjam = $input->post('no_telpon_pinjam', true);
    $nim = '';
    $nama = '';
    $nomer = '';

    foreach ($nim_pinjam as $key => $value) {
      $nim .= $value . ',';
      $nama .= $nama_pinjam[$key] . ',';
      $nomer .= $no_telpon_pinjam[$key] . ',';
    }

    $data = [
      'id_user' => $input->post('id_user', true),
      'id_ruang' => $input->post('id', true),
      'id_status' => 2,
      'jam_pinjam' => $mulai,
      'jam_selesai' => strtotime('+2 hours', $mulai),
      'nama_pinjam' => $nama,
      'nim_pinjam' => $nim,
      'no_telpon_pinjam' => $nomer,
      'status_booking' => 2
    ];

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

<?php

function prosesHelpers($id_ruang)
{
  $ci = get_instance();
  $data = $ci->db->get_where('tb_ruang', ['id' => $id_ruang])->row_array();
  return $nilai = [
    'gambar' => $data['image'],
    'no_ruang' => $data['no_ruang']
  ];
}

function statusHelpers($status)
{
  $ci = get_instance();
  $status = $ci->db->get_where('status', ['id' => $status])->row_array();
  return $data = [
    'style' => $status['style'],
    'status' => $status['nama_status']
  ];
}

function getUserHelpers($userId)
{
  $ci = get_instance();
  return $ci->db->get_where('user', ['id' => $userId])->row_array();
}

function getRoleHelpers($RoleId)
{
  $ci = get_instance();
  return $ci->db->get_where('user_role', ['id' => $RoleId])->row_array();
}

function getDataHitungMundur($id)
{
  //ambil data waktu
  $ci = get_instance();
  $cari_waktu = $ci->db->get_where('proses_peminjaman', ['id_ruang' => $id, 'id_status' => 2])->row_array();

  if ($cari_waktu != null) {
    return $cari_waktu['jam_selesai'];
  } else {
    return $ci->db->get_where('proses_peminjaman', ['id_ruang' => $id, 'id_status' => 3])->row_array()['jam_selesai'];
  }
}

function dataFakultas($id)
{
  $ci = get_instance();
  return $ci->db->get_where('data_fakultas', ['id' => $id])->row_array()['nama_fakultas'];
}

function getHariIndonesia()
{
  return ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
}

function jumlah_ruang()
{
  $ci = get_instance();

  $ci->db->where('id_status', 2);
  $ci->db->or_where('id_status', 3);
  $ci->db->or_where('id_status', 5);
  $data = $ci->db->get('proses_peminjaman')->num_rows();

  return $data;  
}

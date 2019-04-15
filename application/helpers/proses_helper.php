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

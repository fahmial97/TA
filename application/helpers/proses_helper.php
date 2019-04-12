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

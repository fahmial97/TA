<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_validasi extends CI_Model
{
    public function validData($id)
    {
        $data_id_ruang = $this->db->get_where('proses_peminjaman', ['id' => $id])->row_array()['id_ruang'];

        $this->db->update('proses_peminjaman', ['id_status' => 3], ['id' => $id]);
        $this->db->update('tb_ruang', ['id_status' => 3], ['id' => $data_id_ruang]);
    }

    public function validCancel($id)
    {
        $data_id_ruang = $this->db->get_where('proses_peminjaman', ['id' => $id])->row_array()['id_ruang'];
        $this->db->update('proses_peminjaman', ['id_status' => 7], ['id' => $id]);
        $this->db->update('tb_ruang', ['id_status' => 1], ['id' => $data_id_ruang]);
    }

    public function validSelesai($id)
    {
        $data_id_ruang = $this->db->get_where('proses_peminjaman', ['id' => $id])->row_array()['id_ruang'];
        $this->db->update('proses_peminjaman', ['id_status' => 6], ['id' => $id]);
        $this->db->update('tb_ruang', ['id_status' => 1], ['id' => $data_id_ruang]);
    }
}

/* End of file M_validasi.php */

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

        $this->db->update('proses_peminjaman', ['id_status' => 6,'status_booking'=>2], ['id' => $id]);

        $this->_gantiDipesan($data_id_ruang);
    }

    private function _gantiDipesan($data_id_ruang){
        $cariDataProses = $this->db->get_where('proses_peminjaman',['id_ruang'=>$data_id_ruang, 'id_status'=>2])->row_array()['id'];

        //validasi data yang statusnya dipesan, jika ada idnya proses update datanya agar masuk di proses
        if($cariDataProses != null){
            //update data pada tabel yang statusnya sedang dipesan agar dapat segera di proses
            $dataUpdate = [
                'id_status' => 5,
                'jam_pinjam' => time(),
                'jam_selesai' => strtotime('+2 hours', time())
            ];
            $this->db->update('proses_peminjaman',$dataUpdate, ['id'=>$cariDataProses]);
            $this->db->update('tb_ruang', ['id_status' => 5], ['id' => $data_id_ruang]);
        }else{

            $this->db->update('tb_ruang', ['id_status' => 1], ['id' => $data_id_ruang]);
        }
    }
}

/* End of file M_validasi.php */

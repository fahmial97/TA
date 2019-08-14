<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_autoChange extends CI_Model
{

    public function prosesData()
    {
        $this->_autoChangeProses(); // otomatis mengubah status proses menjadi cancel jika >10 menit
        $this->_autoChangeSedang(); // mengubah status sedang digunakan menjadi selesai, kemudian menjadi tersedia
        $this->_autoChangeUserPesan(); // mengubah status peminjaman bagi user setiap jam 1 pagi
        $this->_autoCloseRuang(); // otomatis tutup/buka ruang perhari
        $this->_autoChangeStatusPeminjaman(); // mengubah status peminjaman bagi user setiap jam 1 pagi
    }

    // otomatis mengubah status proses menjadi cancel jika >10 menit
    private function _autoChangeProses()
    {
        $data = $this->db->get_where('proses_peminjaman', ['id_status' => 5])->result_array();

        if ($data > 0) {
            foreach ($data as $d) {
                $dataPinjam = strtotime('+11 min', $d['jam_pinjam']);
                if (time() > $dataPinjam) {
                    $this->db->update('proses_peminjaman', ['id_status' => 7, 'status_booking' => 2], ['id' => $d['id']]);
                    $this->db->update('tb_ruang', ['id_status' => 1], ['id' => $d['id_ruang']]);
                }
            }
        }
    }

// mengubah status sedang digunakan menjadi selesai, kemudian menjadi tersedia
    private function _autoChangeSedang()
    {
        $data = $this->db->get_where('proses_peminjaman', ['id_status' => 3])->result_array();
        if ($data > 0) {
            foreach ($data as $d) {
                if (time() > $d['jam_selesai']) {
                    $this->db->update('proses_peminjaman', ['id_status' => 6, 'status_booking' => 2], ['id' => $d['id']]);

                    $cariDataDipinjam = $this->db->get_where('proses_peminjaman', ['id_status' => 2, 'id_ruang' => $d['id_ruang']])->row_array()['id'];

                    if ($cariDataDipinjam != null) {
                        $dataUpdate = [
                            'id_status' => 5,
                            'jam_pinjam' => time(),
                            'jam_selesai' => strtotime('+2 hours', time())
                        ];
                        $this->db->update('proses_peminjaman', $dataUpdate, ['id' => $cariDataDipinjam]);
                        $this->db->update('tb_ruang', ['id_status' => 5], ['id' => $d['id_ruang']]);
                    } else {
                        $this->db->update('tb_ruang', ['id_status' => 1], ['id' => $d['id_ruang']]);
                    }
                }
            }
        }
    }

    // 
    private function _autoChangeUserPesan()
    {
        $this->db->select_min('id');
        $data = $this->db->get_where('proses_peminjaman',['id_status'=>2])->row_array()['id'];

        if($data != null){
            $cariRuang = $this->db->get_where('tb_ruang',['id_status'=>1])->row_array()['id'];

            if($cariRuang != null){

                $this->db->where('id_ruang', $cariRuang);
                $this->db->where('id_status', 3);
                $this->db->or_where('id_status', 5);
                $cariPesan = $this->db->get('proses_peminjaman')->result_array();

                if(count($cariPesan) < 1){
                    $dataUpdate = [
                        'id_ruang' => $cariRuang,
                        'id_status' => 5,
                        'jam_pinjam' => time(),
                        'jam_selesai' => strtotime('+2 hours', time())
                    ];
                    $this->db->update('proses_peminjaman',$dataUpdate,['id'=>$data]);
                }
                
            }
            
        }
    }

// otomatis tutup/buka ruang perhari
    private function _autoCloseRuang()
    {
        $data = $this->db->get_where('waktu_ruang',['id'=>date('N',time())])->row_array();
        
        $waktuBuka = $data['jam_buka'];
        $waktuTutup = $data['jam_tutup'];

        if($waktuBuka < date("H:i",time()) && $waktuTutup > date("H:i",time()) ){
            $waktuPlus = date('H:i', strtotime($waktuBuka) + 180); //waktu buka + 3 menit

            $dataRuang = $this->db->get('tb_ruang')->result_array();

            if ($waktuBuka < date("H:i", time()) && $waktuPlus > date("H:i", time()) ) {
                foreach ($dataRuang as $data) {
                    $this->db->update('tb_ruang', ['id_status' => 1], ['id' => $data['id']]);
                }
            }
            $this->db->update('waktu_ruang', ['status'=>'buka'],['id'=>date('N',time())]);
            
        }else {
            $this->db->update('waktu_ruang', ['status'=>'tutup'],['id'=>date('N',time())]);
            $dataRuang = $this->db->get('tb_ruang')->result_array();
            
            foreach($dataRuang as $data){
                $this->db->update('tb_ruang',['id_status'=>4],['id'=>$data['id']]);
            }

            $this->db->where('id_status', 2);
            $this->db->or_where('id_status', 3);
            $this->db->or_where('id_status', 5);
            $cariPesan = $this->db->get('proses_peminjaman')->result_array();
            if(count($cariPesan) > 0){
                foreach ($cariPesan as $value) {
                    $this->db->update('proses_peminjaman', ['id_status'=>6],['id'=>$value['id']]);
                }
            }
            
        } 
    }


// mengubah status peminjaman bagi user setiap jam 1 pagi
    public function _autoChangeStatusPeminjaman()
    {  
        if(date('H:i',time()) > '01:00' && date('H:i',time()) < '01:05' ){
            $dataUser = $this->db->get_where('user',['peminjaman'=>'sudah'])->result_array();

            foreach ($dataUser as $value) {
                $this->db->update('user',['peminjaman'=>'belum'],['id'=>$value['id']]);
            }
        }
    }

}

/* End of file M_autoChange.php */

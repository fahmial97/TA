<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_autoChange extends CI_Model {

    public function prosesData()
    {
        $this->_autoChangeProses();
        $this->_autoChangeSedang();
    }

    private function _autoChangeProses(){
        $data = $this->db->get_where('proses_peminjaman',['id_status'=>5])->result_array();

        if($data > 0){
            foreach($data as $d){
                $dataPinjam = strtotime('+11 min',$d['jam_pinjam']);                
                if(time() > $dataPinjam){
                    $this->db->update('proses_peminjaman', ['id_status'=>7,'status_booking'=>2], ['id'=>$d['id']]);
                    $this->db->update('tb_ruang', ['id_status'=>1],['id'=>$d['id_ruang']]);
                }
            }
        }
    }

    private function _autoChangeSedang(){
        $data = $this->db->get_where('proses_peminjaman',['id_status'=>3])->result_array();
        if($data > 0){
            foreach($data as $d){              
                if(time() > $d['jam_selesai']){
                    $this->db->update('proses_peminjaman', ['id_status'=>6,'status_booking'=>2], ['id'=>$d['id']]);

                    $cariDataDipinjam = $this->db->get_where('proses_peminjaman',['id_status'=>2,'id_ruang'=>$d['id_ruang']])->row_array()['id'];

                    if($cariDataDipinjam != null){
                        $dataUpdate = [
                            'id_status' => 5,
                            'jam_pinjam' => time(),
                            'jam_selesai' => strtotime('+2 hours', time())
                        ];
                        $this->db->update('proses_peminjaman',$dataUpdate, ['id'=>$cariDataDipinjam]);
                        $this->db->update('tb_ruang', ['id_status'=>5],['id'=>$d['id_ruang']]);
                    }else{
                        $this->db->update('tb_ruang', ['id_status'=>1],['id'=>$d['id_ruang']]);
                    }
                    
                }
            }
        }
    }

}

/* End of file M_autoChange.php */

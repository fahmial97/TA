<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pinjam extends CI_Model{

  private $_table = "proses_peminjaman";

  public $id;
  public $id_user;
  public $id_ruang;
  public $jam_pinjam;
  public $jam_selesai;
  public $nama;
  public $nim;
  public $fakultas;

    public function getAllPinjam()
    {
      $this->db->join('user', 'user.id = proses_peminjaman.id_user');
      $this->db->join('tb_ruang', 'tb_ruang.id = proses_peminjaman.id_ruang');
      return $this->db->get($this->_table)->result();
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
     $jam_pinjam = time();
     $jam_selesai = strtotime('+2 hours',$jam_pinjam);
     $nim_pinjam = $_POST['nim_pinjam'];
     $nama_pinjam = $_POST['nama_pinjam'];
     $no_telpon_pinjam = $_POST['no_telpon_pinjam'];
     $nim = '';
     $nama = '';
     $nomer = '';


     foreach ($nim_pinjam as $key => $value) {
       $nim .= $value.',';
       $nama .= $nama_pinjam[$key].',';
       $nomer .= $no_telpon_pinjam[$key].',';
     }

     $data = [
       'id_user' => $user,
       'id_ruang' => $tb_ruang,
       'jam_pinjam' => $jam_pinjam,
       'jam_selesai' => $jam_selesai,
       'nama_pinjam' => $nama,
       'nim_pinjam' => $nim,
       'no_telpon_pinjam' => $nomer
     ];

     $this->db->insert('proses_peminjaman',$data);

   }

     public function getAllByUser($data)
   {
    // $id_user = $data;
    // $this->db->select('*');
    // $this->db->from('tb_ruang');
    // $this->db->join('tb_ruang', 'proses_peminjaman.id_ruang = tb_ruang.id');
    //   $this->db->where('id_ruang',$id_user);
    // $query = $this->db->get()->result_array();
    $getPeminjaman = $this->db->get_where('proses_peminjaman',['id_user'=>$data])->result_array();
    // $getIdRuang = $this->db->get_where('tb_ruang',['id'=>$getPeminjaman->row()->id_ruang])->result_array();

    return $data = [
      'peminjaman' => $getPeminjaman,
      // 'getruang' => $getIdRuang
    ];
   }
}

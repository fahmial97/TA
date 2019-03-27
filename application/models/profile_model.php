<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile_model extends CI_Model{

	function tampil_data()
	{
		return $this->db->get('user');
	}

	function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
}

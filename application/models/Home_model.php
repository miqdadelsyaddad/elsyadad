<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function getrow($where, $tabel)
	{
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get()->row();
	}
}

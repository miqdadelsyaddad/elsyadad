<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Login Administrator';
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Kolom ini tidak boleh kosong',
		]);
		$this->form_validation->set_rules('sandi', 'Sandi', 'required', [
			'required' => 'Kolom ini tidak boleh kosong',
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		} else {
			$cek = $this->_cek();
		}
	}

	private function _cek()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('sandi');

		$cekadm = $this->log_mod($username);
		if ($cekadm) {
			if (password_verify($password, $cekadm['admin_sandi'])) {
				$admin = array(
					'adminid'           => $cekadm['admin_id'],
					'adminuname'        => $cekadm['admin_username'],
					'nama'              => $cekadm['admin_nama'],
					'adminmail'         => $cekadm['admin_email'],
					'nohp'              => $cekadm['nohp'],
					'adminsandi'        => $cekadm['admin_sandi'],
					'adminfoto'         => $cekadm['admin_foto'],
					'status_login_'     => 'login',
					'level'             => $cekadm['level'],
				);
				if ($cekadm['level'] == 'Admin') {
					$this->session->set_userdata($admin);
					redirect('admin');
				} else {
					$this->session->set_userdata($admin);
					redirect('admin');
				}
			} else {
				$this->session->set_flashdata('error', 'Password anda salah');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('error', 'Akun tidak terdaftar');
			redirect('auth');
		}
	}

	private function log_mod($username)
	{
		$this->db->where('admin_username', $username);
		$cek = $this->db->get('tb_admin')->row_array();
		return $cek;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}

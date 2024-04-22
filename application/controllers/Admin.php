<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($this->session->userdata('status_login_') != 'login') {
			redirect('auth');
		}
	}
	function bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
	public function index()
	{
		redirect('admin/dashboard');
	}
	public function dashboard()
	{
		$title = $this->session->userdata('level');
		$data['title'] = 'Dashboard ' . $title;
		$data['totalwarkah'] = $this->db->get('tb_warkah')->num_rows();
		$data['totalpeminjaman'] = $this->db->get('tb_peminjaman')->num_rows();
		$data['totalakun'] = $this->db->get('tb_users')->num_rows();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tema/admin/footer');
	}
	public function peminjamandaftar()
	{
		$data['title'] = 'Data Peminjaman';
		$data['riwayat'] = $this->db->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->order_by('tanggalpeminjaman', 'desc')->order_by('idpeminjaman', 'desc')->get('tb_peminjaman')->result();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/peminjamandaftar', $data);
		$this->load->view('tema/admin/footer');
	}
	public function peminjamantambah()
	{
		$this->form_validation->set_rules('namapeminjam', 'namapeminjam', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong',
		]);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Form Peminjaman';
			$data['akun'] = $this->db->get('tb_users')->result();
			$data['warkah'] = $this->db->order_by('warkah_id', 'desc')->get('tb_warkah')->result();
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/peminjamantambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'namapeminjam'			=>	$this->input->post('namapeminjam'),
				'warkah_id'			=>	$this->input->post('warkah_id'),
				'nohak'			=>	$this->input->post('nohak'),
				'tanggalpeminjaman'			=>	$this->input->post('tanggalpeminjaman'),
				'namapetugas'			=>	$this->input->post('namapetugas'),
				'statuspeminjaman'			=>	'Belum Di Kembalikan',
			);
			$this->db->insert('tb_peminjaman', $data);
			$this->session->set_flashdata('flash', 'Peminjaman Berhasil Di Tambah');
			redirect('admin/peminjamandaftar');
		}
	}
	public function peminjamandetail($id)
	{
		$this->form_validation->set_rules('tanggalpengembalian', 'tanggalpengembalian', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong',
		]);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Detail Peminjaman';
			$data['row'] = $this->db->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->where('idpeminjaman', $id)->get('tb_peminjaman')->row();
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/peminjamandetail', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$simpan = [
				'idpeminjaman'			=>	$id,
				'tanggalpengembalian'			=>	$this->input->post('tanggalpengembalian'),
				'namapetugaspengembalian'			=>	$this->input->post('namapetugaspengembalian'),
			];
			$this->db->insert('tb_pengembalian', $simpan);

			$update = [
				'statuspeminjaman' => 'Sudah Di Kembalikan',
			];
			$this->db->where('idpeminjaman', $id);
			$this->db->update('tb_peminjaman', $update);
			$this->session->set_flashdata('flash', 'Berhasil Mengembalikan');
			redirect('admin/peminjamandaftar');
		}
	}
	public function peminjamanhapus($id)
	{
		$this->db->where('idpeminjaman', $id);
		$this->db->delete('tb_peminjaman');
		$this->session->set_flashdata('flash', 'Data Berhasil Di Hapus');
		redirect('admin/peminjamandaftar');
	}
	public function pengembaliandaftar()
	{
		$data['title'] = 'Data Pengembalian';
		$data['riwayat'] = $this->db->join('tb_peminjaman', 'tb_pengembalian.idpeminjaman = tb_peminjaman.idpeminjaman')->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->order_by('tanggalpengembalian', 'desc')->order_by('idpengembalian', 'desc')->get('tb_pengembalian')->result();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/pengembaliandaftar', $data);
		$this->load->view('tema/admin/footer');
	}
	public function pengembaliandetail($id)
	{
		$data['title'] = 'Detail Pengembalian';
		$data['row'] = $this->db->join('tb_peminjaman', 'tb_pengembalian.idpeminjaman = tb_peminjaman.idpeminjaman')->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->where('idpengembalian', $id)->get('tb_pengembalian')->row();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/pengembaliandetail', $data);
		$this->load->view('tema/admin/footer');
	}
	public function pengembalianhapus($id, $idpeminjaman)
	{
		$update = [
			'statuspeminjaman' => 'Belum Di Kembalikan',
		];
		$this->db->where('idpeminjaman', $idpeminjaman);
		$this->db->update('tb_peminjaman', $update);

		$this->db->where('idpengembalian', $id);
		$this->db->delete('tb_pengembalian');
		$this->session->set_flashdata('flash', 'Data Berhasil Di Hapus');
		redirect('admin/pengembaliandaftar');
	}
	public function edit_profil()
	{
		$data['title'] = 'Perbaharui Profil Saya';
		$data['profilsaya'] = $this->Admin_model->profilku();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_profil', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_ganti_profil();
		}
	}
	public function edit_sandi()
	{
		$data['title'] = 'Perbaharui Kata Sandi Saya';
		$this->form_validation->set_rules('sandi2', 'sandi2', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi1', 'sandi1', 'required|matches[sandi2]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi baru harus sama'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_sandi', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_ganti_password();
		}
	}
	public function penggunadaftar()
	{
		$data['title'] = 'Data Pengguna';
		$data['pengguna'] = $this->Admin_model->getresult(array('admin_id !=' => $this->session->userdata('adminid')), 'tb_admin');
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/penggunadaftar', $data);
		$this->load->view('tema/admin/footer');
	}
	public function penggunatambah()
	{
		$data['title'] = 'Tambah Pengguna Baru';
		$data['rk'] = '';
		$this->form_validation->set_rules('admin_nama', 'admin_nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/penggunatambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$simpan = [
				'admin_username' => $this->input->post('admin_username'),
				'admin_nama' => $this->input->post('admin_nama'),
				'admin_email' => $this->input->post('admin_email'),
				'nohp' => $this->input->post('nohp'),
				'admin_foto' => 'user.png',
				'admin_sandi' =>	password_hash($this->input->post('admin_sandi'), PASSWORD_DEFAULT),
				'level' => 'Admin',
			];
			$this->db->insert('tb_admin', $simpan);
			$this->session->set_flashdata('flash', 'Pengguna baru berhasil ditambahkan');
			redirect('admin/penggunadaftar');
		}
	}
	public function penggunaedit($id)
	{
		$data['title'] = 'Edit Pengguna';
		$data['pengguna'] = $this->Admin_model->getrow(array('admin_id' => $id), 'tb_admin');
		$this->form_validation->set_rules('admin_nama', 'admin_nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/penggunaedit', $data);
			$this->load->view('tema/admin/footer');
		} else {
			if ($this->input->post('admin_sandi') != "") {
				$password = password_hash($this->input->post('admin_sandi'), PASSWORD_DEFAULT);
			} else {
				$password = $this->input->post('passwordlama');
			}
			$simpan = [
				'admin_username' => $this->input->post('admin_username'),
				'admin_nama' => $this->input->post('admin_nama'),
				'admin_email' => $this->input->post('admin_email'),
				'nohp' => $this->input->post('nohp'),
				'admin_sandi' => $password,
				'level' => 'Admin',
			];
			$this->db->where('admin_id', $id);
			$this->db->update('tb_admin', $simpan);
			$this->session->set_flashdata('flash', 'Pengguna berhasil diperbaharui');
			redirect('admin/penggunadaftar');
		}
	}
	public function penggunahapus($id)
	{
		$this->db->where('admin_id', $id);
		$this->db->delete('tb_admin');
		$this->session->set_flashdata('flash', 'Pengguna berhasil dihapus');
		redirect('admin/penggunadaftar');
	}
	public function akundaftar()
	{
		$data['title'] = 'Data Akun Pegawai';
		$this->db->order_by('user_id', 'DESC');
		$data['akun'] = $this->db->get('tb_users')->result_array();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/akundaftar', $data);
		$this->load->view('tema/admin/footer');
	}
	public function akuntambah()
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$data['title'] = 'Tambah Akun Pegawai';
		$data['rk'] = '';
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/akuntambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->db->select('RIGHT(tb_users.idkode,6) as idkode', FALSE);
			$this->db->order_by('idkode', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('tb_users');
			if ($query->num_rows() != 0) {
				$data = $query->row();
				$kode = intval($data->idkode) + 1;
			} else {
				$kode = 1;
			}
			$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
			$kodetampil = "050412" . $batas;
			$idkode = $kodetampil;
			$simpan = [
				'idkode' => $idkode,
				'user_nama'				=>	ucwords($this->input->post('nama')),
				'jeniskelamin'			=>	$this->input->post('jeniskelamin'),
				'user_email'			=>	strtolower($this->input->post('email')),
				'user_sandi'			=>	password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nohp'					=>	$this->input->post('nohp'),
				'alamat'				=>	$this->input->post('alamat'),
			];
			$this->db->insert('tb_users', $simpan);
			$this->session->set_flashdata('flash', 'Akun baru berhasil ditambahkan');
			redirect('admin/akundaftar');
		}
	}
	public function akunedit($id)
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$data['title'] = 'Edit akun';
		$data['akun'] = $this->Admin_model->getrow(array('user_id' => $id), 'tb_users');
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/akunedit', $data);
			$this->load->view('tema/admin/footer');
		} else {
			if ($this->input->post('password') != "") {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			} else {
				$password = $this->input->post('passwordlama');
			}
			$simpan = [
				'user_nama'				=>	ucwords($this->input->post('nama')),
				'jeniskelamin'			=>	$this->input->post('jeniskelamin'),
				'user_email'			=>	strtolower($this->input->post('email')),
				'user_sandi'			=>	$password,
				'nohp'					=>	$this->input->post('nohp'),
				'alamat'				=>	$this->input->post('alamat'),
			];
			$this->db->where('user_id', $id);
			$update = $this->db->update('tb_users', $simpan);
			$this->session->set_flashdata('flash', 'Akun berhasil diperbaharui');
			redirect('admin/akunedit/' . $id);
		}
	}
	public function akunhapus($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('tb_users');
		$this->session->set_flashdata('flash', 'Akun Berhasil Di Hapus');
		redirect('admin/akundaftar');
	}
	public function warkahdaftar()
	{
		$data['title'] = 'Data Warkah';
		$data['warkah'] = $this->db->order_by('warkah_id', 'desc')->get('tb_warkah')->result_array();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/warkahdaftar', $data);
		$this->load->view('tema/admin/footer');
	}
	public function warkahtambah()
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$data['title'] = 'Tambah Warkah';
		$this->form_validation->set_rules('nowarkah', 'nowarkah', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/warkahtambah', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$nowarkah = $this->input->post('nowarkah');
			$nohak = $this->input->post('nohak');
			$tahun = $this->input->post('tahun');
			$jenis = $this->input->post('jenis');
			$namapemeganghak = ucwords($this->input->post('namapemeganghak'));
			$kecamatan = $this->input->post('kecamatan');
			$kota = $this->input->post('kota');
			$data = array(
				'nowarkah'				=>	$nowarkah,
				'nohak'				=>	$nohak,
				'tahun'				=>	$tahun,
				'jenis'				=>	$jenis,
				'namapemeganghak'				=>	$namapemeganghak,
				'kecamatan'				=>	$kecamatan,
				'kota'				=>	$kota,
			);
			$this->db->insert('tb_warkah', $data);
			$this->session->set_flashdata('flash', 'Warkah baru berhasil ditambahkan');
			redirect('admin/warkahdaftar');
		}
	}
	public function warkahedit($id)
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$data['title'] = 'Edit Warkah';
		$data['warkahid'] = $this->db->where('warkah_id ', $id)->get('tb_warkah')->row_array();
		$this->form_validation->set_rules('nowarkah', 'nowarkah', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/warkahedit', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$nowarkah = $this->input->post('nowarkah');
			$nohak = $this->input->post('nohak');
			$tahun = $this->input->post('tahun');
			$jenis = $this->input->post('jenis');
			$namapemeganghak = ucwords($this->input->post('namapemeganghak'));
			$kecamatan = $this->input->post('kecamatan');
			$kota = $this->input->post('kota');
			$data = array(
				'nowarkah'				=>	$nowarkah,
				'nohak'				=>	$nohak,
				'tahun'				=>	$tahun,
				'jenis'				=>	$jenis,
				'namapemeganghak'				=>	$namapemeganghak,
				'kecamatan'				=>	$kecamatan,
				'kota'				=>	$kota,
			);
			$this->db->where('warkah_id ', $this->input->post('warkah_id'));
			$this->db->update('tb_warkah', $data);
			$this->session->set_flashdata('flash', 'Warkah berhasil diperbaharui');
			redirect('admin/warkahdaftar');
		}
	}
	public function warkahdetail($id)
	{
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata('error', 'Maaf, anda tidak punya hak untuk mengakses halaman ini');
			redirect('admin');
		}
		$data['title'] = 'Detail Warkah';
		$data['row'] = $this->db->where('warkah_id ', $id)->get('tb_warkah')->row();
		$this->form_validation->set_rules('nowarkah', 'nowarkah', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/warkahdetail', $data);
		$this->load->view('tema/admin/footer');
	}
	public function warkahhapus($id)
	{
		$this->db->where('warkah_id ', $id)->delete('tb_warkah');
		$this->session->set_flashdata('flash', 'Warkah berhasil dihapus');
		redirect('admin/warkahdaftar');
	}
}

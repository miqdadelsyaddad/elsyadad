<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Admin_model');
		$this->load->helper('url');
	}
	public function index()
	{
		$data['title'] = 'Beranda';
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/index');
		$this->load->view('tema/home/footer');
	}
	public function formpeminjaman()
	{
		if ($this->session->userdata('loginstatus') != '6484bbvnvfdswuieywor3443993') {
			$this->session->set_flashdata('error', 'Gagal, harap login terlebih dahulu');
			redirect('home/login');
		}
		$data['title'] = 'Form Peminjaman';
		$this->form_validation->set_rules('kontak', 'kontak', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong',
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/formpeminjaman', $data);
			$this->load->view('tema/home/footer');
		} else {
			$ukurankertas = $this->input->post('ukurankertas');
			$warna = $this->input->post('warna');
			$jumlahlembar = $this->input->post('jumlahlembar');
			$pilihjenisjilid = $this->input->post('pilihjenisjilid');
			$jenisjilid = $this->input->post('jenisjilid');
			$warnasampul = $this->input->post('warnasampul');
			$harga = 0;
			$hargajilid = 0;
			if ($warna == 'Print Warna') {
				$harga = 1000;
			} else {
				$harga = 500;
			}
			if ($pilihjenisjilid == 'Ya') {
				if ($jenisjilid == 'Jilid Atntero') {
					$hargajilid = 3000;
				} else {
					$hargajilid = 2000;
				}
				$warnasampul = $this->input->post('warnasampul');
			} else {
				$hargajilid = 0;
				$warnasampul = "";
				$jenisjilid = "-";
			}
			$totalharga = (($harga * $jumlahlembar) * $this->input->post('rangkap')) + ($hargajilid * $this->input->post('rangkap'));
			$data = array(
				'user_id'			=>	$this->session->userdata('userid'),
				'kontak'			=>	$this->input->post('kontak'),
				'jumlahlembar'			=>	$jumlahlembar,
				'jenisjilid'			=>	$jenisjilid,
				'warnasampul'			=>	$warnasampul,
				'ukurankertas'			=>	$ukurankertas,
				'warna'			=>	$this->input->post('warna'),
				'rangkap'			=>	$this->input->post('rangkap'),
				'catatan'			=>	$this->input->post('catatan'),
				'harga'			=>	$harga,
				'hargajilid'			=>	$hargajilid,
				'totalharga'			=>	$totalharga,
				'status' => 'Menunggu Konfirmasi Admin Toko',
			);
			$config['upload_path'] = './upload/foto/';
			$config['allowed_types'] = '*';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data();
					$data['file'] = $gambar['file_name'];
				}
			}
			$this->db->insert('tb_peminjaman', $data);
			$idpeminjaman = $this->db->insert_id();
			$this->session->set_flashdata('flash', 'Peminjaman Berhasil');
			redirect('home/peminjamandetail/' . $idpeminjaman);
		}
	}
	public function warkahdetail($id)
	{
		$data['title'] = 'Detail Warkah';
		$data['row'] = $this->db->where('warkah_id ', $id)->get('tb_warkah')->row();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/warkahdetail', $data);
		$this->load->view('tema/home/footer');
	}
	public function peminjamandaftar()
	{
		$data['title'] = 'Daftar Peminjaman';
		$data['riwayat'] = $this->db->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->order_by('tanggalpeminjaman', 'desc')->order_by('idpeminjaman', 'desc')->get('tb_peminjaman')->result();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/peminjamandaftar', $data);
		$this->load->view('tema/home/footer');
	}
	public function peminjamandetail($id)
	{
		$data['title'] = 'Beranda';
		$data['row'] = $this->db->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->where('idpeminjaman', $id)->get('tb_peminjaman')->row();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/peminjamandetail', $data);
		$this->load->view('tema/home/footer');
	}
	public function pengembaliandaftar()
	{
		$data['title'] = 'Daftar Pengembalian';
		$data['riwayat'] = $this->db->join('tb_peminjaman', 'tb_pengembalian.idpeminjaman = tb_peminjaman.idpeminjaman')->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->order_by('tanggalpengembalian', 'desc')->order_by('idpengembalian', 'desc')->get('tb_pengembalian')->result();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/pengembaliandaftar', $data);
		$this->load->view('tema/home/footer');
	}
	public function pengembaliandetail($id)
	{
		$data['title'] = 'Beranda';
		$data['row'] = $this->db->join('tb_peminjaman', 'tb_pengembalian.idpeminjaman = tb_peminjaman.idpeminjaman')->join('tb_warkah', 'tb_peminjaman.warkah_id = tb_warkah.warkah_id')->where('idpengembalian', $id)->get('tb_pengembalian')->row();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/pengembaliandetail', $data);
		$this->load->view('tema/home/footer');
	}
	public function akun()
	{
		$data['title'] = 'Masuk';
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/akun', $data);
		$this->load->view('tema/home/footer');
	}
	public function register()
	{
		$data['title'] = 'Daftar';
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/register', $data);
		$this->load->view('tema/home/footer');
	}
	public function daftar()
	{
		$data['title'] = 'Masuk atau Daftar';
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('email_reg', 'email_reg', 'required|valid_email|is_unique[tb_users.user_email]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidal valid',
			'is_unique'	=>	'Email ini telah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi salah'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/akun', $data);
			$this->load->view('tema/home/footer');
		} else {
			$nohp = $this->input->post('nohp');
			$alamat = $this->input->post('alamat');
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
			$data = array(
				'idkode' => $idkode,
				'user_nama'				=>	ucwords($this->input->post('nama')),
				'jeniskelamin'			=>	$this->input->post('jeniskelamin'),
				'user_email'			=>	strtolower($this->input->post('email_reg')),
				'user_sandi'			=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
				'nohp'					=>	$nohp,
				'alamat'				=>	$alamat,
			);
			$this->db->insert('tb_users', $data);
			$this->session->set_flashdata('flash', 'Registrasi berhasil');
			redirect('home/akun');
		}
	}
	public function login()
	{
		$data['title'] = 'Masuk atau Daftar';
		$this->form_validation->set_rules('username', 'username', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/akun', $data);
			$this->load->view('tema/home/footer');
		} else {
			$mail = $this->input->post('username');
			$sandi = $this->input->post('password');
			$cek_user = $this->db->get_where('tb_users', ['user_nama' => $mail])->row_array();
			if ($cek_user) {
				if (password_verify($sandi, $cek_user['user_sandi'])) {
					$sess_create = array(
						'userid'			=>	$cek_user['user_id'],
						'username'			=>	$cek_user['user_nama'],
						'jeniskelamin'		=>	$cek_user['jeniskelamin'],
						'usermail'			=>	$cek_user['user_email'],
						'userpass'			=>	$cek_user['user_sandi'],
						'usercreated'		=>	$cek_user['user_created'],
						'nohp'		=>	$cek_user['nohp'],
						'loginstatus'		=>	'6484bbvnvfdswuieywor3443993'
					);
					$this->session->set_userdata($sess_create);
					redirect('home');
				} else {
					$this->session->set_flashdata('error', 'Password anda salah');
					redirect('home/akun');
				}
			} else {
				$this->session->set_flashdata('error', 'Username tidak ditemukan');
				redirect('home/akun');
			}
		}
	}
	public function sigout()
	{
		$destroy = $this->session->sess_destroy();
		redirect('home/akun');
	}
	public function ganti_password()
	{
		$data['title'] = 'Ganti Password';
		$data['profilanda'] = $this->db->get_where('tb_users', ['user_id' => $this->session->userdata('userid')])->row_array();
		$this->form_validation->set_rules('sandi2', 'sandi2', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong',
		]);
		$this->form_validation->set_rules('sandi1', 'sandi1', 'required|matches[sandi2]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi baru harus sama'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('user/sandi', $data);
			$this->load->view('tema/home/footer');
		} else {
			$sandi = $this->input->post('sandi');
			$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
			$cek = $this->db->get_where('tb_users', ['user_id' => $this->session->userdata('userid')])->row_array();
			if (password_verify($sandi, $cek['user_sandi'])) {
				$this->db->set('user_sandi', $sandi1);
				$this->db->where('user_id', $this->session->userdata('userid'));
				$update = $this->db->update('tb_users');
				$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
				redirect('home/ganti_password');
			} else {
				$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
				redirect('home/ganti_password');
			}
		}
	}
}

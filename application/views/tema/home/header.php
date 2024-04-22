<!DOCTYPE html>
<html lang="en">

<?php
function rupiah($angka)
{
	$hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
	return $hasilrupiah;
}
function status($status)
{
	if ($status == 'Di Terima') {
		return 'text-primary';
	} elseif ($status == 'Di Tolak') {
		return 'text-danger';
	} elseif ($status == 'Di Proses') {
		return 'text-warning';
	} elseif ($status == 'Selesai') {
		return 'text-success';
	} elseif ($status == 'Hasil Print Telah Siap, Silahkan Ambil ke Toko') {
		return 'text-success';
	} else {
		return 'text-dark';
	}
}
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?php echo $title; ?> - I-WAK</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<link rel="icon" type="image/x-icon" href="<?= base_url('upload/foto/logo.png') ?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets_home/home/assets/css/style.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<style>
		.bigger {
			width: 100%;
			background-size: cover;
			background-position: center;
			position: relative;
		}

		.smaller {
			width: 100%;
			height: 95px;
			background: linear-gradient(to top, rgba(0, 0, 0, 0.99), transparent);
			position: absolute;
			bottom: 0;
			text-align: center;
			color: white;
		}

		.label {
			margin-bottom: 10px;
		}

		.logo img {
			width: 200px;
			height: auto;
		}
	</style>

</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center justify-content-between">

			<h1 class="logo"><a href=""><img src="<?php echo base_url('assets_home/TukangCetak22.png'); ?>" alt=""></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!--<a href="<?php echo base_url(); ?>" class="logo"><img src="assets_home/TukangCetak22.png" alt=""></a>-->

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto" href="<?php echo base_url(); ?>">Home</a></li>
					<?php if ($this->session->userdata('loginstatus') != '6484bbvnvfdswuieywor3443993') { ?>
						<li><a class="nav-link scrollto" href="<?php echo base_url('home/akun'); ?>">Login</a></li>
					<?php } else { ?>
						<li><a class="nav-link scrollto" href="<?php echo base_url('home/peminjamandaftar'); ?>">Daftar Peminjaman</a></li>
						<li><a class="nav-link scrollto" href="<?php echo base_url('home/pengembaliandaftar'); ?>">Daftar Pengembalian</a></li>
						<li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
							<ul>
								<li><a href="<?php echo base_url(); ?>home/ganti_password">Ganti Sandi</a></li>
								<li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>
							</ul>
						</li>
					<?php } ?>

				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
		</div>
	</header>
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
	<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
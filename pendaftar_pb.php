<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM pendaftar_pb"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //ceil untuk membulatkan bilangan ke atas
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$pdam = query("SELECT * FROM pendaftar_pb LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari ditekan
if (isset($_POST["cari"])) {
	$pdam = cari_pendaftar_pb($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/logo-pdam.png" />

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="blue">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="#" class="logo">
					<img src="assets/img/logo-pdam.png" width="60" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form action="" method="post" class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" name="cari" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" name="keyword" placeholder="Cari ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/img/person-fill.svg" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="assets/img/person-fill.svg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>ADMIN</h4>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
										<img src="assets/img/box-arrow-right.svg"> &nbsp; Logout
									</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav">
						<li class="nav-item">
							<a href="halaman_admin.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Pelayanan</h4>
						</li>
						<li class="nav-item active submenu">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Pendaftar</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="base">
								<ul class="nav nav-collapse">
									<li class="active">
										<a href="">
											<span class="sub-item">Pendaftar PB</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Data Pelanggan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="pelanggan_pb.php">
											<span class="sub-item">Pelanggan PB</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Data Pengguna</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="data_admin.php">
											<span class="sub-item">Admin</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Data Informasi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="data_berita.php">
											<span class="sub-item">Berita</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Pendaftar</h4>
					</div>

					<?php if ($halamanAktif > 1) : ?>
						<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
					<?php endif; ?>

					<!-- navigasi -->
					<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
						<?php if ($i == $halamanAktif) : ?>
							<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
						<?php else : ?>
							<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
						<?php endif; ?>
					<?php endfor; ?>

					<?php if ($halamanAktif < $jumlahHalaman) : ?>
						<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
					<?php endif; ?>
					<br>

					<table class="table table-head">
						<thead>
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Nama</th>
								<th scope="col">No. HP</th>
								<th scope="col">
									<center>Aksi</center>
								</th>
							</tr>
							<?php $i = $awalData + 1; ?>
							<?php foreach ($pdam as $row) : ?>
						</thead>
						<tbody>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $row["tanggal"] ?></td>
								<td><?= $row["nama"]; ?></td>
								<td><?= $row["no_hp"]; ?></td>
								<td>
									<center>
										<a href="konfirmasi_pb.php?id=<?= $row["id"]; ?>" class="btn-sm btn-success" data-bs-toggle="tooltip" title="Konfirmasi" style="text-decoration: none;" onclick="return confirm('Anda yakin ingin mengkonfirmasi data ini?');">
											<img src="assets/img/check-lg.svg" width="15px">
										</a><br><br>
										<a href="hapus_pendaftar_pb.php?id=<?= $row["id"]; ?>" class="btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus" style="text-decoration: none;" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
											<img src="assets/img/trash-fill.svg" width="15px">
										</a><br><br>
										<a href="detail_pendaftar_pb.php?id=<?= $row["id"]; ?>" class="btn-sm btn-info" data-bs-toggle="tooltip" title="Detail" style=" text-decoration: none;">
											<img src="assets/img/eye-fill.svg" width="15px">
										</a>
									</center>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="assets/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Google Maps Plugin -->
	<script src="assets/js/plugin/gmaps/gmaps.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Azzara JS -->
	<script src="assets/js/ready.min.js"></script>
</body>

</html>
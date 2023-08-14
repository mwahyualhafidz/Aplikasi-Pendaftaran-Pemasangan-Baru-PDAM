<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

//ambil data url
$id_pelanggan = $_GET["id_pelanggan"];

//query data pb_biasa berdasarkan id
$pelanggan = query("SELECT * FROM pelanggan_pb WHERE id_pelanggan = $id_pelanggan")[0];
//[0] disini menunjukkan mengambil indeks/elemen pertama

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil di ubah atau tidak
    if (ubah_pelanggan($_POST) > 0) {
        echo "<script>
                alert('data pelanggan berhasil diubah!');
                document.location.href = 'pelanggan_pb.php';
                </script>";
    } else {
        echo "<script>
                alert('data pelanggan gagal diubah!');
                document.location.href = 'pelanggan_pb.php';
                </script>";
    }
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
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Data Pendaftar</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="pendaftar_pb.php">
                                            <span class="sub-item">Pendaftar PB</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item active submenu">
                            <a data-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Data Pelanggan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse show" id="charts">
                                <ul class="nav nav-collapse">
                                    <li class="active">
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
                        <h4 class="page-title">Ubah Data Pelanggan</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table cellpadding="30" width="920px">
                                <tr>
                                    <td>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan["id_pelanggan"]; ?>">
                                            <input type="hidden" name="ktpLama" value="<?= $pelanggan["ktp_pelanggan"]; ?>">
                                            <div>
                                                <label for="tanggal_pelanggan" style="font-weight: bold;">Tanggal</label>
                                                <input type="text" class="form-control form-control-sm" name="tanggal_pelanggan" value="<?php echo date("d-m-Y"); ?>" readonly>
                                            </div><br>
                                            <div>
                                                <label for="ktp_pelanggan" style="font-weight: bold;">Foto KTP</label><br>
                                                <img src="../pdam/assets/img/ktp/<?= $pelanggan['ktp_pelanggan']; ?>" width="350"><br><br>
                                                <input type="file" class="form-control form-control-sm" name="ktp_pelanggan" id="ktp_pelanggan">
                                            </div><br>
                                            <div>
                                                <label for="nama_pelanggan" style="font-weight: bold;">Nama</label>
                                                <input type="text" class="form-control form-control-sm" name="nama_pelanggan" value="<?= $pelanggan["nama_pelanggan"]; ?>" id="nama_pelanggan" autocomplete="off" required>
                                            </div><br>
                                            <div>
                                                <label for="no_ktp_pelanggan" style="font-weight: bold;">No. KTP</label>
                                                <input type="text" class="form-control form-control-sm" name="no_ktp_pelanggan" value="<?= $pelanggan["no_ktp_pelanggan"]; ?>" id="no_ktp_pelanggan" autocomplete="off" required>
                                            </div><br>
                                            <div>
                                                <label for="pekerjaan_pelanggan" style="font-weight: bold;">Pekerjaan</label>
                                                <select class="form-control form-control-sm" name="pekerjaan_pelanggan" id="pekerjaan_pelanggan">
                                                    <option value="<?= $pelanggan["pekerjaan_pelanggan"]; ?>"><?= $pelanggan["pekerjaan_pelanggan"]; ?></option>
                                                    <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                                                    <option value="TNI">TNI</option>
                                                    <option value="Polri">Polri</option>
                                                    <option value="Karyawan BUMN">Karyawan BUMN</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Pedagang">Pedagang</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="">Lainnya</option>
                                                </select>
                                            </div><br>
                                            <div>
                                                <label for="alamat_pelanggan" style="font-weight: bold;">Alamat</label>
                                                <input type="text" class="form-control form-control-sm" name="alamat_pelanggan" value="<?= $pelanggan["alamat_pelanggan"]; ?>" id="alamat_pelanggan" autocomplete="off" required>
                                            </div><br>
                                            <div>
                                                <label for="no_hp_pelanggan" style="font-weight: bold;">No. HP</label>
                                                <input type="text" class="form-control form-control-sm" name="no_hp_pelanggan" value="<?= $pelanggan["no_hp_pelanggan"]; ?>" id="no_hp_pelanggan" autocomplete="off" required>
                                            </div><br>
                                            <div>
                                                <label for="jumlah_huni_pelanggan" style="font-weight: bold;">Jumlah Penghuni</label>
                                                <input type="text" class="form-control form-control-sm" name="jumlah_huni_pelanggan" value="<?= $pelanggan["jumlah_huni_pelanggan"]; ?>" id="jumlah_huni_pelanggan" autocomplete="off" required>
                                            </div><br><br>
                                            <div class="card-action">
                                                <center>
                                                    <button class="btn btn-success" type="submit" name="submit" onclick="return confirm('Anda yakin ingin mengubah data pelanggan ini?');">Ubah</button>
                                                    <a href="pelanggan_pb.php" class="btn btn-danger">Batal</a>
                                                </center>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
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
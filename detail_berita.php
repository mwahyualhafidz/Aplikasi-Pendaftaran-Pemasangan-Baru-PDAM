<?php
require 'functions.php';

//ambil data url
$id = $_GET["id"];

//query data pelanggan_pb berdasarkan id
$berita = query("SELECT * FROM berita WHERE id = $id")[0];
//[0] disini menunjukkan mengambil indeks/elemen pertama

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UP PDAM Karanganyar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo-pdam.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css_user/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Rapid - v4.6.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">

            <img src="assets/img/logo-pdam.png" alt="" width="70">
            <p class="logo me-auto"></p>
            <!-- <h1 class="logo me-auto"><a href="index.html">Rapid</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="../pdam/">Beranda</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
                    <li><a class="nav-link scrollto" href="../pdam/">Profil</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
                    <li><a class="nav-link scrollto active" href="../pdam/">Berita</a></li>
                    <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li class="dropdown"><a href="#"><span>Pelanggan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Pemasangan Baru</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="daftar_pb.php">Daftar Pasang Baru</a></li>
                                    <li><a href="bukti_daftar_pb.php">Cetak Bukti</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="../pdam/">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <br><br>

    <main id="main">

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <center><img src="assets/img/berita/<?= $berita["gambar_berita"]; ?>" width="500px"></center><br>
                    <h3><?= $berita["judul_berita"]; ?></h3>
                </header>
                <div>
                    <i style="color:cornflowerblue;">Diposting pada <strong><?= $berita["tanggal_berita"]; ?></strong></i>
                </div>
                <div>
                    <p><?= htmlspecialchars_decode(htmlspecialchars_decode($berita["isi_berita"])); ?></p>
                    <i>Sumber : <?= $berita["sumber_berita"]; ?></i>
                </div><br>
                <div><a href="../pdam/" class="btn btn-danger">Kembali</a></div>
            </div>
        </section><!-- End F.A.Q Section -->
    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js_user/main.js"></script>

</body>

</html>
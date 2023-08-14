<?php
require 'functions.php';

$pdam = query("SELECT * FROM berita ORDER BY id DESC");

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
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
          <li><a class="nav-link scrollto" href="#faq">Profil</a></li>
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <li><a class="nav-link scrollto" href="#services">Berita</a></li>
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
          <li><a class="nav-link scrollto" href="#footer">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <h2>Unit Pelayanan<br>PDAM <span>Karang Anyar</span></h2>
        </div>

        <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/logo-pdam.png" width="600px" class="img-fluid" style="opacity: 0.2;">
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <a href=""></a>
          <h3>Profil</h3>
        </header>

        <ul class="faq-list" data-aso="fade-up" data-aos-delay="100">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1"> Filosofi <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>Bekerja Keras, Cerdas dan Ikhlas.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question"> Motivasi <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>Berusaha untuk mengembangkan diri agar menjadikan lebih baik dan lebih baik lagi.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question"> Sejarah <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>Perusahaan Air Bersih Kota Palembang di dirikan pada tahun 1929 oleh pemerintah Kolonial Belanda yang berlokasi di 3 ilir Palembang dengan nama Palembang Water Leading. Pendirian instalasi I selesai pada tahun 1933, setelah Indonesia merdeka perusahaan diambil alih oleh kota madya Palembang Seksi Teknik Air Bersih Dinas Pekerjaan Umum kota madya Palembang. Berdasarkan surat keputusan Walikota Madya Palembang pada tanggal 21 Agustus 1963 perusahaan Air Bersih tersebut menjadi perusahaan Air Bersih yang melaksanakan produksi dan administrasi. Pada tahun 1976 statusnya berubah menjadi Perusahaan Daerah Air Minum (PDAM) Tirta Musi berdasarkan Perda Kota madya Daerah Tingkat II Palembang Nomor: 1/Perda/Huk/1976 tanggal 3 April 1976 dan Surat Keputusan Gubernur Kepala Daerah Tingkat I Sumatera Selatan Nomor: 20/KPTS/IV/1976 tanggal 11 Juni 1976.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question"> Visi <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>Menjadi perusahaan smart happy yang unggul dalam penyediaan air minum dan pengelola air limbah di Indonesia pada tahun 2028.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question"> Misi <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>1. Menjadi penyedia air minum yang handal berprinsip pada pelayanan 4K (kualitas, kuantitas, kontinuitas dan keterjangkauan) serta GCG (Good Corporate Governance).</p>
              <p>2. Mengintegrasikan semua informasi produksi, distribusi, pelayanan dan sumber daya dalam pengembangan transformasi teknologi digital sebagai sumber kekuatan perusahaan.</p>
              <p>3. Mangutamakan kepuasan/kebahagiaan pelanggan dengan pelayanan yang lancer, aman, cukup, teratur dan bertanggung jawab sehingga menjadi kebanggaan masyarakat dan pemerintah.</p>
              <p>4. Mampu memberikan kesejahteraan dan kebahagiaan terbaik secara berkelanjutan bagi karyawan dan menjadi tempat memperluas wawasan pengetahuan dan keterampilan tentang penyediaan air minum dalam upaya pengembangan diri yang lebih kreatif dan inovatif dengan teknologi tepat guna, efisien dan terintegrasi, berbasis sumber daya dan kearifan lokal.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question"> Penghargaan <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>PDAM TIRTAMUSI SUDAH MENDAPATKAN BANYAK PENGHARGAAN, BAIK DARI WALIKOTA, MAUPUN INSTANSI LAIN DI DALAM DAN LUAR NEGERI.</p>
              <p>BERIKUT BEBERAPA PENGHARGAAN YANG SUDAH DITERIMA :</p>
              <p>1. Piagam Penghargaan Citra Pelayanan Prima Peningkatan Pelayanan Publik di Bidang Pelayanan dan Penyediaan Air bersih tahun 2008.</p>
              <p>2. Certificate Euro Promocap Iwat project granted to : PDAM Tirta Musi Palembang , for contributing to the implementation of a european style N.R.W. strategy November 2004 until February 2007.</p>
              <p>3. Piagam Penghargaan atas kerjasamanya membantu PDAM Kota Padang dalam rangka pemulihan pelayanan air bersih kepada masyarakat pasca bencana gempa 7,9 SR yang terjadi di Kota Padang tahun 2009.</p>
              <p>4. Predikat Kepatuhan Standar Pelayanan Publik UU 25 Tahun 2009 tentang Pelayanan Publik Tahun 2014.</p>
              <p>5. Perpamsi Award 2015 tentang Pelayanan terbaik air minum dan sanitasi serta sebagai pusat pembelajaran PDAM kategori Kota di atas 100.000 pelanggan PDAM Wilayah 1 Sumatera.</p>
              <p>6. Piagam Padmamitra Award dalam Wilayah Sumatera Selatan tentang Kegiatas CSR bidang Kesejahteraan Sosial.</p>
              <p>7. Piagam Penghargaan Sebagai Wajib Pajak Pembayar Pajak Besar Regional Sumsel Babel.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq7" class="collapsed question"> Struktur <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq7" class="collapse" data-bs-parent=".faq-list">
              <center><img src="assets/img/struktur-pdam.png" class="img-fluid"></center>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Berita</h3>
        </header><br>

        <div class="row">
          <?php $i = 1; ?>
          <?php foreach ($pdam as $berita) : ?>

            <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
              <div class="box">
                <div>
                  <img src="assets/img/berita/<?= $berita["gambar_berita"]; ?>" width="150px">
                </div><br>
                <h4 class="title"><?= $berita["judul_berita"]; ?></h4>
                <p class="description"><?= htmlspecialchars_decode(substr($berita["isi_berita"], 0, 100)) ?>...</p>
                <a href="detail_berita.php?id=<?= $berita["id"]; ?>">Selengkapnya</a>
              </div>
            </div>

            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg">
    <div class="footer-top bg-white">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">

                <div class="footer-newsletter">
                  <h4>Tentang Kami</h4>
                  <p>Kami adalah Perusahaan Daerah yang mengelola penyediaan air bersih untuk wilayah cakupan PDAM Karang Anyar. Kami terus berusaha memberikan pelayanan optimal bagi masyarakat.</p>
                </div>

                <div class="footer-newsletter">
                  <h4>Jam Buka</h4>
                  <table>
                    <tr>
                      <td>Senin - Kamis</td>
                      <td> : </td>
                      <td>08:00 - 16:00</td>
                    </tr>
                    <tr>
                      <td>Jumat</td>
                      <td> : </td>
                      <td>08:00 - 16:30</td>
                    </tr>
                    <tr>
                      <td>Sabtu - Minggu</td>
                      <td> : </td>
                      <td>Tutup</td>
                    </tr>
                  </table>
                </div>

              </div>

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Link Cepat</h4>
                  <ul>
                    <li><a href="daftar_pb.php">Daftar Pasang Baru</a></li>
                    <li><a href="bukti_daftar_pb.php">Cetak Bukti</a></li>
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Kontak</h4>
                  <p>
                    Jl. Karang Jaya, Gandus, <br>
                    Kota Palembang, <br>
                    Sumatera Selatan. <br>
                    <strong>Telepon:</strong> (0711) 355222<br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="https://www.youtube.com/channel/UCuoZZPc7xYhThih6DVwRpTA" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                  <a href="https://web.facebook.com/pdam.tirtamusipalembang" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/pdam_tirtamusi_palembang/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                </div>

              </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form row justify-content-center">

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1437.1888554365305!2d104.72220353724296!3d-3.0118965426474307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9e3ec9f921c7%3A0x464445bac1276a1c!2sPDAM%20Karanganyar!5e1!3m2!1sid!2sid!4v1633701232665!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="footer-bot bg-light">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>UP PDAM Karanganyar</strong> 2021
        </div>
        <div class="credits">
          <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
      -->
        </div>
      </div>
    </div>

  </footer><!-- End  Footer -->

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
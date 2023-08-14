<?php
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil di tambahkan atau tidak
    if (daftar_pb($_POST) > 0) {
        echo "<script>
                alert('Pendaftaran Berhasil! Silahkan Cetak Bukti Pendaftaran.');
                document.location.href = 'bukti_daftar_pb.php';
              </script>";
    } else {
        echo "<script>
                alert('Pendaftaran Gagal!');
                document.location.href = '';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daftar Pasang Baru</title>

    <!-- Favicons -->
    <link href="assets/img/logo-pdam.png" rel="icon">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="assets/css/form.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Daftar Pemasangan Baru</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Tanggal</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="tanggal" value="<?php echo date("d-m-Y"); ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name" style="color:dimgrey;"><i>Data Pemohon</i></div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="nama_pemohon" autofocus autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No. HP</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="no_hp_pemohon" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="alamat_pemohon" autocomplete="off" placeholder="isi dengan lengkap" required>
                            </div>
                        </div><br>

                        <div class="form-row">
                            <div class="name" style="color:dimgrey;"><i>Data Calon Pelanggan</i></div>
                        </div>
                        <div class="form-row">
                            <div class="name">Foto KTP</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="file" name="ktp" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="nama" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No. KTP</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="no_ktp" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Pekerjaan</div>
                            <div class="value">
                                <select class="input--style-6" name="pekerjaan" id="pekerjaan" required>
                                    <option value="">Pilih</option>
                                    <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                                    <option value="TNI">TNI</option>
                                    <option value="Polri">Polri</option>
                                    <option value="Karyawan BUMN">Karyawan BUMN</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="alamat" autocomplete="off" placeholder="Isi dengan lengkap" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">No. HP</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="no_hp" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jumlah Penghuni</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="jumlah_huni" autocomplete="off" required>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit" onclick="return confirm('Apakah anda yakin ingin mendaftar pemasangan baru ?')">Daftar</button>
                    <a href="../pdam/" class="btn btn--radius-3 btn--blue-1" style="text-decoration: none;">Batal</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
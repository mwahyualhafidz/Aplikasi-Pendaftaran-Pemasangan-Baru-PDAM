<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

//ambil data url
$id = $_GET['id'];

//$data = mysqli_query($conn, "SELECT * FROM pendaftar_pb");
$result = query("SELECT * FROM pendaftar_pb WHERE id = $id")[0];

$tanggal = $result['tanggal'];
$ktp = $result['ktp'];
$nama = $result['nama'];
$no_ktp = $result['no_ktp'];
$pekerjaan = $result['pekerjaan'];
$alamat = $result['alamat'];
$no_hp = $result['no_hp'];
$jumlah_huni = $result['jumlah_huni'];

$tambah = mysqli_query($conn, "INSERT INTO pelanggan_pb VALUES
    ('','$tanggal','$ktp','$nama','$no_ktp','$pekerjaan','$alamat','$no_hp','$jumlah_huni')");

//$hapus = mysqli_query($conn, "DELETE FROM pendaftar_pb WHERE id = $id_query");

if (konfirmasi_pb($id) > 0) {
    echo "<script>
            alert('Berhasil Dikonfirmasi!');
            document.location.href = 'pendaftar_pb.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal Dikonfirmasi!');
            document.location.href = 'pendaftar_pb.php';
          </script>";
}

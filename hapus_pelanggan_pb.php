<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

$id_pelanggan = $_GET["id_pelanggan"];

if (hapus_pelanggan_pb($id_pelanggan) > 0) {
    echo "<script>
                alert('data berhasil dihapus!');
                document.location.href = 'pelanggan_pb.php';
                </script>";
} else {
    echo "<script>
                alert('data gagal dihapus!');
                document.location.href = 'pelanggan_pb.php';
                </script>";
}

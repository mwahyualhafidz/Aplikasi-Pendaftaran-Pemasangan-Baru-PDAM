<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if (hapus_pendaftar_pb($id) > 0) {
    echo "<script>
                alert('data berhasil dihapus!');
                document.location.href = 'pendaftar_pb.php';
                </script>";
} else {
    echo "<script>
                alert('data gagal dihapus!');
                document.location.href = 'pendaftar_pb.php';
                </script>";
}

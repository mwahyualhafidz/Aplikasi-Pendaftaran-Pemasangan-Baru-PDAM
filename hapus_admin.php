<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if (hapus_admin($id) > 0) {
    echo "<script>
                alert('Admin berhasil dihapus!');
                document.location.href = 'data_admin.php';
                </script>";
} else {
    echo "<script>
                alert('Admin gagal dihapus!');
                document.location.href = 'data_admin.php';
                </script>";
}

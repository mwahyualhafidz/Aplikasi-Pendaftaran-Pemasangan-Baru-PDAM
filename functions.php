<?php
require 'koneksi.php';

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// USER
function daftar_pb($data)
{
    global $conn;

    $tanggal = ($data["tanggal"]);

    //data pemohon
    $nama_pemohon = htmlspecialchars($data["nama_pemohon"]);
    $no_hp_pemohon = htmlspecialchars($data["no_hp_pemohon"]);
    $alamat_pemohon = htmlspecialchars($data["alamat_pemohon"]);

    //data calon pelanggan
    //upload gambar
    $ktp = upload();
    if (!$ktp) {
        return false;
    }

    $nama = htmlspecialchars($data["nama"]);
    $no_ktp = htmlspecialchars($data["no_ktp"]);
    $pekerjaan = htmlspecialchars($data["pekerjaan"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $jumlah_huni = htmlspecialchars($data["jumlah_huni"]);

    $query = "INSERT INTO pendaftar_pb
                VALUES ('', '$tanggal', '$nama_pemohon', '$no_hp_pemohon', '$alamat_pemohon', '$ktp', '$nama', '$no_ktp', '$pekerjaan', '$alamat', '$no_hp', '$jumlah_huni')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari_bukti_daftar_pb($keyword)
{
    $query = "SELECT * FROM pendaftar_pb WHERE
                no_ktp LIKE '$keyword'";
    return query($query);
}

function upload()
{
    //foto ktp
    $namaFile = $_FILES['ktp']['name'];
    $ukuranFile = $_FILES['ktp']['size'];
    $error =  $_FILES['ktp']['error'];
    $tmpName = $_FILES['ktp']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 3000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../pdam/assets/img/ktp/' . $namaFileBaru);

    return $namaFileBaru;
}

// ADMIN
// Menu Pendaftar PB
function konfirmasi_pb($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pendaftar_pb WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapus_pendaftar_pb($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pendaftar_pb WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cari_pendaftar_pb($keyword)
{
    $query = "SELECT * FROM pendaftar_pb WHERE
                nama LIKE '%$keyword%' OR
                no_ktp LIKE '%$keyword%'";
    return query($query);
}


// Menu Pelanggan PB
function cari_pelanggan_pb($keyword)
{
    $query = "SELECT * FROM pelanggan_pb WHERE
                nama_pelanggan LIKE '%$keyword%' OR
                no_ktp_pelanggan LIKE '%$keyword%'";
    return query($query);
}

function hapus_pelanggan_pb($id_pelanggan)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pelanggan_pb WHERE id_pelanggan = $id_pelanggan");
    return mysqli_affected_rows($conn);
}

function ubah_pelanggan($data)
{
    global $conn;

    $id_pelanggan = $data["id_pelanggan"];
    $tanggal_pelanggan = $data["tanggal_pelanggan"];

    $ktpLama = htmlspecialchars($data["ktpLama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['ktp_pelanggan']['error'] === 4) {
        $ktp_pelanggan = $ktpLama;
    } else {
        $ktp_pelanggan = upload_ubah();
    }

    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $no_ktp_pelanggan = htmlspecialchars($data["no_ktp_pelanggan"]);
    $pekerjaan_pelanggan = htmlspecialchars($data["pekerjaan_pelanggan"]);
    $alamat_pelanggan = htmlspecialchars($data["alamat_pelanggan"]);
    $no_hp_pelanggan = htmlspecialchars($data["no_hp_pelanggan"]);
    $jumlah_huni_pelanggan = htmlspecialchars($data["jumlah_huni_pelanggan"]);

    $query = "UPDATE pelanggan_pb SET
                tanggal_pelanggan = '$tanggal_pelanggan', ktp_pelanggan = '$ktp_pelanggan', nama_pelanggan = '$nama_pelanggan', no_ktp_pelanggan = '$no_ktp_pelanggan', pekerjaan_pelanggan = '$pekerjaan_pelanggan', alamat_pelanggan = '$alamat_pelanggan', no_hp_pelanggan = '$no_hp_pelanggan', jumlah_huni_pelanggan = '$jumlah_huni_pelanggan'
              WHERE id_pelanggan = $id_pelanggan";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_ubah()
{
    //foto ktp
    $namaFile = $_FILES['ktp_pelanggan']['name'];
    $ukuranFile = $_FILES['ktp_pelanggan']['size'];
    $error =  $_FILES['ktp_pelanggan']['error'];
    $tmpName = $_FILES['ktp_pelanggan']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 3000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../pdam/assets/img/ktp/' . $namaFileBaru);

    return $namaFileBaru;
}


// Menu Berita
function berita($data)
{
    global $conn;

    $tanggal_berita = $data["tanggal_berita"];
    $judul_berita = $data["judul_berita"];

    //upload gambar
    $gambar_berita = upload_berita();
    if (!$gambar_berita) {
        return false;
    }

    $isi_berita = htmlspecialchars($data["isi_berita"]);
    $sumber_berita = $data["sumber_berita"];

    $query = "INSERT INTO berita
                VALUES ('', '$tanggal_berita', '$judul_berita', '$gambar_berita', '$isi_berita', '$sumber_berita')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_berita()
{
    //foto ktp
    $namaFile = $_FILES['gambar_berita']['name'];
    $ukuranFile = $_FILES['gambar_berita']['size'];
    $error =  $_FILES['gambar_berita']['error'];
    $tmpName = $_FILES['gambar_berita']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 9000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../pdam/assets/img/berita/' . $namaFileBaru);

    return $namaFileBaru;
}

function cari_berita($keyword)
{
    $query = "SELECT * FROM berita WHERE
                judul_berita LIKE '%$keyword%'";
    return query($query);
}

function hapus_berita($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM berita WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah_berita($data)
{
    global $conn;

    $id = $data["id"];
    $tanggal_berita = $data["tanggal_berita"];
    $judul_berita = htmlspecialchars($data["judul_berita"]);

    $gambar_berita_lama = htmlspecialchars($data["gambar_berita_lama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar_berita']['error'] === 4) {
        $gambar_berita = $gambar_berita_lama;
    } else {
        $gambar_berita = upload_ubah_berita();
    }

    $isi_berita = htmlspecialchars($data["isi_berita"]);

    $sumber_berita = $data["sumber_berita"];

    $query = "UPDATE berita SET
                tanggal_berita = '$tanggal_berita', judul_berita = '$judul_berita', gambar_berita = '$gambar_berita', isi_berita = '$isi_berita', sumber_berita = '$sumber_berita'
              WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload_ubah_berita()
{
    //foto ktp
    $namaFile = $_FILES['gambar_berita']['name'];
    $ukuranFile = $_FILES['gambar_berita']['size'];
    $error =  $_FILES['gambar_berita']['error'];
    $tmpName = $_FILES['gambar_berita']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 9000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../pdam/assets/img/berita/' . $namaFileBaru);

    return $namaFileBaru;
}


//TABEL ADMIN
function cari_admin($keyword)
{
    $query = "SELECT * FROM tb_admin WHERE
                username LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_admin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar')
              </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> 
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO tb_admin VALUES('', '$nama', '$username' , '$password')");
    return mysqli_affected_rows($conn);
}

function hapus_admin($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_admin WHERE id = $id");
    return mysqli_affected_rows($conn);
}

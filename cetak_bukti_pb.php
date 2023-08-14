<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

//ambil data url
$id = $_GET["id"];

$pdam = query("SELECT * FROM pendaftar_pb WHERE id = $id")[0];

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Pasang Baru</title>
</head>
<body>
    <table border="1" width="800px">
        <tr>
            <td width="70px">
                <center><img src="assets/img/logo-pdam.png" width="100px"></center>
            </td>
            <td width="660px">
                <center><h3>PERUSAHAAN DAERAH AIR MINUM TIRTA MUSI PALEMBANG</h3></center>
                <p>Jl. Rambutan Ujung No.1, Palembang 30129 Telp. 0711-355089</p>
            </td>
            <td width="70px">
                <center><img src="assets/img/logo-pdam.png" width="100px"></center>
            </td>
        </tr>
    </table><br><br>

    <table width="800px">
        <tr>
            <td width="100px"></td>
            <td width="600px"><center><h3>Bukti Pendaftaran Pemasangan Baru</h3></center></td>
            <td width="100px"></td>
        </tr>
    </table>';

$html .= '<table cellpadding="12" cellspacing="0">
            <tr><td><h5>Data Pemohon</h5></td></tr>
        </table>
        
        <table cellpadding="15" cellspacing="0" width="800px">
            <tr>
                <td width="150px">Tanggal Registrasi</td>
                <td width="20px"> : </td>
                <td width="580px">' . $pdam["tanggal"] . '</td>
            </tr>
            <tr>
                <td>No. Registrasi</td>
                <td> : </td>
                <td>' . $pdam["id"] . '</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td>' . $pdam["nama_pemohon"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td>' . $pdam["alamat_pemohon"] . '</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td> : </td>
                <td>' . $pdam["no_hp_pemohon"] . '</td>
            </tr>
    </table><br>';

$html .= '<table cellpadding="12" cellspacing="0">
            <tr><td><h5>Data Calon Pelanggan</h5></td></tr>
        </table>

        <table cellpadding="15" cellspacing="0" width="800px">
            <tr>
                <td width="150px">Nama</td>
                <td width="20px"> : </td>
                <td width="580px">' . $pdam["nama"] . '</td>
            </tr>
            <tr>
                <td>No. KTP</td>
                <td> : </td>
                <td>' . $pdam["no_ktp"] . '</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td> : </td>
                <td>' . $pdam["pekerjaan"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td>' . $pdam["alamat"] . '</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td> : </td>
                <td>' . $pdam["no_hp"] . '</td>
            </tr>
            <tr>
                <td>Jumlah Penghuni</td>
                <td> : </td>
                <td>' . $pdam["jumlah_huni"] . '</td>
            </tr>
            
    </table><br><br><br><br><br><br>';

$html .= '<table width="800px">
            <tr>
                <td width="200px"></td>
                <td width="200px"></td>
                <td width="400px">
                    <center>Palembang, ......................... 20......</center>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <center>PDAM TIRTA MUSI,</center>
                </td>
            </tr>
        </table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('bukti-pb.pdf', Mpdf\Output\Destination::INLINE);

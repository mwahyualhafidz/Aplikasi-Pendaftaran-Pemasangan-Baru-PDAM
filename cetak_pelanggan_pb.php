<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

//ambil data url
$id_pelanggan = $_GET["id_pelanggan"];

$pdam = query("SELECT * FROM pelanggan_pb WHERE id_pelanggan = $id_pelanggan")[0];

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Survei Pelanggan Pasang Baru</title>
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
            <td width="600px"><center><h3>Survei Pelanggan Pemasangan Baru</h3></center></td>
            <td width="100px"></td>
        </tr>
    </table>
    
    <table cellpadding="12" cellspacing="0">
        <tr><td><h5>Data Pelanggan</h5></td></tr>
    </table>

    <table cellpadding="15" cellspacing="0" width="800px">';
$html .= '<tr>
                <td width="150px">Tanggal Survei</td>
                <td width="20px"> : </td>
                <td width="580px"></td>
            </tr>
            <tr>
                <td>No. Pelanggan</td>
                <td> : </td>
                <td>' . $pdam["id_pelanggan"] . '</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td>' . $pdam["nama_pelanggan"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : </td>
                <td>' . $pdam["alamat_pelanggan"] . '</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td> : </td>
                <td>' . $pdam["no_hp_pelanggan"] . '</td>
            </tr>
    </table><br>';

$html .= '<table cellpadding="12" cellspacing="0">
            <tr><td><h5>Rincian Biaya Pemasangan Baru</h5></td></tr>
        </table>

        <table cellpadding="15" cellspacing="0" width="800px">
            <tr>
                <td width="300px">1. Rumah Tangga (Rp1.500.000)</td>
                <td width="500px">3. Niaga (Rp2.750.000)</td>
            </tr>
            <tr>
                <td>2. Rumah Tangga (TBS) (Rp1.750.000)</td>
                <td>4. Niaga (TBS) (Rp3.000.000)</td>
            </tr>
            <tr><td><h5>*Coret yang tidak perlu</h5></td></tr>
        </table>';

$html .= '<table cellpadding="12" cellspacing="0">
            <tr><td><h5>Biaya Tambahan</h5></td></tr>
        </table>

        <table cellpadding="15" cellspacing="0" width="800px">
            <tr>
                <td width="150px">Pipa</td>
                <td width="20px"> : </td>
                <td width="580px">Rp16.000 x (.......Meter) = .........................</td>
            </tr>
            <tr>
                <td>Galian Beton</td>
                <td> : </td>
                <td>Rp32.000 x (.......Meter) = .........................</td>
            </tr>
            <tr>
                <td>Galian Aspal</td>
                <td> : </td>
                <td>Rp33.000 x (.......Meter) = .........................</td>
            </tr>
            <tr>
                <td>Galian Conblock</td>
                <td> : </td>
                <td>Rp21.000 x (.......Meter) = .........................</td>
            </tr>
            <tr>
                <td style="font-weight:Bold;">Total</td>
                <td> : </td>
                <td>..........................................</td>
            </tr>
        </table><br><br><br>';

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
$mpdf->Output('survei-pb.pdf', Mpdf\Output\Destination::INLINE);

<?php
require 'functions.php';
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
    <title>Bukti Daftar Pasang Baru</title>

    <!-- Favicons -->
    <link href="assets/img/logo-pdam.png" rel="icon">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="assets/css/form.css" rel="stylesheet" media="all">

    <style>
        th {
            background-color: #ddd;
        }
    </style>

    <style>
        .tombol {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: black;
            padding: 10px 28px;
            text-align: center;
            margin: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            border-radius: 4px;
            transition-duration: 0.4s;
        }

        .tombol:hover {
            background-color: #4CAF50;
            /* Green */
            color: white;
        }
    </style>

</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Cetak Bukti Pasang Baru</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">No. KTP</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="keyword" placeholder="Masukkan Nomor KTP" autofocus autocomplete="off">
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <center>
                        <button class="btn btn--radius-2 btn--blue-2" type="submit" name="cari">Cari</button>
                        <a href="../pdam/" class="btn btn--radius-3 btn--blue-1" style="text-decoration: none;">Kembali</a>
                    </center><br><br>

                    <?php
                    //$pdam = query("SELECT * FROM pendaftar_pb");

                    //tombol cari ditekan
                    if (isset($_POST["cari"])) {
                        $pdam = cari_bukti_daftar_pb($_POST["keyword"]);
                    ?>

                        <table border="2" cellpadding="10" cellspacing="0" width="785px">
                            <thead>
                                <tr>
                                    <th width="50px">No.</th>
                                    <th width="385px">Nama</th>
                                    <th width="200px">No. KTP</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                                <?php foreach ($pdam as $row) : ?>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <center><?= $row["id"]; ?></center>
                                    </td>
                                    <td>
                                        <center><?= $row["nama"]; ?>
                                    </td>
                                    <td>
                                        <center><?= $row["no_ktp"]; ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="cetak_bukti_pb.php?id=<?= $row["id"]; ?>" class="tombol" target="_blank" data-bs-toggle="tooltip" title="Unduh">
                                                <img src="assets/img/download.svg" width="20px">
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php } ?>



                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
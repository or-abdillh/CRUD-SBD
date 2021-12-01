<?php

    include("koneksi.php");

    //Get data from DB
    if ( isset($_GET["sort"]) ) {
        $sort = $_GET["sort"];

        switch( $sort) {
            case "asc" : $sql = "SELECT * FROM tb_idmhs ORDER BY nama ASC";
                break; 
            case "desc" : $sql = "SELECT * FROM tb_idmhs ORDER BY nama DESC";
                break; 
        }
    } else {
        $sql = "SELECT * FROM tb_idmhs";
    }
    $rows = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a {
            text-decoration: none;
            padding: .25rem .85rem;
            border-radius: 3px;
        }
        .success , .danger {
            color: whitesmoke;
        }
        .success {
            background: #4169E1;
        }

        .danger {
            background: #FF0000;
        }

        table {
            border: none;
        }
        thead {
            background-color: #F5F5F5;
        }
        tr {
            border: none;
        }
        tr:nth-child(even) {
            background: #C5C5C5;
        }
    </style>
    <title>20302022 - Oka R. Abdillah</title>
</head>
<body>
    <center>
        <h3>Daftar Mahasiswa</h3>
        <a href="index.php?sort=asc">Asc by name - </a>
        <a href="index.php?sort=desc">Des by name</a>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ( mysqli_num_rows($rows) > 0 ) {

                        $no = 1;

                        while( $row = mysqli_fetch_assoc($rows) ) {
                            $nama = $row["nama"];
                            $nim = $row["nim"];
                            $kelas = $row["kelas"];
                            $prodi = $row["prodi"];
                            $id = $row["id"];
                            echo <<<EOT
                            <tr>
                                <td>$no</td>
                                <td>$nama</td>
                                <td>$nim</td>
                                <td>$kelas</td>
                                <td>$prodi</td>
                                <td>
                                  <a class="success" href="ubah.php?id=$id">Edit</a> 
                                  <a class="danger" href="hapus.php?id=$id">Hapus</a> 
                                </td>
                            </tr>
EOT;
                            $no++;
                        }
                    }
                ?>
            </tbody>
        </table>
        <a href="tambah.php">Tambah data</a>
    </center>
</body>
</html>
<?php
    include("koneksi.php");

    if ( isset($_GET["id"]) ) {
        //Get data from db using key id
        $key = $_GET["id"];
        $sql = "SELECT * FROM tb_idmhs WHERE id = '$key'";
        $row = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($row);
    }

    if ( isset($_POST["ubah"]) ) {
        //Get data from POST
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $kelas = $_POST["kelas"];
        $prodi = $_POST["prodi"];
        $key = $_POST["key"];

        //Create SQl
        $sql = "UPDATE tb_idmhs SET nama = '$nama', nim = '$nim', kelas = '$kelas', prodi ='$prodi' WHERE id = '$key'";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Ubah Data Mahasiswa</legend>
        <form action="" method="post">
            <pre>
                <?php
                    $nim = $data["nim"];
                    $nama = $data["nama"];
                    $kelas = $data["kelas"];
                    $prodi = $data["prodi"];

                    echo <<<EOT
                    <input type="hidden" value="$key" name="key" /> \n
                    Nama  : <input type="text" name="nama" value="$nama" />
                    NIM   : <input type="text" name="nim" value="$nim" />
                    Kelas : <input type="text" name="kelas" value="$kelas" />
                    Prodi : <input type="text" name="prodi" value="$prodi" />
                    <button name="ubah" type="submit">Submit</button>
                    <a href="index.php">Beranda</a>
EOT;
                ?>
                <br>
            </pre>
        </form>
    </fieldset>
</body>
</html>
<?php

require("koneksi.php");

if ( isset($_GET["id"]) ) {
    $key = $_GET["id"];

    //Delete record from DB
    $sql = "DELETE FROM tb_idmhs WHERE id = '$key'";
    $row = mysqli_query($conn, $sql);

    header("Location: index.php");
}
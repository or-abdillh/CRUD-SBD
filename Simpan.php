<?php
  include "koneksi.php";

  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $prodi = $_POST['prodi'];

  //insert data ke db 'db_mhs3b1'
  $sql = "INSERT INTO tb_idmhs (nim, nama, kelas, prodi)VALUES ('$nim', '$nama', '$kelas', '$prodi')";
  $query = mysqli_query($conn, $sql);

  header("Location: index.php");
?>
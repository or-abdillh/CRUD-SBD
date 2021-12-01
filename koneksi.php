<?php

$server = "localhost";
$user = "root";
$password = "";
$db_name = "db_mhs";

$conn = mysqli_connect($server, $user, $password, $db_name);

if ( !$conn ) die();
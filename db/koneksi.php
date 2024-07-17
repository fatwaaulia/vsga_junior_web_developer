<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "vsga_jwd";

$koneksi = new mysqli($servername, $username, $password, $db_name);

if ($koneksi->connect_error) {
  die("Connection failed: " . $koneksi->connect_error);
}

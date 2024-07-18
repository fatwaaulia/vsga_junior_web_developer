<?php

require '../koneksi.php';

$id = $_POST['id'];

if (!$id) {
    header('location: ../../view/anggota/data.php');
}

$query = "DELETE FROM anggota WHERE id = $id";
$hapus_data = mysqli_query($koneksi, $query);

if ($hapus_data) {
    header('location: ../../view/anggota/data.php');
}

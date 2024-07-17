<?php

require '../koneksi.php';

$id = $_POST['id'];

if (!$id) {
    header('location: ../../data_buku.php');
}

$query = "DELETE FROM buku WHERE id = $id";
$hapus_data = mysqli_query($koneksi, $query);

if ($hapus_data) {
    header('location: ../../data_buku.php');
}

<?php

require '../koneksi.php';

$id = $_POST['id'];

if (!$id) {
    header('location: ../../view/transaksi_peminjaman/data.php');
}

$query = "DELETE FROM transaksi_peminjaman WHERE id = $id";
$hapus_data = mysqli_query($koneksi, $query);

if ($hapus_data) {
    header('location: ../../view/transaksi_peminjaman/data.php');
}

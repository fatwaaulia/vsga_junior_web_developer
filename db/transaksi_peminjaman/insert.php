<?php

require '../koneksi.php';

$tgl_peminjaman = $_POST['tgl_peminjaman'];
$nama_buku = $_POST['nama_buku'];
$nama_peminjam = $_POST['nama_peminjam'];

if (!$tgl_peminjaman OR !$nama_buku OR !$nama_peminjam) {
    header('location: ../../view/transaksi_peminjaman/data.php');
}

$query = "INSERT INTO transaksi_peminjaman VALUES (0, '$tgl_peminjaman', null, '$nama_buku', '$nama_peminjam')";
$tambah_data = mysqli_query($koneksi, $query);

if ($tambah_data) {
    header('location: ../../view/transaksi_peminjaman/data.php');
}

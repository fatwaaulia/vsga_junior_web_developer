<?php

require '../koneksi.php';

$kode = $_POST['kode'];
$nama_buku = $_POST['nama'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];

if (!$kode OR !$nama_buku OR !$penerbit OR !$tahun_terbit) {
    header('location: ../../data_buku.php');
}

$query = "INSERT INTO buku VALUES (0, '$kode', '$nama_buku', '$penerbit', '$tahun_terbit')";
$tambah_data = mysqli_query($koneksi, $query);

if ($tambah_data) {
    header('location: ../../data_buku.php');
}

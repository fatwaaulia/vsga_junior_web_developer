<?php

require '../koneksi.php';

$kode = $_POST['kode'];
$nama_buku = $_POST['nama'];
$penerbit = $_POST['penerbit'];
$nama_penulis = $_POST['nama_penulis'];
$tahun_terbit = $_POST['tahun_terbit'];

if (!$kode OR !$nama_buku OR !$penerbit OR !$nama_penulis OR !$tahun_terbit) {
    header('location: ../../view/buku/data.php');
}

$query = "INSERT INTO buku VALUES (0, '$kode', '$nama_buku', '$penerbit', '$nama_penulis', '$tahun_terbit')";
$tambah_data = mysqli_query($koneksi, $query);

if ($tambah_data) {
    header('location: ../../view/buku/data.php');
}

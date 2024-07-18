<?php

require '../koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$nama_buku = $_POST['nama'];
$penerbit = $_POST['penerbit'];
$nama_penulis = $_POST['nama_penulis'];
$tahun_terbit = $_POST['tahun_terbit'];

if (!$id OR !$kode OR !$nama_buku OR !$penerbit OR !$nama_penulis OR !$tahun_terbit) {
    header('location: ../../view/buku/data.php');
}

$query = "UPDATE buku
            SET kode = '$kode',
                nama = '$nama_buku',
                penerbit = '$penerbit',
                nama_penulis = '$nama_penulis',
                tahun_terbit = '$tahun_terbit'
            WHERE id = $id";
$edit_data = mysqli_query($koneksi, $query);

if ($edit_data) {
    header('location: ../../view/buku/data.php');
}






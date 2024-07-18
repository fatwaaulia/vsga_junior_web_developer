<?php

require '../koneksi.php';

$id_anggota = $_POST['id_anggota'];
$nama_anggota = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

if (!$id_anggota OR !$nama_anggota OR !$jenis_kelamin OR !$alamat) {
    header('location: ../../view/anggota/data.php');
}

$query = "INSERT INTO anggota VALUES (0, '$id_anggota', '$nama_anggota', '$jenis_kelamin', '$alamat')";
$tambah_data = mysqli_query($koneksi, $query);

if ($tambah_data) {
    header('location: ../../view/anggota/data.php');
}

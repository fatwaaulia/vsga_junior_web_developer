<?php

require '../koneksi.php';

$id = $_POST['id'];
$id_anggota = $_POST['id_anggota'];
$nama_anggota = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

if (!$id_anggota OR !$nama_anggota OR !$jenis_kelamin OR !$alamat) {
    header('location: ../../view/anggota/data.php');
}

$query = "UPDATE anggota
            SET id_anggota = '$id_anggota',
                nama = '$nama_anggota',
                jenis_kelamin = '$jenis_kelamin',
                alamat = '$alamat'
            WHERE id = $id";
$edit_data = mysqli_query($koneksi, $query);

if ($edit_data) {
    header('location: ../../view/anggota/data.php');
}







<?php

require '../koneksi.php';

$id = $_POST['id'];
$tgl_peminjaman = $_POST['tgl_peminjaman'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];
$nama_buku = $_POST['nama_buku'];
$nama_peminjam = $_POST['nama_peminjam'];

if (!$tgl_peminjaman OR !$tgl_pengembalian OR !$nama_buku OR !$nama_peminjam) {
    header('location: ../../view/transaksi_peminjaman/data.php');
}

$query = "UPDATE transaksi_peminjaman
            SET tgl_peminjaman = '$tgl_peminjaman',
                tgl_pengembalian = '$tgl_pengembalian',
                nama_buku = '$nama_buku',
                nama_peminjam = '$nama_peminjam'
            WHERE id = $id";
$edit_data = mysqli_query($koneksi, $query);

if ($edit_data) {
    header('location: ../../view/transaksi_peminjaman/data.php');
}







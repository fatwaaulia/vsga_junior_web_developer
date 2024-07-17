<?php
require_once 'db/koneksi.php';
$kode = $_GET['kode'];
$query = "SELECT * FROM buku WHERE kode = $kode";
$detail_buku = mysqli_query($koneksi, $query);

if (mysqli_num_rows($detail_buku) > 0) {
    $buku = mysqli_fetch_array($detail_buku);
} else {
    header('location: data_buku.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!-- navbar -->
    <?php require_once 'navbar.php'; ?>
    <!-- akhir navbar -->

    <!-- konten -->
    <section class="container mt-4">
        <div class="row mb-2">
            <div class="col-12">
                <h3>Detail Buku</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Kode Buku</td>
                                <td>: <?= $buku['kode'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Buku</td>
                                <td>: <?= $buku['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>: <?= $buku['penerbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td>: <?= $buku['tahun_terbit'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir konten -->
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
    new DataTable('#example', {
        scrollX: true
    });
    </script>
    <script src="main.js"></script>
</body>
</html>
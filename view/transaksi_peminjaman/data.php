<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Peminjaman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <!-- navbar -->
    <?php require_once '../component/navbar.php'; ?>
    <!-- akhir navbar -->

    <!-- konten -->
    <section class="container mt-4">
        <div class="row mb-2">
            <div class="col-12">
                <h3>Data Transaksi Peminjaman</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                                    Tambah Data
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Transaksi Peminjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="../../db/transaksi_peminjaman/insert.php" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="tgl_peminjaman" class="form-label">Tgl. Peminjaman</label>
                                                        <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" placeholder="masukkan tgl peminjaman">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_buku" class="form-label">Nama Buku</label>
                                                        <select class="form-select" id="nama_buku" name="nama_buku">
                                                            <option value="">Pilih</option>
                                                            <?php
                                                            require_once '../../db/koneksi.php';
                                                            $query = 'SELECT * FROM buku';
                                                            $data_buku = mysqli_query($koneksi, $query);
                                                            foreach ($data_buku as $buku) :
                                                            ?>
                                                            <option value="<?= $buku['nama'] ?>"><?= $buku['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_peminjam" class="form-label">Nama Peminjaman</label>
                                                        <select class="form-select" id="nama_peminjam" name="nama_peminjam">
                                                            <option value="">Pilih</option>
                                                            <?php
                                                            require_once '../../db/koneksi.php';
                                                            $query = 'SELECT * FROM anggota';
                                                            $data_anggota = mysqli_query($koneksi, $query);
                                                            foreach ($data_anggota as $anggota) :
                                                            ?>
                                                            <option value="<?= $anggota['nama'] ?>"><?= $anggota['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tgl. Peminjaman</th>
                                    <th>Tgl. Pengembalian</th>
                                    <th>Nama Buku</th>
                                    <th>Nama Peminjam</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../../db/koneksi.php';
                                $query = 'SELECT * FROM transaksi_peminjaman';
                                $data_transaksi_peminjaman = mysqli_query($koneksi, $query);
                                foreach ($data_transaksi_peminjaman as $key => $transaksi_peminjaman) :
                                ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $transaksi_peminjaman['tgl_peminjaman'] ?></td>
                                    <td><?= $transaksi_peminjaman['tgl_pengembalian'] ?></td>
                                    <td><?= $transaksi_peminjaman['nama_buku'] ?></td>
                                    <td><?= $transaksi_peminjaman['nama_peminjam'] ?></td>
                                    <td>
                                        <!-- edit -->
                                        <a href="#" class="me-2" title="edit" data-bs-toggle="modal" data-bs-target="#editData<?= $transaksi_peminjaman['id'] ?>">
                                            <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                        </a>
                                        <div class="modal fade" id="editData<?= $transaksi_peminjaman['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Transaksi Peminjaman</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="../../db/transaksi_peminjaman/update.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $transaksi_peminjaman['id'] ?>">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="tgl_peminjaman" class="form-label">Tgl. Peminjaman</label>
                                                                <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="<?= $transaksi_peminjaman['tgl_peminjaman'] ?>" placeholder="masukkan tgl peminjaman">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_pengembalian" class="form-label">Tgl. Pengembalian</label>
                                                                <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="<?= $transaksi_peminjaman['tgl_pengembalian'] ?>" placeholder="masukkan tgl pengembalian">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_buku" class="form-label">Nama Buku</label>
                                                                <select class="form-select" id="nama_buku" name="nama_buku">
                                                                    <option value="">Pilih</option>
                                                                    <?php
                                                                    require_once '../../db/koneksi.php';
                                                                    $query = 'SELECT * FROM buku';
                                                                    $data_buku = mysqli_query($koneksi, $query);
                                                                    foreach ($data_buku as $buku) :
                                                                    ?>
                                                                    <option value="<?= $buku['nama'] ?>" <?= $transaksi_peminjaman['nama_buku'] == $buku['nama'] ? 'selected' : '' ?>><?= $buku['nama'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_peminjam" class="form-label">Nama Peminjaman</label>
                                                                <select class="form-select" id="nama_peminjam" name="nama_peminjam">
                                                                    <?php
                                                                    require_once '../../db/koneksi.php';
                                                                    $query = 'SELECT * FROM anggota';
                                                                    $data_anggota = mysqli_query($koneksi, $query);
                                                                    foreach ($data_anggota as $anggota) :
                                                                    ?>
                                                                    <option value="<?= $anggota['nama'] ?>" <?= $transaksi_peminjaman['nama_peminjam'] == $anggota['nama'] ? 'selected' : '' ?>><?= $anggota['nama'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hapus -->
                                        <a href="#" data-bs-toggle="modal" title="delete" data-bs-toggle="modal" data-bs-target="#hapusData<?= $transaksi_peminjaman['id'] ?>">
                                            <i class="fa-regular fa-trash-can fa-lg text-danger"></i>
                                        </a>
                                        <div class="modal fade" id="hapusData<?= $transaksi_peminjaman['id'] ?>" tabindex="-1" aria-labelledby="hapusDataLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusDataLabel">Confirm delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete this data?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="../../db/transaksi_peminjaman/delete.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $transaksi_peminjaman['id'] ?>">
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
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
    <script src="../../assets/js/main.js"></script>
</body>
</html>
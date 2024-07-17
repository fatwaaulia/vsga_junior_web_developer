<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

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
                <h3>Data Buku</h3>
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
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Buku</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="db/buku/tambah_data.php" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="kode" class="form-label">Kode</label>
                                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="masukkan kode buku" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama Buku</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama buku" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="penerbit" class="form-label">Penerbit</label>
                                                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="masukkan penerbit" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="cth. 2010" required>
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
                                    <th>Kode</th>
                                    <th>Nama Buku</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Usia Buku</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'db/koneksi.php';
                                $query = 'SELECT * FROM buku';
                                $data_buku = mysqli_query($koneksi, $query);
                                foreach ($data_buku as $key => $buku) :
                                ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $buku['kode'] ?></td>
                                    <td><?= $buku['nama'] ?></td>
                                    <td><?= $buku['penerbit'] ?></td>
                                    <td><?= $buku['tahun_terbit'] ?></td>
                                    <td>
                                        <?php
                                        $tahun_terbit = $buku['tahun_terbit'];
                                        $tahun_sekarang = date('Y');
                                        $usia_buku = $tahun_sekarang - $tahun_terbit;
                                        echo $usia_buku . ' Tahun';
                                        ?>
                                    </td>
                                    <td>
                                        <!-- detail -->
                                        <a href="detail_buku.php?kode=<?= $buku['kode'] ?>" class="me-2" title="detail">
                                            <i class="fa-solid fa-circle-info fa-lg"></i>
                                        </a>
                                        <!-- edit -->
                                        <a href="#" class="me-2" title="edit" data-bs-toggle="modal" data-bs-target="#editData<?= $buku['kode'] ?>">
                                            <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                        </a>
                                        <div class="modal fade" id="editData<?= $buku['kode'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="db/buku/edit_data.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $buku['id'] ?>">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="kode" class="form-label">Kode</label>
                                                                <input type="text" class="form-control" id="kode" name="kode" value="<?= $buku['kode'] ?>" placeholder="masukkan kode buku" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama Buku</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $buku['nama'] ?>" placeholder="masukkan nama buku" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="penerbit" class="form-label">Penerbit</label>
                                                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit'] ?>" placeholder="masukkan penerbit" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" placeholder="cth. 2010" required>
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
                                        <a href="#" data-bs-toggle="modal" title="delete" data-bs-toggle="modal" data-bs-target="#hapusData<?= $buku['kode'] ?>">
                                            <i class="fa-regular fa-trash-can fa-lg text-danger"></i>
                                        </a>
                                        <div class="modal fade" id="hapusData<?= $buku['kode'] ?>" tabindex="-1" aria-labelledby="hapusDataLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusDataLabel">Confirm delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete this data?</p>
                                                        <table>
                                                            <tr>
                                                                <td>Kode</td>
                                                                <td>: <?= $buku['kode'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Buku</td>
                                                                <td>: <?= $buku['nama'] ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="db/buku/hapus_data.php" method="post">
                                                            <input type="hidden" name="id" value="<?= $buku['id'] ?>">
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
    <script src="main.js"></script>
</body>
</html>
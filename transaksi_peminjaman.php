<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Peminjaman</title>

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
                <h3>Data Transaksi Peminjaman</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Tambah Data
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Anggota</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="tgl_peminjaman" class="form-label">Tgl. Peminjaman</label>
                                                <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" placeholder="masukkan tgl peminjaman">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tgl_pengembalian" class="form-label">Tgl. Pengembalian</label>
                                                <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" placeholder="masukkan tgl pengembalian">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_buku" class="form-label">Nama Buku</label>
                                                <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="masukkan nama buku">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                                                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" placeholder="masukkan nama peminjam">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary">Tambahkan</button>
                                        </div>
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
                                <tr>
                                    <td>1</td>
                                    <td>17 Mei 2024</td>
                                    <td>28 Mei 2024</td>
                                    <td>Cerita Nabi dan Rasul</td>
                                    <td>Fatwa Aulia</td>
                                    <td>
                                        <a href="#" class="me-2" title="edit">
                                            <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                        </a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#hapus_data1" title="delete">
                                            <i class="fa-regular fa-trash-can fa-lg text-danger"></i>
                                        </a>
                                        <div class="modal fade" id="hapus_data1" tabindex="-1" aria-labelledby="hapusDataLabel" aria-hidden="true">
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
                                                                <td>Nama</td>
                                                                <td>: Fatwa</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="#" method="post">
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
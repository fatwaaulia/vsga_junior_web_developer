<?php $base_url = 'http://localhost/vsga/day_3/'; ?>

<nav class="navbar navbar-expand-lg" style="background-color: #C8ACD6;">
    <div class="container">
        <a class="navbar-brand" href="<?= $base_url ?>">Perpustakaan Umum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Entri Data dan Transaksi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= $base_url; ?>view/anggota/data.php">Data Anggota</a></li>
                        <li><a class="dropdown-item" href="<?= $base_url; ?>view/buku/data.php">Data Buku</a></li>
                        <li><a class="dropdown-item" href="<?= $base_url; ?>view/transaksi_peminjaman/data.php">Transaksi Peminjaman</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Laporan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-nowrap" href="#">Lap. Data Buku</a></li>
                        <li><a class="dropdown-item text-nowrap" href="#">Lap. Data Buku</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
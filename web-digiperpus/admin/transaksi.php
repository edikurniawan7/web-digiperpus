<?php
// Koneksi ke database
include '../config.php';

//Mulai Sesi
session_start();

//Ambil data transaksi dari database
$query = mysqli_query($config, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue-primary': '#3b82f6',
                        'blue-secondary': '#0065F8',
                        'teal-primary': '#0d9488',
                        'teal-secondary': '#14b8a6',
                        'cyan-accent': '#0bbee0',
                        'gray-light': '#f8fafc',
                        'emerald-accent': '#10b981'
                    },
                },
            },        
        }
    </script>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html, body {
            font-family: 'Inter', ui-sans-serif, system-ui, apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        }
    </style>
    
</head>
<body class="bg-gradient-to-t from-cyan-100 to-teal-50 min-h-screen">
    <!-- Sidebar -->
     <?php include 'partials/sidebar.php'; ?>
    
    <!-- Konten Utama -->
    <main class="flex-1 ml-64 p-8 mt-20 ">
        <h1 class="text-3xl font-bold text-blue-secondary mb-6"> Daftar Transaksi</h1>
        <!-- Tabel Data Transaksi -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Bagian Filter & Pencarian -->
            <div class="mb-6 flex items-center gap-4">
                <!-- Tombol Tambah Transaksi -->
                <a href="tambah_transaksi.php" class="bg-blue-secondary text-white px-4 py-2 rounded-full hover:bg-blue-primary transition whitespace-nowrap">
                    + Tambah Transaksi
                </a>

                <!-- Pencarian -->
                <form action="" method="GET" class="flex items-center gap-5 w-full">
                    <input 
                        name="search" 
                        placeholder="Cari..." 
                        type="text"
                        class="flex-1 px-4 py-2 border-2 border-gray-300 rounded-full focus:border-teal-primary focus:outline-none transition-colors"
                    >
                    <button type="submit" class="bg-blue-secondary text-white px-4 py-2 rounded-full hover:bg-blue-primary transition flex-shrink-0">
                        Cari
                    </button>
                </form>
            </div>

            <table class="min-w-full table-auto rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-blue-secondary rounded-full text-white">
                        <th class="text-sm px-4 py-2 text-left">ID Transaksi</th>
                        <th class="text-sm px-4 py-2 text-left">Nama</th>
                        <th class="text-sm px-4 py-2 text-left">Judul Buku</th>
                        <th class="text-sm px-4 py-2 text-left">Tgl Peminjaman</th>
                        <th class="text-sm px-4 py-2 text-left">Tgl Jatuh Tempo</th>
                        <th class="text-sm px-4 py-2 text-left">Tgl Pengembalian</th>
                        <th class="text-sm px-4 py-2 text-left">Status</th>
                        <th class="text-sm px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    if(mysqli_num_rows($query) > 0){
                        while($transaksi = mysqli_fetch_array($query)){
                    ?>
                    
                    <tr>
                        <td class="px-4 py-3 text-sm"><?= $transaksi['id_transaksi']; ?></td>
                        <td class="px-4 py-3 text-sm"><?= $transaksi['nama']; ?></td>
                        <td class="px-4 py-3 text-sm"><?= $transaksi['judul_buku']; ?></td>
                        <td class="px-4 py-3 text-sm"><?= $transaksi['tgl_peminjaman']; ?></td>
                        <td class="px-4 py-3 text-sm"><?= $transaksi['tgl_jatuh_tempo']; ?></td>
                        <td class="px-4 py-3 text-sm"><?= $transaksi['tgl_pengembalian']; ?></td>
                        <td class="px-4 py-3 text-sm">
                            <?php if($transaksi['status'] == 'dipinjam'): ?>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Dipinjam</span>
                            <?php elseif($transaksi['status'] == 'dikembalikan'): ?>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Dikembalikan</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3">
                            <a href="edit_transaksi.php?id=<?= $transaksi['id_transaksi']; ?>" class="text-blue-secondary hover:text-blue-primary mr-2">Edit</a>
                            <a href="hapus_transaksi.php?id=<?= $transaksi['id_transaksi']; ?>" onclick="return confirm('Yakin ingin menghapus transaksi ini?')" class="text-red-secondary hover:text-red-primary">Hapus</a>
                        </td>
                    </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="8" class="py-4 text-center text-gray-500">Belum ada Transaksi.</td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>


        
    </main>
        
</body>
</html>

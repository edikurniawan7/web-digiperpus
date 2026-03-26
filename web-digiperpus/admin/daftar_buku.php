<?php
// Koneksi ke database
include '../config.php';

//Mulai Sesi
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="icon" href="../assets/img/logo_title.png" type="image/png">

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
    <main class="flex-1 ml-64 p-8 mt-20">

    <h1 class="text-2xl font-bold text-blue-600 mb-6">
        Daftar Buku
    </h1>

    <!-- FILTER & SEARCH -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <div class="flex items-center gap-4 flex-wrap">

            <a href="tambah_buku.php"
               class="bg-blue-600 text-xs text-white px-4 py-2 rounded-full hover:bg-blue-500 transition">
                + Tambah Buku
            </a>

            <form onsubmit="return false;" class="flex items-center gap-3 flex-1 min-w-max">
            <input 
                name="search"
                placeholder="Cari judul / pengarang..."
                type="text"
                class="flex-1 px-4 py-2 text-xs border-2 border-gray-300 rounded-full focus:outline-none focus:border-teal-500 transition"
            >

                <select name="kategori"
                        class="text-xs font-semibold text-gray-700 px-3 py-2 border border-gray-300 rounded-full focus:outline-none">

                    <option value="">Semua Kategori</option>

                    <?php
                        $kategori_query = mysqli_query($config, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                        while($kategori = mysqli_fetch_array($kategori_query)):
                    ?>
                        <option value="<?= $kategori['id_kategori']; ?>">
                            <?= $kategori['nama_kategori']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>

            </form>
        </div>
    </div>

    <!-- GRID BUKU -->
    <div id="buku-container"
         class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <?php
            $query = mysqli_query($config, "SELECT * FROM buku ORDER BY judul ASC");
            while ($buku = mysqli_fetch_array($query)):
        ?>

        <div class="buku-item bg-white rounded-lg shadow-lg overflow-hidden flex flex-col"
             data-judul="<?= strtolower($buku['judul']); ?>"
             data-pengarang="<?= strtolower($buku['pengarang']); ?>"
             data-kategori="<?= $buku['id_kategori']; ?>">

            <!-- Cover -->
            <div class="h-40 w-full bg-blue-100 flex items-center justify-center overflow-hidden">
                <img src="../assets/img/cover/<?= $buku['cover']; ?>"
                     class="max-h-full max-w-full object-contain">
            </div>

            <!-- Info -->
            <div class="p-4 flex flex-col flex-grow">

                <h3 class="text-base font-bold text-gray-700 mb-2">
                    <?= $buku['judul']; ?>
                </h3>

                <div class="text-sm text-gray-600 mb-2">
                    <?= $buku['pengarang']; ?>
                </div>

                <div class="text-sm text-gray-600 mb-4">
                    <span class="font-semibold">Stok:</span>
                    <?= $buku['stok']; ?>
                </div>

                <!-- Action -->
                <div class="flex gap-2 mt-auto">

                    <a href="edit_buku.php?id_buku=<?= $buku['id_buku']; ?>"
                       class="flex-1 bg-blue-600 text-white px-2 py-1 rounded-full text-center text-sm hover:bg-blue-500 transition">
                        Edit
                    </a>

                    <a href="hapus_buku.php?id_buku=<?= $buku['id_buku']; ?>"
                       onclick="return confirm('Hapus buku ini?')"
                       class="flex-1 bg-red-500 text-white px-2 py-1 rounded-full text-center text-sm hover:bg-red-600 transition">
                        Hapus
                    </a>

                </div>
            </div>
        </div>

        <?php endwhile; ?>

    </div>

    <!-- PESAN KOSONG -->
    <div id="empty-message"
         class="hidden text-center text-gray-500 font-semibold mt-8">
        Buku tidak ditemukan
    </div>

</main>

<!-- JS FILTER -->
<script src="../assets/js/buku-filter.js"></script>

</body>
</html>
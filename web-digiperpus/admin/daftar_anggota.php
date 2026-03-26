<?php
// Koneksi ke database
include '../config.php';

// Mulai Sesi
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
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
        <h1 class="text-2xl font-bold text-blue-600 mb-6">Daftar Anggota</h1>

        <!-- Tabel Data Anggota -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            
            <!-- Filter & Search -->
            <div class="flex items-center gap-4 flex-wrap mb-6">
                <a href="tambah_anggota.php" class="bg-blue-600 text-xs text-white px-4 py-2 rounded-full hover:bg-blue-500 transition">
                    + Tambah Anggota
                </a>

                <form onsubmit="return false;" class="flex items-center gap-3 flex-1 min-w-max">
                    <input 
                        name="search"
                        placeholder="Cari nama anggota..."
                        type="text"
                        class="flex-1 px-4 py-2 text-xs border-2 border-gray-300 rounded-full focus:outline-none focus:border-teal-500 transition"
                    >
                    <button type="submit" class="bg-blue-600 text-xs text-white px-2 py-2 rounded-full hover:bg-blue-500 transition">
                        <img src="../assets/img/search.png" alt="Search" class="w-4 h-4">
                    </button> 
                </form>
            </div>

            <!-- Tabel -->
            <table class="min-w-full table-auto rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-blue-secondary text-white">
                        <th class="px-4 py-2 text-left text-sm">ID Anggota</th>
                        <th class="px-4 py-2 text-left text-sm">Nama Lengkap</th>
                        <th class="px-4 py-2 text-left text-sm">Username</th>
                    </tr>
                </thead>

                <tbody id="anggota-body">
                    <?php
                    $query = "SELECT id_user, nama, username FROM users WHERE role='user' ORDER BY nama ASC";
                    $result = mysqli_query($config, $query);

                    if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr class="anggota-item border-b hover:bg-gray-100 transition"
                            data-id="<?= strtolower($row['id_user']); ?>"
                            data-nama="<?= strtolower($row['nama']); ?>"
                            data-username="<?= strtolower($row['username']); ?>">
                            <td class="px-4 py-2 text-sm"><?= $row['id_user']; ?></td>
                            <td class="px-4 py-2 text-sm"><?= $row['nama']; ?></td>
                            <td class="px-4 py-2 text-sm"><?= $row['username']; ?></td>
                        </tr>
                    <?php 
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="3" class="py-4 text-center text-gray-500">
                                Belum ada anggota.
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Pesan Kosong Saat Search -->
            <div id="empty-anggota" class="hidden text-center text-gray-500 font-semibold mt-6">
                Anggota tidak ditemukan
            </div>

        </div>
    </main>
     <script src="../assets/js/anggota-filter.js"></script>
</body>
</html>

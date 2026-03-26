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
    <title>Tambah Transaksi</title>
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
    <main class="flex-1 ml-64 p-8 mt-20 ">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">
            Tambah Transaksi
        </h1>
        <!-- Form Tambah Transaksi -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="proses_tambah_transaksi.php" method="POST" class="space-y-6">
                <div>
                    <label for="id_anggota" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                    <input type="text" name="id_anggota" id="id_anggota" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-primary focus:border-blue-primary">
                </div>
                <div>
                    <label for="id_buku" class="block text-sm font-medium text-gray-700">ID Buku</label>
                    <input type="text" name="id_buku" id="id_buku" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-primary focus:border-blue-primary">
                </div>
                <div>
                    <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-primary focus:border-blue-primary">
                </div>
                <div>
                    <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-primary focus:border-blue-primary">
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition">Tambah Transaksi</button>
                </div>
            </form>
        </div>
    </main>



    
</body>
</html>
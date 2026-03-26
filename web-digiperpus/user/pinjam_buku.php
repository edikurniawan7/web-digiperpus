<?php
    // Koneksi ke database
    include '../config.php';

    //Nulai Sesi
    session_start();

    // Ambil data buku
    if (!isset($_GET['id'])) {
        echo "ID buku tidak ditemukan.";
        exit;
    }
    $id_buku = $_GET['id'];
    $buku_query = mysqli_query($config, "SELECT * FROM buku WHERE id_buku='$id_buku'");
    $buku = mysqli_fetch_assoc($buku_query);

if (!$buku) {
    echo "Data buku tidak ditemukan.";
    exit;
}

// Ambil daftar anggota
$anggota_query = mysqli_query($config, "SELECT id_user, nama FROM users WHERE role='user' ORDER BY nama ASC");
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku | Sistem Peminjaman Buku</title>
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
            Pinjam Buku
        </h1>

        <!-- Form Pinjam Buku -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
        

    <h2 class="text-xl font-bold text-center text-blue-600 mb-6">
        Form Peminjaman Buku
    </h2>

    <form action="aksi_pinjam.php" method="POST" class="space-y-4">

        <!-- Hidden ID Buku -->
        <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

        <!-- Detail Buku -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            <div class="flex gap-4">
            <div class="w-32">
                <img src="../assets/img/cover/<?= $buku['cover']; ?>" alt="<?= $buku['judul']; ?>" class="w-full rounded-lg shadow">
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-bold text-gray-800 mb-2"><?= $buku['judul']; ?></h3>
                <p class="text-sm mb-2"><span class="font-semibold">Oleh :</span> <?= $buku['pengarang']; ?></p>
                <p class="text-sm text-gray-600 mb-3"><?= $buku['deskripsi']; ?></p>
                <p class="text-sm"><span class="font-semibold">Stok Tersedia:</span> <?= $buku['stok']; ?></p>
            </div>
            </div>
        </div>

        <!-- Jumlah Buku Yang Dipinjam -->
        <div>
            <label class="block text-sm font-semibold mb-1">Jumlah Buku Dipinjam</label>
            <input type="number" name="jumlah_dipinjam" min="1" max="<?= $buku['stok']; ?>" value="1"
               class="w-full border px-3 py-2 rounded-lg focus:outline-none focus:border-teal-500"
               required>
        </div>

        <!-- Nama Anggota -->
        <div>
            <label class="block text-sm font-semibold mb-1">Anggota Peminjam</label>
            <input type="text"
               value="<?= $_SESSION['nama']; ?>"
               class="w-full border px-3 py-2 rounded-lg bg-gray-100"
               readonly>
        </div>

        <!-- Tanggal Pinjam -->
        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Peminjaman</label>
            <input type="date"
               name="tgl_peminjaman"
               value="<?= date('Y-m-d'); ?>"
               class="w-full border px-3 py-2 rounded-lg"
               required>
        </div>

        <!-- Tanggal Kembali -->
        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Pengembalian</label>
            <input type="date"
               name="tgl_pengembalian"
               class="w-full border px-3 py-2 rounded-lg"
               required>
        </div>

         <!-- Tombol Aksi -->
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="window.history.back()" class="px-6 py-2 rounded-full bg-white border-2 border-gray-300 text-gray-700 hover:bg-gray-100 transition-all font-semibold">
                                Kembali
                            </button>
                            <button type="submit" class="ml-auto px-6 py-2 bg-blue-secondary text-white rounded-full hover:shadow-lg transition-all font-semibold">
                                Simpan Buku
                            </button>
                        </div>

    </form>
</div>
    
           
    </main>

    
</body>
</html>
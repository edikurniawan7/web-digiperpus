<?php
//Koneksi ke database
include '../config.php';

session_start();

// Jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Jika role BUKAN admin tendang
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php?akses=ditolak");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Digiperpus</title>
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
        <!-- Card Admin -->
        <div class="mb-6">
            <div class="bg-blue-secondary p-8 rounded-lg shadow-xl relative overflow-hidden">
            <div class="absolute inset-0 opacity-15">
                <img src="../assets/img/yow.png" alt="background" class="w-full h-full object-cover"/>
            </div>
            <div class="relative z-10">
                <h1 class="text-3xl text-white font-bold mb-4">Hai <?php echo $_SESSION['nama']; ?> !</h1>
                <h2 class="text-2xl font-bold text-white mb-2">Selamat datang sebagai Admin</h2>
                <p class="text-blue-100">Kelola sistem peminjaman buku anda dengan mudah dan efisien.</p>
            </div>
            </div>
        </div>

        <!-- Statistik Card -->
        <div class="grid grid-cols-1 mt-10 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-secondary hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                <h3 class="text-base font-semibold text-gray-700 mb-2">Total Buku</h3>
                <?php
                    // Query untuk menghitung total buku
                    $query = "SELECT COUNT(*) AS total_buku FROM buku";
                    $result = mysqli_query($config, $query);
                    $data = mysqli_fetch_assoc($result);
                    $total_buku = $data['total_buku'];
                ?>
                <p class="text-3xl font-bold text-blue-secondary"><?php echo $total_buku; ?></p>
                </div>
                <div class="text-blue-secondary opacity-80">
                    <img src="../assets/img/logobook.png" alt="Book Icon" class="w-12 h-12">
                </div>
            </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-teal-primary hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                <h3 class="text-base font-semibold text-gray-700 mb-2">Total Anggota</h3>
                <?php
                    // Query untuk menghitung total user
                    $query = "SELECT COUNT(*) AS total_anggota FROM users WHERE role != 'admin'";
                    $result = mysqli_query($config, $query);
                    $data = mysqli_fetch_assoc($result);
                    $total_anggota = $data['total_anggota'];
                ?>
                <p class="text-3xl font-bold text-teal-primary"><?php echo $total_anggota; ?></p>
                </div>
                <div class="text-teal-primary opacity-80">
                    <img src="../assets/img/groupusers.png" alt="Members Icon" class="w-12 h-12">
                </div>
            </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-cyan-accent hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                <h3 class="text-base font-semibold text-gray-700 mb-2">Peminjaman Aktif</h3>

                <p class="text-3xl font-bold text-cyan-accent">-</p>
                </div>
                <div class="text-cyan-accent opacity-80">
                    <img src="../assets/img/pinjam.png" alt="Borrow Icon" class="w-12 h-12">
                </div>
            </div>  
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-accent hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                <h3 class="text-base font-semibold text-gray-700 mb-2">Menunggu</h3>
                <p class="text-3xl font-bold text-emerald-accent">-</p>
                </div>
                <div class="text-emerald-accent opacity-80">
                    <img src="../assets/img/file.png" alt="Return Icon" class="w-12 h-12">
                </div>
            </div>
            </div>  
        </div>

        <!-- Aktivitas Terbaru dan Akses Cepat -->
        <div class="grid grid-cols-1 mt-10 md:grid-cols-2 gap-6">
            <!-- Aktivitas Terbaru -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Aktivitas Terbaru</h3>
            
            </div>

            <!-- Akses Cepat -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Akses Cepat</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="daftar_buku.php" class="bg-blue-secondary text-white p-4 rounded-lg flex items-center justify-center hover:bg-blue-primary transition-colors">
                        <span>Kelola Buku</span>
                    </a>
                    <a href="daftar_anggota.php" class="bg-teal-primary text-white p-4 rounded-lg flex items-center justify-center hover:bg-teal-secondary transition-colors">
                        <span>Kelola Anggota</span>
                    </a>
                    <a href="transaksi.php" class="bg-cyan-accent text-white p-4 rounded-lg flex items-center justify-center hover:bg-cyan-accent/80 transition-colors">
                        <span>Kelola Peminjaman</span>
                    </a>
                    <a href="transaksi.php" class="bg-emerald-accent text-white p-4 rounded-lg flex items-center justify-center hover:bg-emerald-accent/80 transition-colors">
                        <span>Kelola Pengembalian</span>
                    </a>
                </div>
            </div>
        </div>          

        









    </main>
        
</body>
</html>
<?php 
// Ambil nama file yang sedang dibuka
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="fixed top-0 left-64 right-0 h-20 bg-white shadow flex items-center px-5 z-40 transition-all">
    <!-- Judul -->
    <div class="flex-1">
        <h1 class="text-xl font-bold text-blue-secondary">Dashboard Admin</h1>
        <p class="text-sm text-gray-500">Digiperpus | Sistem Peminjaman Buku</p>
    </div>

    <!-- User Info -->
    <div class="flex items-center gap-4">
        <div class="text-right">
            <p class="text-sm font-semibold text-blue-secondary"><?= $_SESSION['nama'] ?? 'Admin'; ?></p>
            <p class="text-xs text-gray-500">Admin</p>
        </div>
        <a href="profil_admin.php">
            <img src="../assets/img/profil.webp" alt="User Icon" class="w-10 h-10 rounded-full object-cover">
        </a>
    </div>
</nav>

<!-- Sidebar -->
<aside id="top-bar-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full bg-blue-secondary transition-transform -translate-x-full sm:translate-x-0 shadow-lg border-r border-blue-primary " aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
        <div class="flex items-center justify-center border-b-2 border-white pb-1">
            <img src="../assets/img/logo_digiperpus1.png" alt="Logo DigiPerpus" class="h-15 w-40 rounded-3xl object-cover">
        </div>

        <!-- Menu -->
        <ul class="space-y-2 font-medium mt-10 ml-2">
            <li><a href="dashboard_admin.php" class="flex items-center p-2 text-white rounded-lg  <?php echo $current_page == 'dashboard_admin.php' ? 'bg-blue-primary border-l-4 border-white' : 'hover:bg-blue-primary'; ?> transition-all"><img src="../assets/img/dashboard.png" alt="Dashboard" class="w-5 h-5 mr-3"><span>Dashboard</span></a></li>
            <li><a href="daftar_transaksi.php" class="flex items-center p-2 text-white rounded-lg <?php echo $current_page == 'daftar_transaksi.php' ? 'bg-blue-primary border-l-4 border-white' : 'hover:bg-blue-primary'; ?> transition-all"><img src="../assets/img/book.png" alt="Peminjaman" class="w-5 h-5 mr-3"><span>Peminjaman</span></a></li>
            <li><a href="daftar_buku.php" class="flex items-center p-2 text-white rounded-lg <?php echo $current_page == 'daftar_buku.php' ? 'bg-blue-primary border-l-4 border-white' : 'hover:bg-blue-primary'; ?> transition-all"><img src="../assets/img/open-book.png" alt="Data Buku" class="w-5 h-5 mr-3"><span>Daftar Buku</span></a></li>
            <li><a href="daftar_anggota.php" class="flex items-center p-2 text-white rounded-lg <?php echo $current_page == 'daftar_anggota.php' ? 'bg-blue-primary border-l-4 border-white' : 'hover:bg-blue-primary'; ?> transition-all"><img src="../assets/img/group-users.png" alt="Data Anggota" class="w-5 h-5 mr-3"><span>Daftar Anggota</span></a></li>
            <li><a href="riwayat_peminjaman.php" class="flex items-center p-2 text-white rounded-lg <?php echo $current_page == 'riwayat_peminjaman.php' ? 'bg-blue-primary border-l-4 border-white' : 'hover:bg-blue-primary'; ?> transition-all"><img src="../assets/img/history.png" alt="Riwayat_peminjaman" class="w-5 h-5 mr-3"><span>Riwayat</span></a></li>

            <hr class="my-4 border-blue-primary">

            <li><a href="../auth/logout.php" onclick="confirmLogout(event)" class="flex items-center p-2 text-white rounded-lg hover:bg-blue-primary transition-all"><img src="../assets/img/logout.png" alt="Logout" class="w-5 h-5 mr-3"><span>Logout</span></a></li>
        </ul>

        <script>
            function confirmLogout(event) {
            event.preventDefault();
            if (confirm('Yakin ingin keluar?')) {
                window.location.href = '../auth/logout.php';
            }
            }
        </script>
    </div>
</aside>

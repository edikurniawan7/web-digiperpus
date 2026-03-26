<?php
    // Koneksi ke database
    include '../config.php';

    //Nulai Sesi
    session_start();

    // Cek apakah user sudah login
    if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
        header('Location: ../auth/login.php');
        exit();
    }

?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiperpus | Sistem Peminjaman Buku</title>
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

        <div class="mb-6">
            <div class="bg-blue-secondary p-8 rounded-lg shadow-xl relative overflow-hidden">
            <div class="absolute inset-0 opacity-15">
                <img src="../assets/img/yow.png" alt="background" class="w-full h-full object-cover"/>
            </div>
            <div class="relative z-10">
                <h1 class="text-3xl text-white font-bold mb-4">Hai <?php echo $_SESSION['nama']; ?> !</h1>
                <h2 class="text-2xl font-bold text-white mb-2">Selamat datang di Digiperpus,</h2>
                <p class="text-blue-100">Sistem peminjaman buku yang mudah dan efisien.</p>
            </div>
            </div>
        </div>

        <div class="mb-6">
                <h2 class="text-xl font-bold text-blue-secondary mb-4">Rekomendasi Buku Hari ini</h2>
                <div class="grid grid-cols-5 gap-6">
                <?php
                    $query = mysqli_query($config, "SELECT * FROM buku ORDER BY RAND() ");
                                      while($buku = mysqli_fetch_array($query)){
                ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <div class="h-40 w-full bg-blue-100 flex items-center justify-center overflow-hidden">
                        <img src="../assets/img/cover/<?= $buku['cover']; ?>" alt="<?= $buku['judul']; ?>" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                    <h3 class="text-center font-bold text-blue-primary mb-2"><?= $buku['judul']; ?></h3>
                    <p class="text-gray-600 text-xs  mb-1"><?= $buku['pengarang']; ?></p>
                    <p class="text-gray-600 text-xs  mb-1">Stok : <?= $buku['stok']; ?></p>
                    <div class="flex flex-col gap-2">
                       <a href="pinjam_buku.php?id=<?= $buku['id_buku']; ?>"
                            class="block w-full text-center bg-blue-secondary text-white px-3 py-2 text-sm rounded-lg hover:bg-blue-primary transition">
                            Pinjam Buku
                        </a>
                        <button class="w-full bg-teal-primary text-white px-3 py-2 text-sm rounded-lg hover:bg-teal-secondary transition">
                        <a href="preview_buku.php?id_buku=<?= $buku['id_buku']; ?>">Lihat Preview</a>
                        </button>
                        
                    </div>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>



    </main>
</body>
</html>
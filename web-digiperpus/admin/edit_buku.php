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
    <title>Edit Buku</title>
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

    <?php
    // Ambil data kategori untuk dropdown
    $data_kategori = mysqli_query($config, "SELECT * FROM kategori ORDER BY nama_kategori ASC");

    // Ambil data buku berdasarkan ID
    $id = $_GET['id_buku'];
    $data = mysqli_query($config, "SELECT * FROM buku WHERE id_buku='$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    
    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 mt-20">  
        <div class="flex justify-center">
            <div class="w-full max-w-3xl">
                <h1 class="text-3xl font-bold text-blue-secondary mb-6 text-center">Edit Buku</h1>

                <!-- Form Edit Buku -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <form action="../aksi/aksi_edit_buku.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_buku" value="<?php echo $d['id_buku']; ?>">
                        
                        <div class="flex flex-row gap-8 mb-8">
                            <!-- Cover Buku -->
                            <div class="flex flex-col items-center">
                                <label for="cover" class="block font-semibold text-blue-secondary mb-1">Cover Buku</label>
                                <div id="cover-preview" class="w-48 h-64 border-2 border-gray-300 rounded-lg flex items-center justify-center bg-gray-100 overflow-hidden mb-4">
                                    <img id="cover-img" src="../assets/img/cover/<?= $d['cover']; ?>" alt="<?= $d['judul']; ?>" class="w-full h-full object-cover">
                                </div>
                                <input type="file" name="cover" id="cover" accept="image/*" class="w-48 mt-4 border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:border-teal-secondary">
                            </div>

                            <!-- Informasi Dasar -->
                            <div class="flex-1">
                                <div class="mb-4">
                                    <label for="judul" class="block font-semibold text-blue-secondary mb-1">Judul Buku</label>
                                    <input type="text" name="judul" id="judul" value="<?php echo $d['judul']; ?>" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors" required>
                                </div>
                                <div class="mb-4">
                                    <label for="pengarang" class="block font-semibold text-blue-secondary mb-1">Pengarang</label>
                                    <input type="text" name="pengarang" id="pengarang" value="<?php echo $d['pengarang']; ?>" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors" required>
                                </div>
                                <div class="mb-4">
                                    <label for="penerbit" class="block font-semibold text-blue-secondary mb-1">Penerbit</label>
                                    <input type="text" name="penerbit" id="penerbit" value="<?php echo $d['penerbit']; ?>" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors" required>
                                </div>
                                <div class="mb-4">
                                    <label for="tahun_terbit" class="block font-semibold text-blue-secondary mb-1">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?php echo $d['tahun_terbit']; ?>" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors" required>
                                </div>
                            </div>
                        </div>

                        <!-- Field Tambahan -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="id_kategori" class="block font-semibold text-blue-secondary mb-1">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php mysqli_data_seek($data_kategori, 0); while ($kategori = mysqli_fetch_array($data_kategori)) { ?>
                                        <option value="<?= $kategori['id_kategori']; ?>" <?= ($kategori['id_kategori'] == $d['id_kategori']) ? 'selected' : ''; ?>>
                                            <?= $kategori['nama_kategori']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label for="stok" class="block font-semibold text-blue-secondary mb-1">Stok</label>
                                <input type="text" name="stok" id="stok" value="<?php echo $d['stok']; ?>" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="deskripsi" class="block font-semibold text-blue-secondary mb-1">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-teal-secondary focus:outline-none transition-colors"><?php echo $d['deskripsi']; ?></textarea>
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
                        
                <?php } ?>
            </div>
        </div>
    </main>

    <script>
        // Preview gambar saat user memilih file
        document.getElementById('cover').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.getElementById('cover-img');
                    img.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>

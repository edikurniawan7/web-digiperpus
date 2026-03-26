<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | Digiperpus</title>
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

<!-- JS Login -->
<script src="../assets/js/login.js"></script>

<body class="bg-gradient-to-t from-cyan-100 to-teal-50 min-h-screen flex items-center justify-center">
    <!-- Login Container -->
    <div class="w-full max-w-md">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-2 group">
                <img src="../assets/img/logo_digiperpus1.png" alt="Logo DigiPerpus" class="h-20 w-50 rounded-3xl object-cover">
            </div>
            <p class="text-gray-600">Daftar akun sistem peminjaman buku</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white p-8 rounded-2xl shadow-2xl">
            <form method="post" action="../aksi/aksi_login.php" id="loginForm" class="space-y-8 py-4">
                <!-- Username Field -->
                <div class="form-group">
                    <label for="username" class="block text-sm font-medium text-gray-600 mb-2">
                        Username
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <img class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" src="../assets/img/user.png">
                        </div>
                        <input 
                            type="text" 
                            id="username"
                            name="username"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-teal-primary focus:outline-none transition-colors"
                            placeholder="Masukkan username"
                            required
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-600 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <img class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" src="../assets/img/padlock.png">
                        </div>
                        <input 
                            type="password"
                            id="password"  
                            name="password"
                            class="w-full pl-12 pr-12 py-3 border-2 border-gray-200 rounded-lg focus:border-teal-primary focus:outline-none transition-colors"
                            placeholder="Masukkan password"
                            required
                        >
                        <button 
                            type="button" 
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-teal-primary transition-colors"
                        >
                            <img id="eyeIcon" class="w-5 h-5" src="../assets/img/hidden.png" alt="Show Password">
                            <img id="eyeOffIcon" class="w-5 h-5 hidden" src="../assets/img/eye.png" alt="Hide Password">
                        </button>
                    </div>
                </div>

                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full mt-10 bg-blue-secondary text-white py-3 px-6 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg"
                >
                    Daftar
                </button>
            </form>
        </div>

        <!-- Register Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600">
                Sudah punya akun? 
                <a href="../auth/login.php" class="text-teal-primary hover:text-teal-secondary font-semibold transition-colors">
                    Masuk sekarang
                </a>
            </p>
        </div>
    

        <!-- Kembali ke Beranda -->
        <div class="text-center mb-4 mt-4">
            <a href="../index.php" class="inline-flex items-center text-gray-500 hover:text-teal-primary transition-colors">
                <span class="mr-2">←</span>
                Kembali ke beranda
            </a>
        </div>
    </div>
</body>
</html>

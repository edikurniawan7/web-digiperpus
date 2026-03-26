<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <title>Digiperpus | Sistem Peminjaman Buku</title>
</head>
<body class="bg-teal-50">
  <!-- Navigation -->
    <nav class="bg-white backdrop-blur-md shadow- border-b border-white/20 fixed w-full top-0 z-50 transition-all duration-500" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center group">
                    <img src="assets/img/logo_digiperpus1.png" href="index.php" alt="Logo DigiPerpus" class="h-20 w-50 rounded-3xl object-cover">
                </div>
                <div class="hidden md:flex flex-2 justify-center">
                    <div class="flex items-center space-x-1">
                        <a href="#beranda" class="text-gray-800 font-semibold nav-link relative px-4 py-2 text-sm transition-all duration-300 group">
                            <span class="relative z-10">Beranda</span>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-blue-500 group-hover:w-12 transition-all duration-300"></div>
                        </a>
                        <a href="#tentang" class="text-gray-800 font-semibold nav-link relative px-4 py-2 text-sm transition-all duration-300 group">
                            <span class="relative z-10">Tentang</span>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-blue-500 group-hover:w-12 transition-all duration-300"></div>
                        </a>
                        <a href="#fitur" class="text-gray-800 font-semibold nav-link relative px-4 py-2 text-sm transition-all duration-300 group">
                            <span class="relative z-10">Fitur</span>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-blue-500 group-hover:w-12 transition-all duration-300"></div>
                        </a>
                        <a href="#testimoni" class="text-gray-800 font-semibold nav-link relative px-4 py-2 text-sm transition-all duration-300 group">
                            <span class="relative z-10">Testimoni</span>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-blue-500 group-hover:w-12 transition-all duration-300"></div>
                        </a>
                        <a href="#kontak" class="text-gray-800 font-semibold nav-link relative px-4 py-2 text-sm transition-all duration-300 group">
                            <span class="relative z-10">Kontak</span>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-blue-500 group-hover:w-12 transition-all duration-300"></div>
                        </a>

                        
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="../login.php" class="text-gray-800 font-semibold nav-link relative px-4 py-2 text-sm transition-all duration-300 group">
                            <span class="relative z-10">Login→</span>
                    </a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-blue-primary transition-colors p-2 rounded-lg hover:bg-blue-50">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </nav>

</body>
</html>
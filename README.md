# web-digiperpus

Digiperpus adalah sistem manajemen perpustakaan berbasis web yang dibangun menggunakan PHP dan Tailwind CSS v4 (CLI). Proyek ini dikembangkan untuk keperluan pembelajaran dan penilaian sekolah (UKK), dengan fokus pada kesederhanaan, kemudahan penggunaan, dan tampilan antarmuka yang bersih.

---

## Fitur

* Manajemen dan daftar buku
* Antarmuka peminjaman buku
* Fitur pencarian (dalam pengembangan)
* Desain responsif menggunakan Tailwind CSS

---

## Teknologi yang Digunakan

* PHP (Native)
* Tailwind CSS v4 (CLI)
* HTML5
* JavaScript (opsional)

---

## Struktur Project

```
WEB-DIGIPERPUS/
├── assets/            # File statis (gambar, font, JavaScript)
├── src/               # File sumber Tailwind
│   └── input.css
├── dist/              # Hasil kompilasi CSS
│   └── output.css
├── index.php          # Halaman utama
├── package.json       # Dependency dan script
├── .gitignore
└── README.md
```

---

## Cara Menjalankan Project

### Persyaratan

* Node.js (disarankan versi 18 atau lebih baru)
* Web server (XAMPP, Laragon, atau sejenisnya)

---

### Instalasi

1. Clone repository atau download ZIP:

```
git clone https://github.com/username/digiperpus.git
```

2. Masuk ke folder project:

```
cd WEB-DIGIPERPUS
```

3. Install dependency:

```
npm install
```

4. Jalankan Tailwind:

```
npm run dev
```

---

### Menjalankan di Browser

Simpan project di folder server (misalnya `htdocs`), lalu buka:

```
http://localhost/WEB-DIGIPERPUS
```

---

## Penggunaan Sederhana (Tanpa Instalasi)

Untuk penggunaan di perangkat tanpa setup:

1. Download project dari GitHub (ZIP)
2. Extract file
3. Jalankan melalui server lokal

Catatan:
File `dist/output.css` harus tersedia agar tampilan Tailwind tetap berfungsi.

---

## Script yang Tersedia

```
npm run dev    # Mode development (watch)
npm run build  # Build CSS untuk production
```

---

## Catatan Penting

* Folder `node_modules/` tidak disertakan dalam repository
* File `dist/output.css` disertakan agar project dapat langsung dijalankan tanpa build ulang
* Jalankan ulang Tailwind jika ada perubahan pada `src/input.css`

---

## Rencana Pengembangan

* Sistem backend peminjaman yang lebih lengkap
* Fitur autentikasi (admin dan user)
* Dashboard dan laporan
* Peningkatan kualitas UI dan komponen

---

## Penulis

Edi Kurniawan

---

## Lisensi

Project ini dibuat untuk keperluan pembelajaran dan tidak ditujukan untuk penggunaan komersial.

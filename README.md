# Tema WordPress Portofolio Minimalis

Tema WordPress minimalis untuk portofolio akademik dengan desain modern dan bersih. Tema ini dikonversi dari template Django.

## Fitur

- **Desain Minimalis**: Tampilan bersih dengan fokus pada konten
- **Responsive**: Tampilan optimal di berbagai ukuran layar
- **Custom Post Types**: 
  - Publikasi/Penelitian
  - Portofolio
- **Halaman Khusus**:
  - Halaman Depan (Front Page)
  - Halaman Biografi
  - Arsip Publikasi
  - Blog
- **Typography**: Menggunakan Google Fonts (Crimson Pro, Sora, JetBrains Mono)
- **Tailwind CSS**: Menggunakan Tailwind CSS untuk styling tambahan

## Instalasi

1. Upload folder tema ke direktori `/wp-content/themes/`
2. Aktifkan tema melalui dashboard WordPress (Appearance > Themes)
3. Buat halaman baru dengan template "Halaman Biografi" untuk halaman biografi
4. Set halaman sebagai Front Page melalui Settings > Reading

### Setup Halaman Blog

Untuk menampilkan halaman blog dengan listing postingan, ikuti langkah-langkah berikut:

#### Langkah 1: Buat Halaman Blog
1. Login ke WordPress Dashboard
2. Klik **Pages** > **Add New** di sidebar
3. Ketik judul halaman: **Blog**
4. Jangan isi konten (biarkan kosong)
5. Klik **Publish**

#### Langkah 2: Konfigurasi Reading Settings  
1. Pergi ke **Settings** > **Reading**
2. Di bagian **Your homepage displays**, pilih **A static page**
3. Pada dropdown **Homepage**, pilih halaman yang menjadi home (biasanya otomatis atau pilih halaman front page)
4. Pada dropdown **Posts page**, pilih **Blog** (halaman yang baru dibuat)
5. Klik **Save Changes**

#### Langkah 3: Tambahkan ke Menu (Opsional)
1. Pergi ke **Appearance** > **Menus**
2. Pilih menu yang aktif atau buat menu baru
3. Di panel kiri, buka section **Pages**
4. Centang halaman **Blog**
5. Klik **Add to Menu**
6. Atur posisi menu sesuai keinginan
7. Di field **Title Attribute**, tambahkan emoji: `📝` (untuk icon)
8. Klik **Save Menu**

#### Langkah 4: Verifikasi
1. Kunjungi halaman Blog di website (misalnya: `https://your-site.com/blog`)
2. Halaman akan menampilkan:
   - Daftar postingan blog terbaru
   - Pagination jika postingan lebih dari 10
   - Sidebar navigation (pada desktop)
   - Floating bottom navigation (pada mobile)

#### Catatan Penting:
- **Halaman Blog** berfungsi sebagai container untuk listing posts, bukan untuk konten manual
- Template yang digunakan: `index.php`
- Untuk single post, template `single.php` akan digunakan
- Archive berdasarkan kategori/tag menggunakan `archive.php`
- Archive publikasi menggunakan `archive-publikasi.php` (akses via `/penelitian`)

#### Troubleshooting:
- **Blog tidak menampilkan posts**: Pastikan sudah ada postingan dengan status "Published"
- **Halaman 404**: Pergi ke **Settings** > **Permalinks** dan klik **Save Changes** untuk refresh rewrite rules
- **Menu tidak muncul**: Pastikan menu sudah di-assign ke lokasi "Menu Utama" di **Appearance** > **Menus**
- **Mobile navigation hilang**: Clear browser cache dan refresh dengan **Cmd+Shift+R** (Mac) atau **Ctrl+Shift+R** (Windows)

## Struktur File

```
portofolio_min/
├── style.css           # Stylesheet utama dengan CSS tema
├── functions.php       # Fungsi tema dan custom post types
├── header.php          # Header template
├── footer.php          # Footer template
├── index.php           # Template fallback utama
├── front-page.php      # Template halaman depan
├── single.php          # Template untuk single post
├── archive.php         # Template untuk arsip/publikasi
├── page-biography.php  # Template halaman biografi
└── README.md           # Dokumentasi tema
```

## Custom Post Types

### Publikasi
- **Slug**: `/penelitian`
- **Meta Fields**:
  - Tahun (year)
  - Jurnal (journal)
  - Penulis (authors)
  - URL
  - DOI
  - Keywords
  - Abstrak (abstract)

### Portofolio
- **Slug**: `/portofolio`
- **Meta Fields**:
  - Tahun (year)
  - Kategori (category)
  - Deskripsi (description)

## Penggunaan

### Membuat Publikasi
1. Pergi ke Dashboard > Publikasi > Tambah Publikasi
2. Masukkan judul publikasi
3. Isi konten (opsional untuk detail lengkap)
4. Isi meta fields di bagian "Detail Publikasi"
5. Publish

### Membuat Portofolio
1. Pergi ke Dashboard > Portofolio > Tambah Portofolio
2. Masukkan judul proyek
3. Isi konten proyek
4. Upload featured image (opsional)
5. Isi meta fields di bagian "Detail Portofolio"
6. Publish

### Customization Options

Tema ini menyimpan beberapa opsi kustomisasi melalui WordPress Options API:

- `portofolio_skills`: Array skill/keahlian
- `portofolio_education`: Array riwayat pendidikan
- `portofolio_experiences`: Array pengalaman kerja
- `portofolio_research_interests`: Array minat penelitian

Anda dapat mengelola opsi ini melalui plugin seperti Advanced Custom Fields atau dengan menambahkan halaman settings custom.

## Menu Navigation

Tema ini mendukung menu navigasi custom. Untuk mengatur menu:

1. Pergi ke Appearance > Menus
2. Buat menu baru atau edit menu yang ada
3. Tambahkan item menu sesuai kebutuhan
4. Assign menu ke lokasi "Menu Utama"
5. Untuk menambahkan icon, gunakan field "Title Attribute" dengan emoji (contoh: 🏠, 👤, 🔬, 💼, 📝)

Jika tidak ada menu yang diset, tema akan menggunakan default menu dengan struktur:
- Beranda
- Biografi
- Penelitian
- Portofolio
- Blog

## Kustomisasi Warna

Warna tema dapat dikustomisasi melalui file `style.css`. Palette warna default:

- **Background**: `#f8f6f1` (paper)
- **Text**: `#1a1a1a` (ink)
- **Muted**: `#6b6b6b`
- **Border**: `#d4cfc6` (rule)
- **Accent**: `#c0392b`
- **Link**: `#1a5276`

## Tips Penggunaan

1. **Halaman Depan**: Secara default WordPress akan menggunakan `front-page.php` sebagai halaman depan saat "A static page" dipilih di Settings > Reading.

2. **Halaman Blog**: Untuk menampilkan daftar blog posts, buat halaman khusus dan set sebagai "Posts page" di Settings > Reading. Tema akan otomatis menggunakan template `index.php` untuk halaman ini.

3. **Archive vs Blog**: 
   - Halaman Blog (Posts page) menampilkan semua blog posts menggunakan `index.php`
   - Archive kategori/tag menggunakan `archive.php`
   - Archive publikasi menggunakan `archive-publikasi.php` dengan filter tahun

4. **Sidebar TOC**: Untuk menambahkan Table of Contents di sidebar, gunakan action hook `portofolio_min_sidebar_toc` dalam template halaman custom.

5. **Featured Images**: Upload featured image untuk publikasi dan portofolio agar tampil di halaman arsip dan single post.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)


## Credits

- **Fonts**: Google Fonts (Crimson Pro, Sora, JetBrains Mono)
- **CSS Framework**: Tailwind CSS (via CDN)
- **Original Design**: Converted from Django template

## License

GNU General Public License v2 or later

## Changelog

### Version 1.0
- Initial release
- Converted from Django template to WordPress theme
- Custom post types for Publikasi and Portofolio
- Responsive design
- Custom meta boxes for publication details

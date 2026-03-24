# Tema WordPress Portofolio Minimalis

![Version](https://img.shields.io/badge/version-1.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)
![License](https://img.shields.io/badge/license-GPL--2.0-green.svg)

Tema WordPress minimalis profesional untuk portofolio akademik dengan desain modern dan bersih. Dioptimalkan untuk dosen, peneliti, dan akademisi yang ingin menampilkan publikasi, penelitian, dan profil profesional dengan elegan.


## ✨ Fitur Utama

### Desain & Layout
- **Desain Minimalis**: Tampilan bersih dengan fokus pada konten dan keterbacaan
- **Fully Responsive**: Tampilan optimal di desktop, tablet, dan mobile
- **Sticky Sidebar**: Navigasi tetap terlihat saat scroll (desktop)
- **Mobile Navigation**: Bottom floating navigation untuk mobile
- **Grid Layout**: Modern CSS Grid dengan 240px sidebar + main content

### Custom Post Types
- **Publikasi/Penelitian** (`/penelitian`)
  - Meta fields: Tahun, Jurnal, Penulis, URL
  - Template arsip khusus
  - Sorting otomatis berdasarkan tahun
- **Portofolio** (`/portofolio`)
  - Meta fields: Kategori, URL, Teknologi
  - Featured image support
  - Grid display untuk showcase

### Template Khusus
- **Front Page**: Halaman depan dengan foto profil dan ringkasan
- **Biography Page**: Halaman biografi lengkap dengan pendidikan dan pengalaman
- **Archive**: Template untuk kategori dan tag
- **Archive Publikasi**: Template khusus untuk listing publikasi
- **Single Post**: Template artikel blog dengan metadata lengkap
- **Search**: Template hasil pencarian

### Typography & Styling
- **Google Fonts**: 
  - Crimson Pro (serif, untuk heading)
  - Sora (sans-serif, untuk body text)
  - JetBrains Mono (monospace, untuk code)
- **Custom CSS**: Style lengkap dengan color scheme warm & minimalis
- **Icon Support**: Emoji icons untuk navigasi dan section headers

### SEO & Performance
- **SEO Optimized**: 
  - Meta description otomatis
  - Canonical URLs
  - Schema.org markup (Article, Breadcrumb)
  - Robots meta tags
  - Hreflang tags
  - Open Graph support
- **Sitemap Ready**: Custom post types terintegrasi dengan WordPress sitemap
- **Fast Loading**: Minimal dependencies, optimized CSS
- **Semantic HTML**: HTML5 semantic tags untuk struktur yang baik

### Fitur Tambahan
- **Custom Logo Support**: Upload logo di Customizer
- **Featured Images**: Thumbnail support untuk semua post types
- **Excerpt Control**: Auto-generated excerpt dengan custom length
- **Navigation Menu**: Primary menu dengan fallback default
- **HTML5 Ready**: Modern HTML5 form dan gallery support

## 🚀 Instalasi

### Persyaratan
- WordPress 5.0 atau lebih baru
- PHP 7.4 atau lebih baru
- MySQL 5.6 atau lebih baru

### Langkah Instalasi

1. **Upload Tema**
   ```bash
   # Via FTP atau File Manager
   Upload folder tema ke: /wp-content/themes/portofolio_minimalis
   ```

2. **Aktivasi Tema**
   - Login ke WordPress Dashboard
   - Navigasi ke **Appearance** → **Themes**
   - Cari tema "Portofolio Minimalis"
   - Klik tombol **Activate**

3. **Konfigurasi Awal**
   - Pergi ke **Settings** → **Permalinks**
   - Pilih struktur permalink (disarankan: Post name)
   - Klik **Save Changes** untuk refresh rewrite rules

4. **Setup Halaman Depan**
   - Buat halaman baru dengan template "Halaman Depan"
   - Pergi ke **Settings** → **Reading**
   - Pilih **A static page**
   - Set halaman depan yang baru dibuat sebagai **Homepage**

5. **Buat Halaman Biografi**
   - Buat halaman baru dengan title "Biografi"
   - Pilih template **Halaman Biografi**
   - Isi konten dengan informasi biografi Anda
   - Publish halaman

6. **Tambahkan ke Menu**
   - Pergi ke **Appearance** → **Menus**
   - Buat menu baru atau gunakan menu existing
   - Tambahkan halaman-halaman yang dibuat
   - Assign menu ke lokasi "Menu Utama"

## 📝 Manajemen Konten

### Setup Halaman Blog

Untuk menampilkan halaman blog dengan listing postingan:

#### Langkah 1: Buat Halaman Blog
1. Login ke WordPress Dashboard
2. Klik **Pages** → **Add New**
3. Ketik judul: **Blog**
4. Jangan isi konten (biarkan kosong)
5. Klik **Publish**

#### Langkah 2: Konfigurasi Reading Settings  
1. Pergi ke **Settings** → **Reading**
2. Di bagian **Your homepage displays**, pilih **A static page**
3. **Homepage**: Pilih halaman front page
4. **Posts page**: Pilih halaman **Blog**
5. Klik **Save Changes**

#### Langkah 3: Tambahkan ke Menu
1. Pergi ke **Appearance** → **Menus**
2. Buka section **Pages** di panel kiri
3. Centang halaman **Blog**
4. Klik **Add to Menu**
5. Di field **Navigation Label**, tambahkan emoji: `📝 Blog`
6. Atur posisi sesuai keinginan
7. Klik **Save Menu**

### Mengelola Publikasi

1. **Tambah Publikasi Baru**
   - Dashboard → **Publikasi** → **Tambah Publikasi**
   - Isi judul publikasi
   - Isi konten/abstrak di editor
   - Scroll ke bawah untuk mengisi meta fields:
     - **Tahun**: Tahun publikasi (contoh: 2024)
     - **Jurnal**: Nama jurnal/conference
     - **Penulis**: Daftar penulis (pisahkan dengan koma)
     - **URL**: Link ke publikasi lengkap
   - Upload featured image jika ada
   - Klik **Publish**

2. **Akses Archive Publikasi**
   - URL: `https://your-site.com/penelitian`
   - Menampilkan semua publikasi terurut berdasarkan tahun

### Mengelola Portofolio

1. **Tambah Portofolio Baru**
   - Dashboard → **Portofolio** → **Tambah Portofolio**
   - Isi judul proyek
   - Isi deskripsi proyek di editor
   - Fill meta fields:
     - **Kategori**: Jenis project (contoh: Web Development)
     - **URL**: Link ke project/demo
     - **Teknologi**: Tools/framework yang digunakan
   - Upload featured image (screenshot/logo)
   - Klik **Publish**

2. **Akses Archive Portofolio**
   - URL: `https://your-site.com/portofolio`
   - Menampilkan grid portofolio dengan thumbnail

### Menulis Post Blog

1. **Buat Post Baru**
   - Dashboard → **Posts** → **Add New**
   - Isi judul dan konten
   - Pilih kategori dan tag
   - Upload featured image untuk thumbnail
   - Set excerpt (ringkasan) untuk preview
   - Klik **Publish**

2. **Categories & Tags**
   - Manage di **Posts** → **Categories/Tags**
   - Post akan muncul di archive sesuai kategori/tag

3. **Template yang Digunakan**
   - Index: `index.php` (listing posts)
   - Single post: `single.php` (artikel lengkap)
   - Archive: `archive.php` (kategori/tag)
   - Search: `search.php` (hasil pencarian)

## 📁 Struktur File

```
portofolio_minimalis/
├── style.css                # Stylesheet utama dengan CSS tema & metadata
├── functions.php            # Fungsi tema, custom post types, SEO hooks
├── header.php               # Header template (HTML head, navigation)
├── footer.php               # Footer template & closing tags
├── index.php                # Template fallback utama (blog listing)
├── front-page.php           # Template halaman depan
├── front-page.php.backup    # Backup halaman depan
├── single.php               # Template single post (artikel lengkap)
├── archive.php              # Template arsip (kategori, tag, date)
├── archive-publikasi.php    # Template arsip publikasi khusus
├── page-biography.php       # Template halaman biografi
├── search.php               # Template hasil pencarian
└── README.md                # Dokumentasi tema (file ini)
```

### File Descriptions

| File | Fungsi |
|------|--------|
| `style.css` | Stylesheet utama dengan metadata tema dan seluruh CSS styling |
| `functions.php` | Core functionality: theme setup, custom post types, meta boxes, SEO |
| `header.php` | HTML head, meta tags, navigation sidebar, opening layout wrapper |
| `footer.php` | Closing layout wrapper, mobile navigation, scripts |
| `index.php` | Default template untuk blog listing dan fallback |
| `front-page.php` | Homepage dengan foto profil dan about section |
| `single.php` | Template untuk single blog post dengan metadata |
| `archive.php` | Template untuk kategori, tag, dan date archives |
| `archive-publikasi.php` | Khusus untuk listing publikasi penelitian |
| `page-biography.php` | Template biografi dengan pendidikan & pengalaman |
| `search.php` | Template hasil pencarian dengan highlighting |

## 🎨 Kustomisasi

### Mengubah Warna

Edit [style.css](style.css) untuk mengubah color scheme:

```css
/* Base colors */
body {
  background-color: #f8f6f1;  /* Warm beige background */
  color: #1a1a1a;             /* Dark text */
}

/* Accent colors */
.nav-link.active {
  background-color: #d4cfc6;  /* Active menu background */
  color: #1a1a1a;             /* Active menu text */
}

/* Border colors */
.sidebar {
  border-right: 1px solid #d4cfc6;  /* Sidebar border */
}
```

### Mengubah Typography

Font sudah di-load dari Google Fonts via [style.css](style.css):

```css
/* Heading font - Serif */
font-family: 'Crimson Pro', serif;

/* Body font - Sans Serif */
font-family: 'Sora', sans-serif;

/* Code/mono font */
font-family: 'JetBrains Mono', monospace;
```

Untuk mengganti font, edit import di bagian atas [style.css](style.css):

```css
@import url('https://fonts.googleapis.com/css2?family=YOUR-FONT&display=swap');
```

### Menambah Custom Fields

Edit [functions.php](functions.php), tambahkan meta box baru:

```php
function your_custom_meta_box() {
    add_meta_box(
        'your_meta_box_id',
        'Your Meta Box Title',
        'your_meta_box_callback',
        'post', // atau 'publikasi', 'portofolio'
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'your_custom_meta_box' );
```

### Mengubah Layout

Layout menggunakan CSS Grid. Edit [style.css](style.css):

```css
.layout-wrapper {
  grid-template-columns: 240px 1fr;  /* Sidebar width : Content */
}
```

Untuk sidebar lebih lebar, ganti `240px` dengan nilai yang diinginkan.

### Custom Logo

1. Dashboard → **Appearance** → **Customize**
2. Klik **Site Identity**
3. Klik **Select Logo**
4. Upload gambar logo (recommended: 40x40px atau proporsional)
5. Klik **Publish**

Logo akan muncul di sidebar navigation.

## ⚙️ Konfigurasi Lanjutan

### SEO Settings

Tema sudah built-in dengan SEO features. Untuk customize:

#### Meta Description
Edit [functions.php](functions.php), function `portofolio_min_document_title_parts()`:

```php
function portofolio_min_document_title_parts( $title ) {
    if ( is_home() || is_front_page() ) {
        $title['title'] = 'Your Custom Title';
        $title['tagline'] = 'Your Custom Tagline';
    }
    return $title;
}
```

#### Schema.org Markup
Edit [functions.php](functions.php), function `portofolio_min_article_schema()` untuk customize Article schema atau `portofolio_min_breadcrumb_schema()` untuk breadcrumb.

### Custom Post Type Options

Untuk mengubah slug URL custom post types, edit [functions.php](functions.php):

```php
// Publikasi
'rewrite' => array( 'slug' => 'penelitian' ),  // Ganti 'penelitian'

// Portofolio  
'rewrite' => array( 'slug' => 'portofolio' ),  // Ganti 'portofolio'
```

**Jangan lupa:** Flush rewrite rules dengan pergi ke **Settings** → **Permalinks** dan klik **Save Changes**.

### Excerpt Length

Default excerpt length adalah 30 kata. Untuk mengubah, edit [functions.php](functions.php):

```php
function portofolio_min_excerpt_length( $length ) {
    return 30;  // Ganti dengan angka yang diinginkan
}
```

### Mobile Breakpoint

Responsive breakpoint di [style.css](style.css):

```css
@media (max-width: 768px) {
    /* Mobile styles */
}
```

Ganti `768px` sesuai kebutuhan.

## 🔧 Troubleshooting

### Halaman 404 Not Found
**Penyebab:** Rewrite rules belum di-refresh  
**Solusi:** 
1. Dashboard → **Settings** → **Permalinks**
2. Klik **Save Changes** (tanpa mengubah apapun)
3. Refresh halaman website

### Menu Tidak Muncul
**Penyebab:** Menu belum di-assign ke lokasi tema  
**Solusi:**
1. Dashboard → **Appearance** → **Menus**
2. Pilih menu yang ingin digunakan
3. Scroll ke bawah, centang **Menu Utama** di "Display location"
4. Klik **Save Menu**

### Sidebar Tidak Sticky
**Penyebab:** Browser tidak support `position: sticky` atau conflict CSS  
**Solusi:**
1. Pastikan menggunakan browser modern (Chrome, Firefox, Safari, Edge)
2. Check [style.css](style.css), pastikan `.sidebar` memiliki:
   ```css
   position: sticky;
   top: 0;
   ```

### Publikasi Tidak Tampil
**Penyebab:** Post status bukan "Published" atau permalink belum di-flush  
**Solusi:**
1. Check status publikasi di Dashboard → **Publikasi**
2. Pastikan status "Published" (bukan "Draft")
3. Flush permalinks: **Settings** → **Permalinks** → **Save Changes**
4. Akses: `https://your-site.com/penelitian`

### Featured Image Tidak Muncul
**Penyebab:** Theme support belum aktif  
**Solusi:** Check [functions.php](functions.php), pastikan ada:
```php
add_theme_support( 'post-thumbnails' );
```

### Mobile Navigation Tidak Terlihat
**Penyebab:** Browser cache atau CSS conflict  
**Solusi:**
1. Hard refresh: **Cmd+Shift+R** (Mac) atau **Ctrl+Shift+R** (Windows)
2. Clear browser cache
3. Check [style.css](style.css), pastikan ada `.bottom-nav` dengan `@media (max-width: 768px)`

### Typography Tidak Load
**Penyebab:** Google Fonts gagal di-load  
**Solusi:**
1. Check koneksi internet
2. Check [style.css](style.css), pastikan `@import` Google Fonts di atas
3. Alternative: Download font dan host locally

## 🛠️ Development

### Requirements
- PHP 7.4+
- WordPress 5.0+
- Node.js & npm (jika ingin customize)

### Best Practices
- **Backup:** Selalu backup sebelum edit kode
- **Child Theme:** Pertimbangkan membuat child theme untuk customization besar
- **Testing:** Test di staging environment sebelum production
- **Browser:** Test di Chrome, Firefox, Safari, dan mobile devices

### Hooks Available

Tema ini menyediakan beberapa hooks untuk developer:

```php
// Modify excerpt length
add_filter( 'excerpt_length', 'your_custom_excerpt_length' );

// Modify excerpt more text  
add_filter( 'excerpt_more', 'your_custom_excerpt_more' );

// Add custom meta boxes
add_action( 'add_meta_boxes', 'your_custom_meta_boxes' );

// Modify document title
add_filter( 'document_title_parts', 'your_custom_title_parts' );
```

## 📄 License & Credits

### License
Tema ini dilisensikan di bawah **GNU General Public License v2 or later**.  
License URI: http://www.gnu.org/licenses/gpl-2.0.html

### Credits
- **Author:** Arif Setiawan
- **Author URI:** https://arif.setiawan.web.id
- **Theme URI:** https://arif.setiawan.web.id
- **Version:** 1.0
- **Text Domain:** portofolio-min

### Resources
- **Google Fonts:**
  - Crimson Pro: https://fonts.google.com/specimen/Crimson+Pro (OFL)
  - Sora: https://fonts.google.com/specimen/Sora (OFL)
  - JetBrains Mono: https://fonts.google.com/specimen/JetBrains+Mono (OFL)
- **Icons:** Emoji icons (Unicode, no license required)

## 🤝 Support

### Documentation
Full documentation tersedia di file README.md ini.

### Issues & Bugs
Jika menemukan bug atau punya pertanyaan, silakan contact melalui:
- Email: arif@setiawan.web.id (sesuaikan dengan email author)
- Website: https://arif.setiawan.web.id

### Changelog

#### Version 1.0 (Current)
- Initial release
- Custom post types: Publikasi & Portofolio
- Responsive sidebar layout
- SEO optimization (meta tags, schema, canonical)
- Mobile navigation
- Front page & biography templates
- Archive templates
- Search template

## 🚀 Future Updates

Planned features untuk versi mendatang:
- [ ] Widget area untuk sidebar
- [ ] Theme Customizer options
- [ ] Dark mode toggle
- [ ] More color schemes
- [ ] Gallery post format
- [ ] Comments styling enhancement
- [ ] Related posts section
- [ ] Social media integration
- [ ] Breadcrumb navigation
- [ ] Print stylesheet

---

**Portofolio Minimalis** v1.0 | Developed with ❤️ by [Arif Setiawan](https://arif.setiawan.web.id)
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

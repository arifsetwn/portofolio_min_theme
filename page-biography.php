<?php
/**
 * Template Name: Halaman Biografi
 * Description: Template untuk halaman biografi
 */

get_header(); ?>

<p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">PROFIL</p>
<h1 class="page-title">Biografi</h1>
<p class="page-subtitle">Arif Setiawan · Pendidikan Teknik Informatika, UMS</p>

<hr class="divider">

<!-- Tentang -->
<section id="tentang-saya">
  <h2><span class="section-emoji">👨‍🏫</span>Tentang Saya</h2>
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      the_content();
    endwhile;
  else :
  ?>
  <p>Halo, nama saya <strong>Arif Setiawan</strong>. Saya adalah dosen di Program Studi Pendidikan Informatika, Universitas Muhammadiyah Surakarta. Bidang kajian saya meliputi teknologi pendidikan, pengembangan media pembelajaran berbasis digital, serta rekayasa perangkat lunak terapan dalam konteks pendidikan.</p>
  <p>Selain mengajar, saya aktif dalam penelitian yang berfokus pada pemanfaatan teknologi untuk meningkatkan kualitas pembelajaran di perguruan tinggi.</p>
  <?php endif; ?>
</section>

<!-- Pendidikan -->
<section id="pendidikan">
  <h2><span class="section-emoji">🎓</span>Pendidikan</h2>
  <?php
  $education = get_option( 'portofolio_education', array() );
  if ( ! empty( $education ) ) :
    foreach ( $education as $edu ) :
  ?>
  <div class="card">
    <p class="card-meta mono"><?php echo esc_html( $edu['year'] ); ?></p>
    <p class="card-title"><?php echo esc_html( $edu['degree'] ); ?></p>
    <p style="font-size:0.85rem;color:#6b6b6b;margin:0;"><?php echo esc_html( $edu['institution'] ); ?></p>
  </div>
  <?php
    endforeach;
  else :
  ?>
  <div class="card">
    <p class="card-meta mono">S2</p>
    <p class="card-title">Magister Teknologi Informasi</p>
    <p style="font-size:0.85rem;color:#6b6b6b;margin:0;">Universitas Gadjah Mada</p>
  </div>
  <div class="card">
    <p class="card-meta mono">S1</p>
    <p class="card-title">Sarjana Teknik Informatika</p>
    <p style="font-size:0.85rem;color:#6b6b6b;margin:0;">UIN Sunan Kalijaga</p>
  </div>
  <?php endif; ?>
</section>


<!-- Kontak -->
<section id="kontak">
  <h2><span class="section-emoji">✉️</span>Kontak</h2>
  <div class="callout">
    <strong class="mono" style="font-size:0.8rem;">EMAIL</strong><br>
    <a href="mailto:arif.setiawan@ums.ac.id">arif.setiawan@ums.ac.id</a>
  </div>
  <p style="font-size:0.85rem;color:#6b6b6b;">Pendidikan Teknik Informatika<br>Universitas Muhammadiyah Surakarta</p>
</section>

<script>
  // Highlight active TOC link on scroll
  const sections = document.querySelectorAll('section[id]');
  const tocLinks = document.querySelectorAll('.toc-link');
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 100) current = s.getAttribute('id');
    });
    tocLinks.forEach(l => {
      l.classList.toggle('active', l.getAttribute('href') === '#' + current);
    });
  });
</script>

<?php get_footer(); ?>

<?php
/**
 * Archive Template
 * Template untuk menampilkan daftar publikasi/penelitian
 */

get_header(); ?>

<p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">AKADEMIK</p>
<h1 class="page-title">Penelitian & Publikasi</h1>
<p class="page-subtitle">Daftar karya ilmiah dan topik penelitian</p>

<hr class="divider">

<!-- Filter bar -->
<div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-bottom:1.5rem;">
  <span class="mono" style="font-size:0.75rem;color:#6b6b6b;align-self:center;">Filter:</span>
  <?php
  // Generate nonce for CSRF protection
  $filter_nonce = wp_create_nonce( 'filter_year' );
  ?>
  <a href="<?php echo esc_url( add_query_arg( '_wpnonce', $filter_nonce, remove_query_arg( array( 'year', '_wpnonce' ) ) ) ); ?>" style="font-size:0.78rem;padding:0.2rem 0.6rem;border:1px solid <?php echo ! isset( $_GET['year'] ) ? '#1a1a1a' : '#d4cfc6'; ?>;text-decoration:none;color:<?php echo ! isset( $_GET['year'] ) ? '#1a1a1a' : '#6b6b6b'; ?>;">Semua</a>
  <?php
  // Get available years
  $years = array( '2024', '2023', '2022', '2021', '2020' );
  foreach ( $years as $year ) :
    $is_active = isset( $_GET['year'] ) && $_GET['year'] == $year;
  ?>
  <a href="<?php echo esc_url( add_query_arg( array( 'year' => $year, '_wpnonce' => $filter_nonce ) ) ); ?>" style="font-size:0.78rem;padding:0.2rem 0.6rem;border:1px solid <?php echo $is_active ? '#1a1a1a' : '#d4cfc6'; ?>;text-decoration:none;color:<?php echo $is_active ? '#1a1a1a' : '#6b6b6b'; ?>;"><?php echo esc_html( $year ); ?></a>
  <?php endforeach; ?>
</div>

<section id="publikasi">
  <h2><span class="section-emoji">📄</span>Publikasi</h2>

  <?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  
  $args = array(
    'post_type' => 'publikasi',
    'posts_per_page' => 20,  // Limit to 20 posts per page (DoS protection)
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
  );
  
  if ( isset( $_GET['year'] ) ) {
    // Verify nonce for CSRF protection
    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'filter_year' ) ) {
      wp_die( 'Security check failed. Please try again.' );
    }
    
    $year = sanitize_text_field( $_GET['year'] );
    // Validate year format: must be 4 digits between 1900-2100 (SQL injection protection)
    if ( preg_match( '/^\d{4}$/', $year ) && (int)$year >= 1900 && (int)$year <= 2100 ) {
      $args['meta_query'] = array(
        array(
          'key'     => 'year',
          'value'   => (int)$year,
          'compare' => '=',
          'type'    => 'NUMERIC',
        ),
      );
    }
  }
  
  $publications = new WP_Query( $args );
  
  if ( $publications->have_posts() ) :
    while ( $publications->have_posts() ) : $publications->the_post();
    $year = get_post_meta( get_the_ID(), 'year', true );
    $journal = get_post_meta( get_the_ID(), 'journal', true );
    $authors = get_post_meta( get_the_ID(), 'authors', true );
    $pub_url = get_post_meta( get_the_ID(), 'url', true );
    $doi = get_post_meta( get_the_ID(), 'doi', true );
    $abstract = get_post_meta( get_the_ID(), 'abstract', true );
    $keywords = get_post_meta( get_the_ID(), 'keywords', true );
  ?>
  <div class="card">
    <p class="card-meta">
      <span class="mono"><?php echo esc_html( $year ); ?></span>
      <?php if ( $journal ) : ?> · <span class="italic-serif"><?php echo esc_html( $journal ); ?></span><?php endif; ?>
      <?php if ( $doi ) : ?> · <a href="https://doi.org/<?php echo esc_attr( $doi ); ?>" target="_blank" style="font-size:0.7rem;">DOI</a><?php endif; ?>
    </p>
    <p class="card-title">
      <?php if ( $pub_url ) : ?><a href="<?php echo esc_url( $pub_url ); ?>" target="_blank" style="color:#1a1a1a;text-decoration:none;"><?php the_title(); ?></a><?php else : ?><?php the_title(); ?><?php endif; ?>
    </p>
    <p style="font-size:0.82rem;color:#6b6b6b;margin:0.2rem 0 0.5rem;"><?php echo esc_html( $authors ); ?></p>
    <?php if ( $abstract ) : ?>
    <details style="font-size:0.82rem;margin-top:0.5rem;">
      <summary style="cursor:pointer;color:#6b6b6b;font-size:0.78rem;" class="mono">ABSTRAK</summary>
      <p style="margin-top:0.5rem;color:#1a1a1a;"><?php echo esc_html( $abstract ); ?></p>
    </details>
    <?php endif; ?>
    <?php if ( $keywords ) : 
      $keyword_array = explode( ' ', $keywords );
      echo '<div style="margin-top:0.5rem;">';
      foreach ( $keyword_array as $kw ) :
    ?>
    <span class="tag"><?php echo esc_html( $kw ); ?></span>
    <?php 
      endforeach;
      echo '</div>';
    endif; ?>
  </div>
  <?php
    endwhile;
    
    // Add pagination
    if ( $publications->max_num_pages > 1 ) : ?>
    <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid #d4cfc6;display:flex;justify-content:space-between;align-items:center;">
      <div>
        <?php if ( $paged > 1 ) : ?>
          <a href="<?php echo esc_url( get_pagenum_link( $paged - 1 ) ); ?>" style="font-size:0.88rem;color:#1a5276;text-decoration:none;border-bottom:1px solid #1a5276;">← Sebelumnya</a>
        <?php endif; ?>
      </div>
      <div class="mono" style="font-size:0.75rem;color:#6b6b6b;">
        Halaman <?php echo $paged; ?> dari <?php echo $publications->max_num_pages; ?>
      </div>
      <div>
        <?php if ( $paged < $publications->max_num_pages ) : ?>
          <a href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>" style="font-size:0.88rem;color:#1a5276;text-decoration:none;border-bottom:1px solid #1a5276;">Selanjutnya →</a>
        <?php endif; ?>
      </div>
    </div>
    <?php endif;
    
    wp_reset_postdata();
  else :
  ?>
  <!-- Placeholder cards -->
  <div class="card">
    <p class="card-meta"><span class="mono">2024</span> · <span class="italic-serif">Jurnal Teknodik</span></p>
    <p class="card-title">Pengembangan Media Pembelajaran Interaktif Berbasis Web pada Mata Kuliah Pemrograman Web</p>
    <p style="font-size:0.82rem;color:#6b6b6b;margin:0.2rem 0 0.5rem;">Arif Setiawan, Budi Santoso, Citra Dewi</p>
    <span class="tag">media pembelajaran</span><span class="tag">web</span><span class="tag">pemrograman</span>
  </div>
  <div class="card">
    <p class="card-meta"><span class="mono">2023</span> · <span class="italic-serif">Jurnal Pendidikan Vokasi</span></p>
    <p class="card-title">Efektivitas Metode Project-Based Learning dalam Meningkatkan Kompetensi Mahasiswa Informatika</p>
    <p style="font-size:0.82rem;color:#6b6b6b;margin:0.2rem 0 0.5rem;">Arif Setiawan, Eko Prasetyo</p>
    <span class="tag">PBL</span><span class="tag">kompetensi</span><span class="tag">informatika</span>
  </div>
  <div class="card">
    <p class="card-meta"><span class="mono">2022</span> · <span class="italic-serif">SEMNASTEKNOMEDIA</span></p>
    <p class="card-title">Implementasi Gamifikasi dalam Sistem E-Learning untuk Meningkatkan Motivasi Belajar Mahasiswa</p>
    <p style="font-size:0.82rem;color:#6b6b6b;margin:0.2rem 0 0.5rem;">Arif Setiawan</p>
    <span class="tag">gamifikasi</span><span class="tag">e-learning</span><span class="tag">motivasi</span>
  </div>
  <?php endif; ?>
</section>

<!-- Minat Penelitian -->
<section id="minat">
  <h2><span class="section-emoji">🔬</span>Minat Penelitian</h2>
  <p>Topik-topik yang menjadi fokus penelitian saya saat ini:</p>
  <div style="display:flex;flex-wrap:wrap;gap:0.5rem;margin-top:0.75rem;">
    <?php
    // Get all keywords from publications dynamically
    $all_keywords = array();
    $keyword_counts = array();
    
    $keyword_query = new WP_Query( array(
      'post_type' => 'publikasi',
      'posts_per_page' => -1,
      'fields' => 'ids',
    ) );
    
    if ( $keyword_query->have_posts() ) :
      foreach ( $keyword_query->posts as $pub_id ) :
        $keywords = get_post_meta( $pub_id, 'keywords', true );
        if ( ! empty( $keywords ) ) :
          // Split by space or comma
          $keyword_array = preg_split( '/[\s,]+/', $keywords, -1, PREG_SPLIT_NO_EMPTY );
          foreach ( $keyword_array as $keyword ) :
            $keyword = trim( $keyword );
            if ( ! empty( $keyword ) ) :
              // Count frequency
              if ( isset( $keyword_counts[ $keyword ] ) ) {
                $keyword_counts[ $keyword ]++;
              } else {
                $keyword_counts[ $keyword ] = 1;
              }
            endif;
          endforeach;
        endif;
      endforeach;
      wp_reset_postdata();
      
      // Sort by frequency (descending)
      arsort( $keyword_counts );
      
      // Display keywords with frequency-based styling
      if ( ! empty( $keyword_counts ) ) :
        $max_count = max( $keyword_counts );
        foreach ( $keyword_counts as $keyword => $count ) :
          // Primary (frequent) vs secondary (less frequent) styling
          if ( $count >= $max_count * 0.5 ) :
            // Primary keyword (appears often)
            echo '<span style="border:1px solid #1a1a1a;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;">' . esc_html( $keyword ) . '</span>';
          else :
            // Secondary keyword (appears less)
            echo '<span style="border:1px solid #d4cfc6;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;color:#6b6b6b;">' . esc_html( $keyword ) . '</span>';
          endif;
        endforeach;
      else :
        // Fallback if no publications with keywords yet
        echo '<span style="border:1px solid #d4cfc6;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;color:#6b6b6b;">Belum ada keywords yang ditambahkan</span>';
      endif;
    else :
      // Fallback default
      ?>
      <span style="border:1px solid #1a1a1a;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;">Teknologi Pendidikan</span>
      <span style="border:1px solid #1a1a1a;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;">Media Pembelajaran Digital</span>
      <span style="border:1px solid #1a1a1a;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;">E-Learning & LMS</span>
      <span style="border:1px solid #1a1a1a;padding:0.35rem 0.85rem;font-size:0.82rem;border-radius:2px;">Rekayasa Perangkat Lunak</span>
      <?php
    endif;
    ?>
  </div>
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

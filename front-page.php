<?php
/**
 * Template Name: Halaman Depan
 * Description: Template untuk halaman depan portofolio
 */

get_header(); ?>

<!-- Profile Photo -->
<div style="text-align:center;margin-bottom:3rem;">
  <div style="width:200px;height:200px;margin:0 auto 1.5rem;border-radius:50%;overflow:hidden;border:3px solid #d4cfc6;background:#fff;">
    <?php
    $profile_image = get_option( 'portofolio_profile_image' );
    $default_image = 'https://arif.setiawan.web.id/wp-content/themes/portofolio/assets/profile.jpeg';
    
    if ( ! $profile_image ) {
      $profile_image = $default_image;
    }
    
    // Validate URL format
    if ( ! filter_var( $profile_image, FILTER_VALIDATE_URL ) ) {
      $profile_image = $default_image;
    }
    
    // Whitelist allowed domains for security
    $parsed_url = parse_url( $profile_image );
    $allowed_hosts = array(
      'arif.setiawan.web.id',
      parse_url( home_url(), PHP_URL_HOST )
    );
    
    if ( ! isset( $parsed_url['host'] ) || ! in_array( $parsed_url['host'], $allowed_hosts ) ) {
      $profile_image = $default_image;
    }
    ?>
    <img src="<?php echo esc_url( $profile_image ); ?>" alt="Arif Setiawan" style="width:100%;height:100%;object-fit:cover;">
  </div>
</div>

<!-- About Me -->
<section id="about-me" style="margin-bottom:3rem;">
  <h2 style="font-family:'Sora',sans-serif;font-size:1.3rem;font-weight:600;margin:0 0 1rem;border:none;padding:0;">
    <span style="margin-right:0.5rem;">👨‍🏫</span>About Arif Setiawan
  </h2>
  
  <?php
  $about_content = get_option( 'portofolio_about_content' );
  if ( $about_content ) :
    echo wp_kses_post( $about_content );
  else :
  ?>
  <p style="line-height:1.8;margin-bottom:1rem;">
    Halo, nama saya <strong>Arif Setiawan</strong>. Saya adalah Dosen di Program Studi Pendidikan Teknik Informatika di 
    <a href="https://www.ums.ac.id" target="_blank" style="color:#1a5276;text-decoration:none;border-bottom:1px solid #1a5276;">Universitas Muhammadiyah Surakarta</a>. 
    Minat penelitian saya meliputi teknologi pendidikan, pengembangan media pembelajaran, rekayasa perangkat lunak, dan kecerdasan buatan dalam pendidikan.
  </p>
  
  <p style="line-height:1.8;margin-bottom:1rem;">
    Perjalanan akademik saya dimulai dari gelar sarjana di Teknik Informatika UIN Sunan Kalijaga dan magister di bidang Teknologi Informasi Universitas Gadjah Mada. Saat ini, saya aktif mengajar dan melakukan penelitian tentang pemanfaatan teknologi untuk meningkatkan kualitas pembelajaran di perguruan tinggi.
  </p>
  
  <p style="line-height:1.8;margin-bottom:1rem;">
    Saya juga aktif sebagai peneliti dan tertarik pada pengembangan sistem e-learning, gamifikasi dalam pendidikan, dan aplikasi machine learning untuk analisis pembelajaran.
  </p>
  <?php endif; ?>

</section>

<hr class="divider">

<!-- Academic Profiles -->
<section id="academic-profiles" style="margin-bottom:3rem;">
  <h2 style="font-family:'Sora',sans-serif;font-size:1.3rem;font-weight:600;margin:0 0 1rem;border:none;padding:0;">
    <span style="margin-right:0.5rem;">🔗</span>Academic Profiles
  </h2>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1rem;">
    <!-- SINTA -->
    <a href="https://sinta.kemdiktisaintek.go.id/authors/profile/6680490" target="_blank" rel="noopener noreferrer" style="text-decoration:none;border:1px solid #d4cfc6;padding:1rem;border-radius:4px;background:#fff;transition:all 0.2s;display:block;">
      <div style="display:flex;align-items:center;gap:0.75rem;">
        <div style="font-size:1.5rem;">🇮🇩</div>
        <div>
          <div style="font-weight:600;color:#1a1a1a;font-size:0.9rem;margin-bottom:0.25rem;">SINTA</div>
          <div style="font-size:0.75rem;color:#6b6b6b;">Science & Technology Index</div>
        </div>
      </div>
    </a>
    
    <!-- Scopus -->
    <a href="https://www.scopus.com/authid/detail.uri?authorId=58390404800" target="_blank" rel="noopener noreferrer" style="text-decoration:none;border:1px solid #d4cfc6;padding:1rem;border-radius:4px;background:#fff;transition:all 0.2s;display:block;">
      <div style="display:flex;align-items:center;gap:0.75rem;">
        <div style="font-size:1.5rem;">📊</div>
        <div>
          <div style="font-weight:600;color:#1a1a1a;font-size:0.9rem;margin-bottom:0.25rem;">Scopus</div>
          <div style="font-size:0.75rem;color:#6b6b6b;">Author Profile</div>
        </div>
      </div>
    </a>
    
    <!-- Google Scholar -->
    <a href="https://scholar.google.com/citations?user=l1JmHE8AAAAJ&hl=id&authuser=1" target="_blank" rel="noopener noreferrer" style="text-decoration:none;border:1px solid #d4cfc6;padding:1rem;border-radius:4px;background:#fff;transition:all 0.2s;display:block;">
      <div style="display:flex;align-items:center;gap:0.75rem;">
        <div style="font-size:1.5rem;">🎓</div>
        <div>
          <div style="font-weight:600;color:#1a1a1a;font-size:0.9rem;margin-bottom:0.25rem;">Google Scholar</div>
          <div style="font-size:0.75rem;color:#6b6b6b;">Citations & Publications</div>
        </div>
      </div>
    </a>
    
    <!-- UMS Profile -->
    <a href="https://www.ums.ac.id/en/profile/arif-setiawan" target="_blank" rel="noopener noreferrer" style="text-decoration:none;border:1px solid #d4cfc6;padding:1rem;border-radius:4px;background:#fff;transition:all 0.2s;display:block;">
      <div style="display:flex;align-items:center;gap:0.75rem;">
        <div style="font-size:1.5rem;">🏛️</div>
        <div>
          <div style="font-weight:600;color:#1a1a1a;font-size:0.9rem;margin-bottom:0.25rem;">UMS Profile</div>
          <div style="font-size:0.75rem;color:#6b6b6b;">Universitas Muhammadiyah Surakarta</div>
        </div>
      </div>
    </a>
  </div>
</section>

<hr class="divider">


<?php get_footer(); ?>

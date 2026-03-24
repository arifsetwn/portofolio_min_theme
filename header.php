<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- SEO Meta Tags -->
  <meta name="description" content="<?php 
    if ( is_single() || is_page() ) {
      echo esc_attr( wp_strip_all_tags( get_the_excerpt() ?: wp_trim_words( get_the_content(), 25, '...' ) ) );
    } elseif ( is_home() || is_front_page() ) {
      echo esc_attr( get_bloginfo( 'description' ) ?: 'Portofolio akademik Arif Setiawan - Dosen Pendidikan Informatika UMS. Publikasi penelitian, media pembelajaran, dan teknologi pendidikan.' );
    } elseif ( is_archive() ) {
      the_archive_description();
    } else {
      echo esc_attr( get_bloginfo( 'description' ) );
    }
  ?>" />
  
  <!-- Canonical URL -->
  <?php 
  // Get current URL safely (XSS protection)
  if ( is_singular() ) {
    $current_url = get_permalink();
  } else {
    global $wp;
    $current_url = home_url( add_query_arg( array(), $wp->request ) );
  }
  ?>
  <link rel="canonical" href="<?php echo esc_url( $current_url ); ?>" />
  
  <!-- Open Graph Meta Tags -->
  <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>" />
  <meta property="og:title" content="<?php 
    if ( is_single() || is_page() ) {
      the_title();
    } else {
      bloginfo( 'name' );
    }
  ?>" />
  <meta property="og:description" content="<?php 
    if ( is_single() || is_page() ) {
      echo esc_attr( wp_strip_all_tags( get_the_excerpt() ?: wp_trim_words( get_the_content(), 25 ) ) );
    } else {
      echo esc_attr( get_bloginfo( 'description' ) );
    }
  ?>" />
  <meta property="og:url" content="<?php echo esc_url( $current_url ); ?>" />
  <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
  <?php if ( has_post_thumbnail() && is_single() ) : ?>
  <meta property="og:image" content="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" />
  <?php endif; ?>
  
  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php 
    if ( is_single() || is_page() ) {
      the_title();
    } else {
      bloginfo( 'name' );
    }
  ?>" />
  <meta name="twitter:description" content="<?php 
    if ( is_single() || is_page() ) {
      echo esc_attr( wp_strip_all_tags( get_the_excerpt() ?: wp_trim_words( get_the_content(), 25 ) ) );
    } else {
      echo esc_attr( get_bloginfo( 'description' ) );
    }
  ?>" />
  <?php if ( has_post_thumbnail() && is_single() ) : ?>
  <meta name="twitter:image" content="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" />
  <?php endif; ?>
  
  <!-- Structured Data (Schema.org) -->
  <?php if ( is_single() && get_post_type() === 'publikasi' ) : ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ScholarlyArticle",
    "headline": "<?php echo esc_js( get_the_title() ); ?>",
    "author": {
      "@type": "Person",
      "name": "<?php echo esc_js( get_post_meta( get_the_ID(), 'authors', true ) ?: 'Arif Setiawan' ); ?>"
    },
    "datePublished": "<?php echo esc_js( get_post_meta( get_the_ID(), 'year', true ) ); ?>",
    <?php $doi = get_post_meta( get_the_ID(), 'doi', true ); if ( $doi ) : ?>
    "identifier": "https://doi.org/<?php echo esc_js( $doi ); ?>",
    <?php endif; ?>
    "publisher": {
      "@type": "Organization",
      "name": "<?php echo esc_js( get_post_meta( get_the_ID(), 'journal', true ) ); ?>"
    }
  }
  </script>
  <?php elseif ( is_front_page() || is_home() ) : ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Arif Setiawan",
    "jobTitle": "Dosen Pendidikan Informatika",
    "affiliation": {
      "@type": "Organization",
      "name": "Universitas Muhammadiyah Surakarta"
    },
    "url": "<?php echo esc_url( home_url() ); ?>",
    "sameAs": [
      "https://scholar.google.com/citations?user=l1JmHE8AAAAJ",
      "https://www.scopus.com/authid/detail.uri?authorId=58390404800",
      "https://sinta.kemdiktisaintek.go.id/authors/profile/6680490",
      "https://www.ums.ac.id/en/profile/arif-setiawan"
    ]
  }
  </script>
  <?php endif; ?>
  
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,300;0,400;0,600;1,300;1,400&family=JetBrains+Mono:wght@400;500&family=Sora:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            serif: ['Crimson Pro', 'Georgia', 'serif'],
            mono:  ['JetBrains Mono', 'monospace'],
            sans:  ['Sora', 'sans-serif'],
          },
          colors: {
            ink:    '#1a1a1a',
            paper:  '#f8f6f1',
            muted:  '#6b6b6b',
            rule:   '#d4cfc6',
            accent: '#c0392b',
            link:   '#1a5276',
          },
        },
      },
    }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="layout-wrapper">

    <!-- ══ SIDEBAR ══ -->
    <aside class="sidebar" id="sidebar">

      <!-- Logo / Brand -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sidebar-logo">
        <div class="sidebar-logo-mark">AS</div>
        <div class="sidebar-logo-text">
          <?php bloginfo( 'name' ); ?>
          <span class="sidebar-logo-sub"><?php echo esc_html( parse_url( home_url(), PHP_URL_HOST ) ); ?></span>
        </div>
      </a>

      <!-- Main Navigation -->
      <nav>
        <p class="nav-section-title">Navigasi</p>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => '',
          'items_wrap' => '<ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:2px;">%3$s</ul>',
          'fallback_cb' => 'portofolio_min_default_menu',
        ) );
        ?>
      </nav>

      <!-- On-page TOC (injected per page) -->
      <?php do_action( 'portofolio_min_sidebar_toc' ); ?>

    </aside>

    <!-- ══ TOP HEADER ══ -->
    <header class="site-header">
      <nav class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        <?php
        if ( ! is_front_page() ) {
          echo ' / ';
          if ( is_single() ) {
            the_title();
          } elseif ( is_page() ) {
            the_title();
          } elseif ( is_archive() ) {
            the_archive_title();
          } elseif ( is_search() ) {
            echo 'Pencarian';
          } else {
            echo 'Halaman';
          }
        }
        ?>
      </nav>

      <!-- Search Form -->
      <div style="margin-top:0.75rem;">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display:flex;gap:0.5rem;">
          <input type="search" class="search-field" placeholder="Cari artikel..." value="<?php echo get_search_query(); ?>" name="s" style="flex:1;padding:0.5rem 0.75rem;border:1px solid #d4cfc6;border-radius:4px;font-size:0.9rem;font-family:'Sora',sans-serif;" />
          <button type="submit" class="search-submit" style="padding:0.5rem 1rem;background:#1a5276;color:#fff;border:none;border-radius:4px;cursor:pointer;font-size:0.9rem;font-family:'Sora',sans-serif;font-weight:500;">Cari</button>
        </form>
      </div>

    </header>

    <!-- ══ MAIN CONTENT ══ -->
    <main>

<?php
/**
 * Search Results Template
 * Template untuk menampilkan hasil pencarian
 */

get_header(); ?>

<p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">PENCARIAN</p>
<h1 class="page-title">Hasil Pencarian</h1>
<p class="page-subtitle">
  Menampilkan hasil untuk: <strong>"<?php echo get_search_query(); ?>"</strong>
  <?php if ( have_posts() ) : ?>
    (<?php echo $wp_query->found_posts; ?> hasil ditemukan)
  <?php endif; ?>
</p>

<hr class="divider">

<!-- Search Form -->
<div style="margin-bottom:2rem;padding:1.5rem;background:#f8f6f1;border:1px solid #d4cfc6;border-radius:4px;">
  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="search-input" class="mono" style="display:block;font-size:0.8rem;color:#6b6b6b;margin-bottom:0.5rem;">Cari Artikel Lain</label>
    <div style="display:flex;gap:0.5rem;">
      <input type="search" id="search-input" class="search-field" placeholder="Masukkan kata kunci..." value="<?php echo get_search_query(); ?>" name="s" style="flex:1;padding:0.5rem 0.75rem;border:1px solid #d4cfc6;border-radius:4px;font-size:0.9rem;font-family:'Sora',sans-serif;" />
      <button type="submit" class="search-submit" style="padding:0.5rem 1.5rem;background:#1a5276;color:#fff;border:none;border-radius:4px;cursor:pointer;font-size:0.9rem;font-family:'Sora',sans-serif;font-weight:500;">Cari</button>
    </div>
  </form>
</div>

<?php if ( have_posts() ) : ?>
    
    <!-- Search Results -->
    <div style="display:flex;flex-direction:column;gap:1rem;">
    <?php while ( have_posts() ) : the_post(); 
      $post_type = get_post_type();
      $post_type_obj = get_post_type_object( $post_type );
      $post_type_name = $post_type_obj ? $post_type_obj->labels->singular_name : 'Post';
    ?>
        <article class="card" style="position:relative;">
            <!-- Post Type Badge -->
            <span class="mono" style="position:absolute;top:1rem;right:1rem;font-size:0.65rem;padding:0.25rem 0.5rem;background:<?php 
              if ( $post_type === 'publikasi' ) {
                echo '#fdf5f4';
              } elseif ( $post_type === 'portofolio' ) {
                echo '#f0f8ff';
              } else {
                echo '#f8f6f1';
              }
            ?>;border:1px solid <?php 
              if ( $post_type === 'publikasi' ) {
                echo '#c0392b';
              } elseif ( $post_type === 'portofolio' ) {
                echo '#1a5276';
              } else {
                echo '#d4cfc6';
              }
            ?>;border-radius:3px;color:#6b6b6b;"><?php echo esc_html( strtoupper( $post_type_name ) ); ?></span>
            
            <p class="card-meta">
                <span class="mono"><?php echo get_the_date( 'Y' ); ?></span>
                <?php if ( $post_type === 'post' ) : ?>
                  · Oleh <?php the_author(); ?>
                  <?php if ( has_category() ) : ?> · <?php the_category( ', ' ); ?><?php endif; ?>
                <?php elseif ( $post_type === 'publikasi' ) : ?>
                  <?php 
                  $authors = get_post_meta( get_the_ID(), 'authors', true );
                  if ( $authors ) : ?>
                    · <?php echo esc_html( $authors ); ?>
                  <?php endif; ?>
                <?php elseif ( $post_type === 'portofolio' ) : ?>
                  <?php 
                  $category = get_post_meta( get_the_ID(), 'category', true );
                  if ( $category ) : ?>
                    · <?php echo esc_html( $category ); ?>
                  <?php endif; ?>
                <?php endif; ?>
            </p>
            
            <h2 class="card-title" style="border:none;padding:0;margin:0 0 0.25rem;">
                <a href="<?php the_permalink(); ?>" style="color:#1a1a1a;text-decoration:none;"><?php the_title(); ?></a>
            </h2>
            
            <?php if ( has_excerpt() ) : ?>
                <p style="font-size:0.82rem;color:#6b6b6b;margin:0.25rem 0 0.5rem;"><?php the_excerpt(); ?></p>
            <?php else : ?>
                <p style="font-size:0.82rem;color:#6b6b6b;margin:0.25rem 0 0.5rem;">
                  <?php echo wp_trim_words( get_the_content(), 25, '...' ); ?>
                </p>
            <?php endif; ?>
            
            <a href="<?php the_permalink(); ?>" style="font-size:0.82rem;color:#1a5276;">
              <?php echo $post_type === 'publikasi' ? 'Lihat publikasi' : ( $post_type === 'portofolio' ? 'Lihat portofolio' : 'Baca selengkapnya' ); ?> →
            </a>
        </article>
    <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <div style="display:flex;justify-content:space-between;margin-top:2rem;padding-top:2rem;border-top:1px solid #d4cfc6;">
        <div>
            <?php previous_posts_link( '← Hasil Sebelumnya' ); ?>
        </div>
        <div class="mono" style="font-size:0.8rem;color:#6b6b6b;align-self:center;">
            Halaman <?php echo max( 1, get_query_var( 'paged' ) ); ?> dari <?php echo $wp_query->max_num_pages; ?>
        </div>
        <div>
            <?php next_posts_link( 'Hasil Selanjutnya →' ); ?>
        </div>
    </div>
    <?php endif; ?>

<?php else : ?>
    
    <!-- No Results -->
    <div class="card" style="background:#fff9e6;border-color:#f39c12;">
        <h2 style="margin:0 0 0.5rem;font-size:1.2rem;">Tidak Ada Hasil Ditemukan</h2>
        <p style="margin:0 0 1rem;color:#6b6b6b;">
          Maaf, tidak ada hasil yang cocok dengan pencarian "<strong><?php echo get_search_query(); ?></strong>".
        </p>
        <p style="margin:0;font-size:0.9rem;"><strong>Saran:</strong></p>
        <ul style="margin:0.5rem 0 0;padding-left:1.5rem;font-size:0.9rem;color:#6b6b6b;">
          <li>Periksa ejaan kata kunci Anda</li>
          <li>Gunakan kata kunci yang lebih umum atau sinonim</li>
          <li>Coba kata kunci yang lebih pendek</li>
          <li>Gunakan form pencarian di atas untuk mencoba lagi</li>
        </ul>
    </div>
    
    <!-- Popular Posts Widget (Optional) -->
    <div style="margin-top:2rem;">
        <h3 style="font-size:1.1rem;margin-bottom:1rem;">Mungkin Anda Tertarik:</h3>
        <div style="display:flex;flex-direction:column;gap:1rem;">
        <?php
        // Get 5 recent posts
        $recent_posts = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC',
        ) );
        
        if ( $recent_posts->have_posts() ) :
            while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                <article class="card" style="padding:1rem;">
                    <p class="card-meta" style="margin-bottom:0.25rem;">
                        <span class="mono"><?php echo get_the_date( 'd M Y' ); ?></span>
                        · Oleh <?php the_author(); ?>
                    </p>
                    <h4 style="margin:0;font-size:1rem;">
                        <a href="<?php the_permalink(); ?>" style="color:#1a1a1a;text-decoration:none;"><?php the_title(); ?></a>
                    </h4>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>

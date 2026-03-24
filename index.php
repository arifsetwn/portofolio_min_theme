<?php
/**
 * Main Index Template
 * Fallback template untuk blog dan halaman lainnya
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    
    <?php if ( is_home() && ! is_front_page() ) : ?>
        <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">BLOG</p>
        <h1 class="page-title">Blog</h1>
        <p class="page-subtitle">Tulisan dan catatan pribadi</p>
        <hr class="divider">
    <?php elseif ( is_archive() ) : ?>
        <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">ARSIP</p>
        <h1 class="page-title"><?php the_archive_title(); ?></h1>
        <?php if ( get_the_archive_description() ) : ?>
            <p class="page-subtitle"><?php the_archive_description(); ?></p>
        <?php endif; ?>
        <hr class="divider">
    <?php elseif ( is_search() ) : ?>
        <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">PENCARIAN</p>
        <h1 class="page-title">Hasil Pencarian: <?php echo get_search_query(); ?></h1>
        <hr class="divider">
    <?php endif; ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <article class="card">
            <p class="card-meta">
                <span class="mono"><?php echo get_the_date( 'Y' ); ?></span>
                <?php if ( get_post_type() === 'post' ) : ?> · Oleh <?php the_author(); ?><?php endif; ?>
                <?php if ( has_category() ) : ?> · <?php the_category( ', ' ); ?><?php endif; ?>
            </p>
            <h2 class="card-title" style="border:none;padding:0;margin:0 0 0.25rem;">
                <a href="<?php the_permalink(); ?>" style="color:#1a1a1a;text-decoration:none;"><?php the_title(); ?></a>
            </h2>
            <?php if ( has_excerpt() ) : ?>
                <p style="font-size:0.82rem;color:#6b6b6b;margin:0.25rem 0 0.5rem;"><?php the_excerpt(); ?></p>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" style="font-size:0.82rem;color:#1a5276;">Baca selengkapnya →</a>
        </article>
    <?php endwhile; ?>

    <div style="display:flex;justify-content:space-between;margin-top:2rem;">
        <div>
            <?php previous_posts_link( '← Lebih Baru' ); ?>
        </div>
        <div>
            <?php next_posts_link( 'Lebih Lama →' ); ?>
        </div>
    </div>

<?php else : ?>
    
    <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">404</p>
    <h1 class="page-title">Tidak Ditemukan</h1>
    <p class="page-subtitle">Halaman yang Anda cari tidak tersedia.</p>
    <hr class="divider">
    <p>Maaf, konten yang Anda cari tidak ditemukan. Silakan gunakan navigasi di atas untuk mencari halaman lain.</p>

<?php endif; ?>

<?php get_footer(); ?>

<?php
/**
 * Archive Template
 * Template untuk menampilkan archive posts (blog, kategori, tag, dll)
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    
    <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">ARSIP</p>
    <h1 class="page-title"><?php the_archive_title(); ?></h1>
    <?php if ( get_the_archive_description() ) : ?>
        <p class="page-subtitle"><?php echo get_the_archive_description(); ?></p>
    <?php endif; ?>
    
    <hr class="divider">

    <?php while ( have_posts() ) : the_post(); ?>
        <article class="card">
            <p class="card-meta">
                <span class="mono"><?php echo get_the_date( 'd M Y' ); ?></span>
                <?php if ( has_category() ) : ?> · <?php the_category( ', ' ); ?><?php endif; ?>
                <?php if ( has_tag() ) : ?> · <?php the_tags( '', ', ', '' ); ?><?php endif; ?>
            </p>
            <h2 class="card-title" style="border:none;padding:0;margin:0 0 0.5rem;">
                <a href="<?php the_permalink(); ?>" style="color:#1a1a1a;text-decoration:none;"><?php the_title(); ?></a>
            </h2>
            <?php if ( has_post_thumbnail() ) : ?>
                <div style="margin:0.75rem 0;">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:auto;border:1px solid #d4cfc6;' ) ); ?>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ( has_excerpt() ) : ?>
                <p style="font-size:0.88rem;color:#1a1a1a;margin:0.5rem 0;line-height:1.7;"><?php the_excerpt(); ?></p>
            <?php else : ?>
                <p style="font-size:0.88rem;color:#1a1a1a;margin:0.5rem 0;line-height:1.7;"><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>" style="font-size:0.82rem;color:#1a5276;text-decoration:none;border-bottom:1px solid #1a5276;">Baca selengkapnya →</a>
        </article>
    <?php endwhile; ?>

    <div style="display:flex;justify-content:space-between;margin-top:2rem;padding-top:1.5rem;border-top:1px solid #d4cfc6;">
        <div>
            <?php if ( get_previous_posts_link() ) : ?>
                <a href="<?php echo get_previous_posts_page_link(); ?>" style="font-size:0.88rem;color:#1a5276;text-decoration:none;">← Lebih Baru</a>
            <?php endif; ?>
        </div>
        <div>
            <?php if ( get_next_posts_link() ) : ?>
                <a href="<?php echo get_next_posts_page_link(); ?>" style="font-size:0.88rem;color:#1a5276;text-decoration:none;">Lebih Lama →</a>
            <?php endif; ?>
        </div>
    </div>

<?php else : ?>
    
    <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">ARSIP</p>
    <h1 class="page-title">Tidak Ada Postingan</h1>
    <p class="page-subtitle">Belum ada konten di arsip ini.</p>
    
    <hr class="divider">
    
    <p>Maaf, belum ada postingan dalam arsip ini. Silakan kembali ke <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:#1a5276;">halaman utama</a>.</p>

<?php endif; ?>

<?php get_footer(); ?>

<?php
/**
 * Single Post Template
 * Template untuk single post/publication
 */

get_header(); 

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/<?php echo get_post_type() === 'publikasi' ? 'ScholarlyArticle' : ( get_post_type() === 'post' ? 'BlogPosting' : 'CreativeWork' ); ?>">
    
    <?php if ( get_post_type() == 'publikasi' ) :
        // Publikasi single template
        $year = get_post_meta( get_the_ID(), 'year', true );
        $journal = get_post_meta( get_the_ID(), 'journal', true );
        $authors = get_post_meta( get_the_ID(), 'authors', true );
        $pub_url = get_post_meta( get_the_ID(), 'url', true );
        $doi = get_post_meta( get_the_ID(), 'doi', true );
        $abstract = get_post_meta( get_the_ID(), 'abstract', true );
        $keywords = get_post_meta( get_the_ID(), 'keywords', true );
        ?>
        
        <header class="entry-header">
            <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">PUBLIKASI · <?php echo esc_html( $year ); ?></p>
            <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
            <p class="page-subtitle" itemprop="author"><?php echo esc_html( $authors ); ?></p>
        </header>
        
        <div class="card" style="background:#fdf5f4;border-color:#c0392b;">
            <p class="card-meta">
                <?php if ( $journal ) : ?><span class="italic-serif"><?php echo esc_html( $journal ); ?></span><?php endif; ?>
                <?php if ( $year ) : ?> · <?php echo esc_html( $year ); ?><?php endif; ?>
            </p>
            <?php if ( $doi ) : ?>
            <p style="margin-top:0.5rem;"><strong>DOI:</strong> <a href="https://doi.org/<?php echo esc_attr( $doi ); ?>" target="_blank"><?php echo esc_html( $doi ); ?></a></p>
            <?php endif; ?>
            <?php if ( $pub_url ) : ?>
            <p><strong>URL:</strong> <a href="<?php echo esc_url( $pub_url ); ?>" target="_blank"><?php echo esc_html( $pub_url ); ?></a></p>
            <?php endif; ?>
            <?php if ( $keywords ) : ?>
            <div style="margin-top:0.75rem;">
                <?php 
                $keyword_array = explode( ' ', $keywords );
                foreach ( $keyword_array as $kw ) :
                ?>
                <span class="tag"><?php echo esc_html( $kw ); ?></span>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <hr class="divider">
        
        <?php if ( $abstract ) : ?>
        <section id="abstract">
            <h2><span class="section-emoji">📄</span>Abstrak</h2>
            <p><?php echo esc_html( $abstract ); ?></p>
        </section>
        <?php endif; ?>
        
        <?php if ( get_the_content() ) : ?>
        <section id="content">
            <h2><span class="section-emoji">📖</span>Detail</h2>
            <?php the_content(); ?>
        </section>
        <?php endif; ?>
        
    <?php elseif ( get_post_type() == 'portofolio' ) :
        // Portofolio single template
        $year = get_post_meta( get_the_ID(), 'year', true );
        $category = get_post_meta( get_the_ID(), 'category', true );
        $description = get_post_meta( get_the_ID(), 'description', true );
        ?>
        
        <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">PORTOFOLIO · <?php echo esc_html( $year ); ?></p>
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if ( $description ) : ?>
        <p class="page-subtitle"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>
        
        <?php if ( has_post_thumbnail() ) : ?>
        <div style="margin-bottom:2rem;">
            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;border:1px solid #d4cfc6;' ) ); ?>
        </div>
        <?php endif; ?>
        
        <hr class="divider">
        
        <?php if ( $category || $year ) : ?>
        <div style="display:flex;gap:1rem;margin-bottom:2rem;">
            <?php if ( $category ) : ?>
            <div>
                <p class="mono" style="font-size:0.7rem;color:#6b6b6b;margin:0;">KATEGORI</p>
                <p style="font-weight:600;margin:0.25rem 0 0;"><?php echo esc_html( $category ); ?></p>
            </div>
            <?php endif; ?>
            <?php if ( $year ) : ?>
            <div>
                <p class="mono" style="font-size:0.7rem;color:#6b6b6b;margin:0;">TAHUN</p>
                <p style="font-weight:600;margin:0.25rem 0 0;"><?php echo esc_html( $year ); ?></p>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php the_content(); ?>
        
    <?php else :
        // Default blog post template
        ?>
        
        <p class="mono" style="font-size:0.72rem;color:#6b6b6b;margin-bottom:0.5rem;">BLOG · <?php echo get_the_date( 'd M Y' ); ?></p>
        <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
        <p class="page-subtitle">
          <span itemprop="author" itemscope itemtype="https://schema.org/Person">
            <span itemprop="name">Oleh <?php the_author(); ?></span>
          </span>
          <?php if ( has_category() ) : ?> · <?php the_category( ', ' ); ?><?php endif; ?>
        </p>
        
        <?php if ( has_post_thumbnail() ) : ?>
        <div style="margin-bottom:2rem;">
            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:auto;border:1px solid #d4cfc6;' ) ); ?>
        </div>
        <?php endif; ?>
        
        <hr class="divider">
        
        <?php the_content(); ?>
        
        <?php if ( has_tag() ) : ?>
        <div style="margin-top:2rem;padding-top:2rem;border-top:1px solid #d4cfc6;">
            <p class="mono" style="font-size:0.7rem;color:#6b6b6b;margin-bottom:0.5rem;">TAGS</p>
            <?php the_tags( '', ' ', '' ); ?>
        </div>
        <?php endif; ?>
        
    <?php endif; ?>
    
    <nav class="post-navigation" style="margin-top:3rem;padding-top:2rem;border-top:1px solid #d4cfc6;" aria-label="Post navigation">
        <div style="display:flex;justify-content:space-between;">
            <div>
                <?php previous_post_link( '%link', '← %title' ); ?>
            </div>
            <div>
                <?php next_post_link( '%link', '%title →' ); ?>
            </div>
        </div>
    </nav>
    
    </article><!-- #post-<?php the_ID(); ?> -->
    
    <?php
    endwhile;
endif;

get_footer(); ?>

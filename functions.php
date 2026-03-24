<?php
/**
 * Portofolio Minimalis - Theme Functions
 * 
 * @package Portofolio_Min
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function portofolio_min_setup() {
    // Add support for document title tag
    add_theme_support( 'title-tag' );
    
    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 40,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Menu Utama', 'portofolio-min' ),
    ) );
    
    // Add support for HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'portofolio_min_setup' );

/**
 * Enqueue scripts and styles
 */
function portofolio_min_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style( 'portofolio-min-style', get_stylesheet_uri(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'portofolio_min_scripts' );

/**
 * Register Custom Post Types
 */
function portofolio_min_register_post_types() {
    // Register Publikasi Post Type
    $labels_publikasi = array(
        'name'               => 'Publikasi',
        'singular_name'      => 'Publikasi',
        'menu_name'          => 'Publikasi',
        'add_new'            => 'Tambah Publikasi',
        'add_new_item'       => 'Tambah Publikasi Baru',
        'edit_item'          => 'Edit Publikasi',
        'new_item'           => 'Publikasi Baru',
        'view_item'          => 'Lihat Publikasi',
        'search_items'       => 'Cari Publikasi',
        'not_found'          => 'Tidak ada publikasi',
        'not_found_in_trash' => 'Tidak ada publikasi di trash',
    );
    
    $args_publikasi = array(
        'labels'              => $labels_publikasi,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'penelitian' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-book-alt',
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
    );
    
    register_post_type( 'publikasi', $args_publikasi );
    
    // Register Portofolio Post Type
    $labels_portofolio = array(
        'name'               => 'Portofolio',
        'singular_name'      => 'Portofolio',
        'menu_name'          => 'Portofolio',
        'add_new'            => 'Tambah Portofolio',
        'add_new_item'       => 'Tambah Portofolio Baru',
        'edit_item'          => 'Edit Portofolio',
        'new_item'           => 'Portofolio Baru',
        'view_item'          => 'Lihat Portofolio',
        'search_items'       => 'Cari Portofolio',
        'not_found'          => 'Tidak ada portofolio',
        'not_found_in_trash' => 'Tidak ada portofolio di trash',
    );
    
    $args_portofolio = array(
        'labels'              => $labels_portofolio,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'portofolio' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
    );
    
    register_post_type( 'portofolio', $args_portofolio );
}
add_action( 'init', 'portofolio_min_register_post_types' );

/**
 * Default menu fallback
 */
function portofolio_min_default_menu() {
    ?>
    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:2px;">
        <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>">
                <span class="nav-icon">🏠</span> Beranda
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/biografi' ) ); ?>" class="nav-link <?php echo is_page( 'biografi' ) ? 'active' : ''; ?>">
                <span class="nav-icon">👤</span> Biografi
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/penelitian' ) ); ?>" class="nav-link <?php echo is_post_type_archive( 'publikasi' ) ? 'active' : ''; ?>">
                <span class="nav-icon">🔬</span> Penelitian
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/portofolio' ) ); ?>" class="nav-link <?php echo is_post_type_archive( 'portofolio' ) ? 'active' : ''; ?>">
                <span class="nav-icon">💼</span> Portofolio
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="nav-link <?php echo ( is_home() && ! is_front_page() ) || is_singular( 'post' ) || is_category() || is_tag() || is_archive() && get_post_type() === 'post' ? 'active' : ''; ?>">
                <span class="nav-icon">📝</span> Blog
            </a>
        </li>
    </ul>
    <?php
}

/**
 * Custom walker for navigation menu
 */
class Portofolio_Min_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        
        $active = '';
        if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-page-ancestor', $classes ) ) {
            $active = 'active';
        }
        
        $output .= '<li>';
        
        $attributes  = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
        $attributes .= ' class="nav-link ' . $active . '"';
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span class="nav-icon">' . ( $item->attr_title ?: '📄' ) . '</span> ';
        $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Add custom meta boxes for publications
 */
function portofolio_min_add_meta_boxes() {
    add_meta_box(
        'publikasi_details',
        'Detail Publikasi',
        'portofolio_min_publikasi_meta_box',
        'publikasi',
        'normal',
        'high'
    );
    
    add_meta_box(
        'portofolio_details',
        'Detail Portofolio',
        'portofolio_min_portofolio_meta_box',
        'portofolio',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'portofolio_min_add_meta_boxes' );

/**
 * Publikasi meta box callback
 */
function portofolio_min_publikasi_meta_box( $post ) {
    wp_nonce_field( 'portofolio_min_publikasi_meta', 'portofolio_min_publikasi_nonce' );
    
    $year = get_post_meta( $post->ID, 'year', true );
    $journal = get_post_meta( $post->ID, 'journal', true );
    $authors = get_post_meta( $post->ID, 'authors', true );
    $url = get_post_meta( $post->ID, 'url', true );
    $doi = get_post_meta( $post->ID, 'doi', true );
    $keywords = get_post_meta( $post->ID, 'keywords', true );
    $abstract = get_post_meta( $post->ID, 'abstract', true );
    ?>
    <p>
        <label for="publikasi_year"><strong>Tahun:</strong></label><br>
        <input type="text" id="publikasi_year" name="publikasi_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="publikasi_journal"><strong>Jurnal:</strong></label><br>
        <input type="text" id="publikasi_journal" name="publikasi_journal" value="<?php echo esc_attr( $journal ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="publikasi_authors"><strong>Penulis:</strong></label><br>
        <input type="text" id="publikasi_authors" name="publikasi_authors" value="<?php echo esc_attr( $authors ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="publikasi_url"><strong>URL:</strong></label><br>
        <input type="url" id="publikasi_url" name="publikasi_url" value="<?php echo esc_url( $url ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="publikasi_doi"><strong>DOI:</strong></label><br>
        <input type="text" id="publikasi_doi" name="publikasi_doi" value="<?php echo esc_attr( $doi ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="publikasi_keywords"><strong>Keywords (pisahkan dengan spasi):</strong></label><br>
        <input type="text" id="publikasi_keywords" name="publikasi_keywords" value="<?php echo esc_attr( $keywords ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="publikasi_abstract"><strong>Abstrak:</strong></label><br>
        <textarea id="publikasi_abstract" name="publikasi_abstract" rows="5" style="width:100%;"><?php echo esc_textarea( $abstract ); ?></textarea>
    </p>
    <?php
}

/**
 * Portofolio meta box callback
 */
function portofolio_min_portofolio_meta_box( $post ) {
    wp_nonce_field( 'portofolio_min_portofolio_meta', 'portofolio_min_portofolio_nonce' );
    
    $year = get_post_meta( $post->ID, 'year', true );
    $category = get_post_meta( $post->ID, 'category', true );
    $description = get_post_meta( $post->ID, 'description', true );
    ?>
    <p>
        <label for="portofolio_year"><strong>Tahun:</strong></label><br>
        <input type="text" id="portofolio_year" name="portofolio_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="portofolio_category"><strong>Kategori:</strong></label><br>
        <input type="text" id="portofolio_category" name="portofolio_category" value="<?php echo esc_attr( $category ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="portofolio_description"><strong>Deskripsi Singkat:</strong></label><br>
        <textarea id="portofolio_description" name="portofolio_description" rows="3" style="width:100%;"><?php echo esc_textarea( $description ); ?></textarea>
    </p>
    <?php
}

/**
 * Save meta box data
 */
function portofolio_min_save_meta_boxes( $post_id ) {
    // Check if autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    
    // Check if revision
    if ( wp_is_post_revision( $post_id ) ) {
        return $post_id;
    }
    
    // Get post type
    $post_type = get_post_type( $post_id );
    
    // Publikasi meta
    if ( isset( $_POST['portofolio_min_publikasi_nonce'] ) && wp_verify_nonce( $_POST['portofolio_min_publikasi_nonce'], 'portofolio_min_publikasi_meta' ) ) {
        
        // Check user capability
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        
        // Verify post type
        if ( 'publikasi' !== $post_type ) {
            return $post_id;
        }
        
        if ( isset( $_POST['publikasi_year'] ) ) {
            $year = sanitize_text_field( $_POST['publikasi_year'] );
            // Validate year: must be 4 digits, between 1900-2100
            if ( preg_match( '/^\d{4}$/', $year ) && (int)$year >= 1900 && (int)$year <= 2100 ) {
                update_post_meta( $post_id, 'year', $year );
            }
        }
        if ( isset( $_POST['publikasi_journal'] ) ) {
            update_post_meta( $post_id, 'journal', sanitize_text_field( $_POST['publikasi_journal'] ) );
        }
        if ( isset( $_POST['publikasi_authors'] ) ) {
            update_post_meta( $post_id, 'authors', sanitize_text_field( $_POST['publikasi_authors'] ) );
        }
        if ( isset( $_POST['publikasi_url'] ) ) {
            $url = esc_url_raw( $_POST['publikasi_url'] );
            // Validate URL format
            if ( empty( $url ) || filter_var( $url, FILTER_VALIDATE_URL ) ) {
                update_post_meta( $post_id, 'url', $url );
            }
        }
        if ( isset( $_POST['publikasi_doi'] ) ) {
            update_post_meta( $post_id, 'doi', sanitize_text_field( $_POST['publikasi_doi'] ) );
        }
        if ( isset( $_POST['publikasi_keywords'] ) ) {
            update_post_meta( $post_id, 'keywords', sanitize_text_field( $_POST['publikasi_keywords'] ) );
        }
        if ( isset( $_POST['publikasi_abstract'] ) ) {
            update_post_meta( $post_id, 'abstract', sanitize_textarea_field( $_POST['publikasi_abstract'] ) );
        }
    }
    
    // Portofolio meta
    if ( isset( $_POST['portofolio_min_portofolio_nonce'] ) && wp_verify_nonce( $_POST['portofolio_min_portofolio_nonce'], 'portofolio_min_portofolio_meta' ) ) {
        
        // Check user capability
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        
        // Verify post type
        if ( 'portofolio' !== $post_type ) {
            return $post_id;
        }
        
        if ( isset( $_POST['portofolio_year'] ) ) {
            $year = sanitize_text_field( $_POST['portofolio_year'] );
            // Validate year: must be 4 digits, between 1900-2100
            if ( preg_match( '/^\d{4}$/', $year ) && (int)$year >= 1900 && (int)$year <= 2100 ) {
                update_post_meta( $post_id, 'year', $year );
            }
        }
        if ( isset( $_POST['portofolio_category'] ) ) {
            update_post_meta( $post_id, 'category', sanitize_text_field( $_POST['portofolio_category'] ) );
        }
        if ( isset( $_POST['portofolio_description'] ) ) {
            update_post_meta( $post_id, 'description', sanitize_textarea_field( $_POST['portofolio_description'] ) );
        }
    }
}
add_action( 'save_post', 'portofolio_min_save_meta_boxes' );

/**
 * Custom excerpt length
 */
function portofolio_min_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'portofolio_min_excerpt_length' );

/**
 * Custom excerpt more
 */
function portofolio_min_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'portofolio_min_excerpt_more' );

/**
 * SEO: Enable XML Sitemap for Custom Post Types
 */
function portofolio_min_add_to_sitemap( $args, $post_type ) {
    if ( 'publikasi' === $post_type || 'portofolio' === $post_type ) {
        $args['publicly_queryable'] = true;
    }
    return $args;
}
add_filter( 'register_post_type_args', 'portofolio_min_add_to_sitemap', 10, 2 );

/**
 * SEO: Better document title for SEO
 */
function portofolio_min_document_title_parts( $title ) {
    if ( is_singular( 'publikasi' ) ) {
        $title['title'] = get_the_title() . ' - Publikasi';
    } elseif ( is_singular( 'portofolio' ) ) {
        $title['title'] = get_the_title() . ' - Portofolio';
    } elseif ( is_post_type_archive( 'publikasi' ) ) {
        $title['title'] = 'Penelitian & Publikasi';
    } elseif ( is_post_type_archive( 'portofolio' ) ) {
        $title['title'] = 'Portofolio Proyek';
    }
    return $title;
}
add_filter( 'document_title_parts', 'portofolio_min_document_title_parts' );

/**
 * SEO: Add hreflang for international SEO (if needed)
 */
function portofolio_min_add_hreflang() {
    if ( is_singular() || is_front_page() ) {
        $current_url = esc_url( get_permalink() );
        echo '<link rel="alternate" hreflang="id" href="' . $current_url . '" />' . "\n";
        echo '<link rel="alternate" hreflang="x-default" href="' . $current_url . '" />' . "\n";
    }
}
add_action( 'wp_head', 'portofolio_min_add_hreflang' );

/**
 * SEO: Auto-generate excerpt for custom post types
 */
function portofolio_min_auto_excerpt( $excerpt ) {
    global $post;
    
    if ( empty( $excerpt ) && ( 'publikasi' === get_post_type() || 'portofolio' === get_post_type() ) ) {
        // Try to get abstract from meta
        if ( 'publikasi' === get_post_type() ) {
            $abstract = get_post_meta( $post->ID, 'abstract', true );
            if ( ! empty( $abstract ) ) {
                return wp_trim_words( $abstract, 25, '...' );
            }
        }
        
        // Fallback to content
        $content = get_the_content();
        if ( ! empty( $content ) ) {
            return wp_trim_words( strip_shortcodes( $content ), 25, '...' );
        }
    }
    
    return $excerpt;
}
add_filter( 'get_the_excerpt', 'portofolio_min_auto_excerpt' );

/**
 * SEO: Add article structured data for blog posts
 */
function portofolio_min_article_schema() {
    if ( is_single() && 'post' === get_post_type() ) {
        $schema = array(
            '@context'  => 'https://schema.org',
            '@type'     => 'BlogPosting',
            'headline'  => get_the_title(),
            'author'    => array(
                '@type' => 'Person',
                'name'  => get_the_author(),
            ),
            'datePublished' => get_the_date( 'c' ),
            'dateModified'  => get_the_modified_date( 'c' ),
            'publisher' => array(
                '@type' => 'Organization',
                'name'  => get_bloginfo( 'name' ),
                'logo'  => array(
                    '@type' => 'ImageObject',
                    'url'   => get_site_icon_url(),
                ),
            ),
        );
        
        if ( has_post_thumbnail() ) {
            $schema['image'] = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        }
        
        echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'portofolio_min_article_schema' );

/**
 * SEO: Improve robots meta tag
 */
function portofolio_min_robots_meta() {
    if ( is_search() || is_404() ) {
        echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
    } elseif ( is_archive() || is_home() ) {
        echo '<meta name="robots" content="index, follow" />' . "\n";
    } else {
        echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />' . "\n";
    }
}
add_action( 'wp_head', 'portofolio_min_robots_meta', 1 );

/**
 * SEO: Add breadcrumb structured data
 */
function portofolio_min_breadcrumb_schema() {
    if ( is_singular() && ! is_front_page() ) {
        $breadcrumb = array(
            '@context' => 'https://schema.org',
            '@type'    => 'BreadcrumbList',
            'itemListElement' => array(
                array(
                    '@type'    => 'ListItem',
                    'position' => 1,
                    'name'     => 'Home',
                    'item'     => home_url( '/' ),
                ),
            ),
        );
        
        $position = 2;
        
        // Add post type archive if applicable
        if ( is_singular( 'publikasi' ) ) {
            $breadcrumb['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => 'Penelitian',
                'item'     => get_post_type_archive_link( 'publikasi' ),
            );
        } elseif ( is_singular( 'portofolio' ) ) {
            $breadcrumb['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => 'Portofolio',
                'item'     => get_post_type_archive_link( 'portofolio' ),
            );
        }
        
        // Add current page
        $breadcrumb['itemListElement'][] = array(
            '@type'    => 'ListItem',
            'position' => $position,
            'name'     => get_the_title(),
            'item'     => get_permalink(),
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumb ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'portofolio_min_breadcrumb_schema' );

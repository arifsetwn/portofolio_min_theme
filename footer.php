    </main>

    <!-- ══ FOOTER ══ -->
    <footer>
      <span>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> · Made with ❤️ </span>
      
    </footer>

    <!-- ══ BOTTOM NAVIGATION (Mobile Only) ══ -->
    <nav class="bottom-nav">
      <div class="bottom-nav-container">
        <ul class="bottom-nav-list">
          <li class="bottom-nav-item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bottom-nav-link <?php echo is_front_page() ? 'active' : ''; ?>" title="Beranda">
              <span class="bottom-nav-icon">🏠</span>
            </a>
          </li>
          <li class="bottom-nav-item">
            <a href="<?php echo esc_url( home_url( '/biografi' ) ); ?>" class="bottom-nav-link <?php echo is_page( 'biografi' ) ? 'active' : ''; ?>" title="Biografi">
              <span class="bottom-nav-icon">👤</span>
            </a>
          </li>
          <li class="bottom-nav-item">
            <a href="<?php echo esc_url( home_url( '/penelitian' ) ); ?>" class="bottom-nav-link <?php echo is_post_type_archive( 'publikasi' ) ? 'active' : ''; ?>" title="Penelitian">
              <span class="bottom-nav-icon">🔬</span>
            </a>
          </li>
          <li class="bottom-nav-item">
            <a href="<?php echo esc_url( home_url( '/portofolio' ) ); ?>" class="bottom-nav-link <?php echo is_post_type_archive( 'portofolio' ) ? 'active' : ''; ?>" title="Portofolio">
              <span class="bottom-nav-icon">💼</span>
            </a>
          </li>
          <li class="bottom-nav-item">
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="bottom-nav-link <?php echo ( is_home() && ! is_front_page() ) || is_singular( 'post' ) || is_category() || is_tag() || ( is_archive() && get_post_type() === 'post' ) ? 'active' : ''; ?>" title="Blog">
              <span class="bottom-nav-icon">📝</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

  </div><!-- /.layout-wrapper -->

  <?php wp_footer(); ?>
</body>
</html>

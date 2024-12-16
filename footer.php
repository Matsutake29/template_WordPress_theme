<footer class="l-footer">
  <div class="l-footer__inner ">
    <div class="l-footer__content">

      <div class="l-footer__left">
        <div class="l-footer__logo-wrap">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="l-footer__logo-link">
            <span class="l-footer__logo">
              <picture>
                <source class="l-footer__logo-img" srcset="<?php echo get_template_directory_uri(); ?>/img/footer-logo-pc.png" media="(min-width: 768px)" loading="lazy"><!-- pc -->
                <img class="l-footer__logo-img" src="<?php echo get_template_directory_uri(); ?>/img/footer-logo-sp.png" alt="ロゴ" loading="lazy"><!-- sp -->
              </picture>
            </span><!-- /.l-footer__logo -->
          </a><!-- /.l-footer__logo-link -->
        </div><!-- /.l-footer__logo-wrap -->
      </div><!-- /.l-footer__left -->

      <div class="l-footer__right">
        <nav class="l-footer__nav">
          <ul class="l-footer__items">
            <span class="l-footer__nav-left">
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
            </span><!-- /.l-footer__nav-left -->
            <span class="l-footer__nav-right">
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
              <li class="l-footer__item">
                <a href="<?php echo esc_url(home_url('/〇〇/')); ?>">〇〇</a>
              </li><!-- /.l-footer__item -->
            </span><!-- /.l-footer__nav-right -->
          </ul><!-- /.l-footer__items -->
        </nav><!-- /.l-footer__nav -->
      </div><!-- /.l-footer__right -->

    </div><!-- /.l-footer__content -->
    <div class="l-footer__copyright">
      <p class="l-footer__copyright-text">Copyright &copy; 2025 〇〇 All Rights Reserved.</p>
    </div><!-- /.l-footer__copyright -->
  </div><!-- /.l-footer__inner -->
</footer><!-- /.l-footer -->
<?php wp_footer(); ?>
</body>

</html>
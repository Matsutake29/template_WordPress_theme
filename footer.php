<footer class="l-footer">
  <div class="l-footer__inner ">
    <div class="l-footer__content">

      <div class="l-footer__left">
        <div class="l-footer__logo-wrap">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="l-footer__logo-link">
            <span class="l-footer__logo">
              <picture class="l-footer__logo-img">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-pc.png" media="(min-width: 768px)" loading="lazy"><!-- pc -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo-sp.png" alt="ロゴ" loading="lazy"><!-- sp -->
              </picture>
            </span>
          </a>
        </div>
      </div>

      <div class="l-footer__right">
        <div class="l-footer__nav">

        </div>
      </div>

    </div>
    <div class="l-footer__copyright">
      <p class="l-footer__copyright-text">Copyright &copy; 2025 〇〇 All Rights Reserved.</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
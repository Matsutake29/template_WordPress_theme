<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <?php wp_head(); ?>
</head>

<body>
  <?php if (is_user_logged_in()) : ?>
    <style type="text/css">
      .l-header {
        margin-top: 32px;
      }

      @media screen and (max-width: 767px) {
        .l-header {
          margin-top: 46px;
        }
      }
    </style>
  <?php endif; ?>
  <header class="l-header">
    <div class="l-header__inner">
      <div class="l-header__content">

        <div class="l-header__left">
          <h1 class="l-header__logo-wrap">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo-link">
              <span class="l-header__logo">
                <picture>
                  <source class="l-header__logo-img" srcset="<?php echo get_template_directory_uri(); ?>/img/header-logo-pc.png" media="(min-width: 768px)"><!-- pc -->
                  <img class="l-header__logo-img" src="<?php echo get_template_directory_uri(); ?>/img/header-logo-sp.png" alt="ロゴ"><!-- sp -->
                </picture>
              </span><!-- /.l-header__logo -->
            </a><!-- /.l-header__logo-link -->
          </h1><!-- /.l-header__logo-wrap -->
        </div><!-- /.l-header__left -->

        <div class="l-header__right">
          <div class="drawer drawer--right p-drawer">
            <button type="button" class="drawer-toggle drawer-hamburger p-drawer__hamburger">
              <span class="sr-only">toggle navigation</span>
              <span class="drawer-hamburger-icon"></span>
            </button>
            <?php
            wp_nav_menu(
              array(
                'depth' => 1,
                'theme_location' => 'drawer', // グローバルメニューをここに表示すると指定
                'container' => 'nav',
                'container_class' => 'drawer-nav p-drawer__nav',
                'menu_class' => 'drawer-menu p-drawer__menu', // ulタグへclass追加
                'add_li_class' => 'p-drawer__items', // liタグへclass追加
                'add_a_class' => 'drawer-menu-item p-drawer__item', // aタグへclass追加
                'link_before'  => '<span class="p-drawer__item-text">',
                'link_after'  => '</span>',
              )
            );
            ?>
          </div><!-- /.p-drawer -->
        </div><!-- /.l-header__right -->

      </div><!-- /.l-header__content -->
    </div><!-- /.l-header__inner -->
  </header><!-- /.l-header -->
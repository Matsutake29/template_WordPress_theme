<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
  <?php wp_head(); ?>
</head>

<body>
  <header class="l-header">
    <div class="l-header__inner">
      <div class="l-header__content">
        <div class="l-header__left">
          <div class="l-header__logo-wrap">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo-link">
              <span class="l-header__logo">
                <picture class="l-header__logo-img">
                  <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/header-logo-pc.png" media="(min-width: 768px)"><!-- pc -->
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-logo-sp.png" alt="ロゴ"><!-- sp -->
                </picture>
              </span>
            </a>
          </div>
        </div>
        <div class="l-header__right">
          <div class="drawer drawer--right c-drawer">
            <button type="button" class="drawer-toggle drawer-hamburger c-drawer__hamburger">
              <span class="sr-only">toggle navigation</span>
              <span class="drawer-hamburger-icon c-drawer__icon"></span>
            </button>
            <?php
            wp_nav_menu(
              array(
                'depth' => 1,
                'theme_location' => 'drawer', // グローバルメニューをここに表示すると指定
                'container' => 'nav',
                'container_class' => 'drawer-nav c-drawer__nav',
                'menu_class' => 'drawer-menu c-drawer__menu', // ulタグへclass追加
                'add_li_class' => 'c-drawer__items', // liタグへclass追加
                'add_a_class' => 'drawer-menu-item c-drawer__item', // aタグへclass追加
                'link_before'  => '<span class="c-drawer__item-text">', // aタグの前に追加
                'link_after'  => '</span>',
              )
            );
            ?>
          </div>
        </div>
      </div>
    </div>
  </header>
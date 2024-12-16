<?php
function my_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script'
  ));
}
add_action("after_setup_theme", 'my_setup');

function my_script_init()
{
  // スタイルシートの読み込み
  wp_enqueue_style("Google_Fonts", "https://fonts.googleapis.com", array(), "", "all");
  wp_enqueue_style("Google_Fonts02", "https://fonts.gstatic.com", array(), "", "all");
  wp_enqueue_style("Google_Fonts03", "https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300..900&display=swap", array(), "", "all");
  wp_enqueue_style("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array(), "11", "all");
  wp_enqueue_style("drawer", "https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css", array(), "3.2.2", "all");
  wp_enqueue_style("my", get_template_directory_uri() . "/css/style.min.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");

  // スクリプトの読み込み
  wp_enqueue_script("iScroll", "https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js", array(), "", true);
  wp_enqueue_script("drawer.js", "https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js", array("jquery"), "", true);
  wp_enqueue_script("swiper.js", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), "", true);
  wp_enqueue_script("my", get_template_directory_uri() . "/js/script.min.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

function my_menu_init()
{
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'footer' => 'フッターメニュー',
      'drawer' => 'ドロワーメニュー',
    )
  );
}
add_action('init', 'my_menu_init');

// wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// wp_nav_menuのaにclass追加
function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

// お問い合わせページを除き、「reCAPTCHA」を読み込ませない

function load_recaptcha_js()
{
  if (! is_page('contact')) {
    wp_deregister_script('google-recaptcha');
  }
}
add_action('wp_enqueue_scripts', 'load_recaptcha_js', 100);

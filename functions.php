<?php
/* =========================
 * 基本セットアップ
 * ========================= */
function my_setup() {
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
}
add_action('after_setup_theme', 'my_setup');

require_once get_template_directory() . '/inc/const.php';

/* =========================
 * アセット
 * ========================= */
function my_script_init() {
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', [], null, true);
  wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', ['gsap'], null, true);
  wp_enqueue_script('gsap-scrollto', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js', ['gsap'], null, true);

  wp_enqueue_style('NotoSansJp', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
  wp_enqueue_style('Montserrat', '//fonts.googleapis.com/css2?family=Montserrat:wght@200..700&display=swap');
  wp_enqueue_style('Poppins', '//fonts.googleapis.com/css2?family=Poppins:wght@200..700&display=swap');
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], null);

  wp_enqueue_script('theme-js', get_theme_file_uri('/assets/js/script.js'), [], filemtime(get_theme_file_path('/assets/js/script.js')), true);
  wp_enqueue_style('theme-css', get_theme_file_uri('/assets/css/style.css'), [], filemtime(get_theme_file_path('/assets/css/style.css')));
}
add_action('wp_enqueue_scripts', 'my_script_init');

/* =========================
 * ターム名ヘルパ
 * ========================= */
if (!function_exists('br_get_genre_term_name')) {
  function br_get_genre_term_name($post_id=null) {
    $post_id = $post_id ?: get_the_ID();
    $terms = get_the_terms($post_id, 'genre');
    if ($terms && !is_wp_error($terms)) { $t = reset($terms); return $t->name ?? ''; }
    return '';
  }
}
if (!function_exists('br_get_topic_term_name')) {
  function br_get_topic_term_name($post_id=null) {
    $post_id = $post_id ?: get_the_ID();
    $terms = get_the_terms($post_id, 'topic');
    if ($terms && !is_wp_error($terms)) { $t = reset($terms); return $t->name ?? ''; }
    return '';
  }
}

/* =========================
 * タクソノミー（URL衝突回避のスラッグ）
 * ========================= */
add_action('init', function () {
  register_taxonomy('genre', ['news'], [
    'label' => 'ジャンル',
    'public' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'news/genre', 'with_front' => false, 'hierarchical' => false],
  ]);
  register_taxonomy('topic', ['column'], [
    'label' => 'トピック',
    'public' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'column/topic', 'with_front' => false, 'hierarchical' => false],
  ]);
}, 11); // CPT登録後に実行

/* =========================
 * 一覧件数（date関連は一切触らない）
 * ========================= */
function my_pre_get_posts($q) {
  if (is_admin() || !$q->is_main_query()) return;

  if ($q->is_search()) {
    $q->set('posts_per_page', 9);
  }

  if ($q->is_post_type_archive('news')) {
    $q->set('posts_per_page', 10);
  }
  if ($q->is_post_type_archive('column')) {
    $q->set('posts_per_page', 9);
  }
}
add_action('pre_get_posts', 'my_pre_get_posts', 20);



// 日付アーカイブは常に date.php を使う（CPTアーカイブより優先）
add_filter('template_include', function ($template) {
  if ( is_date() ) {
    $date_tpl = locate_template('date.php');
    if ( $date_tpl ) return $date_tpl;
  }
  return $template;
}, 20);



/* =========================
 * 管理画面：通常投稿を非表示（必要なら）
 * ========================= */
add_action('admin_menu', function () {
  remove_menu_page('edit.php');
});

/* =========================
 * AI1WM: node_modules 除外
 * ========================= */
$__theme = wp_get_theme();
$__theme_name = $__theme->stylesheet;
add_filter('ai1wm_exclude_themes_from_export', function ($exclude) {
  global $__theme_name;
  return ["{$__theme_name}/src/node_modules"];
});
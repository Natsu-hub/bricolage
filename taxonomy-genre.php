<?php
/**
 * Taxonomy Archive: genre (for news)
 * ファイル名: taxonomy-genre.php
 */
get_header();

// 現在のターム情報
$term = get_queried_object();

// ページ番号
$paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;

// 月別絞り込み（/?m=YYYYMM を想定。不要なら削除OK）
$m = isset($_GET['m']) ? preg_replace('/[^0-9]/', '', $_GET['m']) : '';
$date_query = [];
if ($m && strlen($m) === 6) {
  $date_query = [
    [
      'year'  => (int) substr($m, 0, 4),
      'month' => (int) substr($m, 4, 2),
    ]
  ];
}

// 投稿一覧（news に限定）
$query = new WP_Query([
  'post_type'      => 'news',
  'posts_per_page' => 10,
  'paged'          => $paged,
  'orderby'        => 'date',
  'order'          => 'DESC',
  'tax_query'      => [[
    'taxonomy' => 'genre',
    'field'    => 'term_id',
    'terms'    => $term->term_id,
  ]],
  'date_query'     => $date_query,
  'no_found_rows'  => false,
]);
?>

<!-- c-below-mv -->
<section class="c-below-mv">
    <div class="c-below-mv__inner l-inner--1200">
        <h1 class="c-below-mv__title">
            <img class="c-below-mv__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46">
            <span class="c-below-mv__title-en" lang="en">news</span>
            <span class="c-below-mv__title-ja"><?php echo esc_html( $term->name ); ?></span>
        </h1>
        <div class="c-below-mv__img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/below/news_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
            <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en">news</span>
        </div>
    </div>
</section>

<!-- p-news -->
<section class="p-news">
    <div class="p-news__inner l-inner--1200">
        <div class="p-news__container">

            <div class="p-news__main-content">

                <!-- 見出し -->
                <!-- <header class="p-news__header">
                    <h1 class="p-news__title c-title">
                        <span class="c-title-en" lang="en">NEWS</span>
                        <span class="c-title-ja">カテゴリー：<?php echo esc_html( $term->name ); ?></span>
                    </h1>
                    <?php if ( term_description( $term->term_id, 'genre' ) ) : ?>
                    <div class="p-news__desc"><?php echo wp_kses_post( term_description( $term->term_id, 'genre' ) ); ?></div>
                    <?php endif; ?>
                </header> -->

                <!-- 一覧 -->
                <ul class="p-news__lists">
                    <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="p-top-news__list c-news-list">
                        <a class="p-top-news__list-link c-news-list__link" href="<?php the_permalink(); ?>">
                            <div class="p-top-news__label c-news-list__label">
                                <time class="p-top-news__date c-news-list__date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                    <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                                </time>
                                <!-- 現在ターム名（他タームも付く可能性があるなら先頭を表示） -->
                                <span class="p-top-news__list-category c-news-list__category">
                                    <?php echo esc_html( $term->name ); ?>
                                </span>
                            </div>
                            <div class="p-top-news__list-title c-news-list__title"><?php the_title(); ?></div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <li class="p-top-news__list p-top-news__list--empty">まだ記事がありません</li>
                    <?php endif; wp_reset_postdata(); ?>
                </ul>

                <!-- pagination -->
                <?php get_template_part('template/pagination'); ?>
            </div>

            <!-- aside -->
            <?php get_template_part('template/side-bar'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
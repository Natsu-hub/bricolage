<?php
/**
 * Date Archive Template (news / column 両対応)
 * ファイル名: date.php
 */
get_header();

$year  = get_query_var('year');
$month = get_query_var('monthnum');
$day   = get_query_var('day');

$date_title = '';
if ($year && $month && $day) {
  $date_title = sprintf('%d年%02d月%02d日', $year, $month, $day);
} elseif ($year && $month) {
  $date_title = sprintf('%d年%02d月', $year, $month);
} elseif ($year) {
  $date_title = sprintf('%d年', $year);
}

// post_type の推定（クエリ → ループ先頭ポスト → news を既定）
$pt = get_query_var('post_type');
if (is_array($pt)) $pt = reset($pt);
if (!$pt) {
  if (have_posts()) {
    the_post();
    $pt = get_post_type();
    rewind_posts();
  }
}
$pt = in_array($pt, ['news','column'], true) ? $pt : 'news';

$label_en = ($pt === 'news') ? 'NEWS' : 'COLUMN';
$label_ja = ($pt === 'news') ? 'ニュース' : 'コラム';
?>

<main class="l-main">
    <!-- c-below-mv -->
    <section class="c-below-mv">
        <div class="c-below-mv__inner l-inner--1200">
            <h1 class="c-below-mv__title">
                <img class="c-below-mv__title-deco c-deco-04" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46" loading="lazy">
                <span class="c-below-mv__title-en" lang="en"><?php echo esc_html($label_en); ?></span>
                <span class="c-below-mv__title-ja"><?php echo esc_html($date_title); ?>の<?php echo esc_html($label_ja); ?></span>
            </h1>
            <div class="c-below-mv__img">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/below/news_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
                <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en"><?php echo esc_html($label_en); ?></span>
            </div>
        </div>
    </section>

    <section class="p-news">
        <div class="p-news__inner l-inner--1200">
            <div class="p-news__container">
                <div class="p-news__main-content">

                    <?php if ( $pt === 'column' ) : ?>
                    <!-- COLUMN：カード型 -->
                    <ul class="p-news__cards">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php
                  $topic_terms = get_the_terms( get_the_ID(), 'topic' );
                  $topic_name  = ( $topic_terms && ! is_wp_error( $topic_terms ) ) ? $topic_terms[0]->name : '';
                ?>
                        <li class="p-news__card c-news-card">
                            <a href="<?php the_permalink(); ?>" class="c-news-card__link">
                                <div class="c-news-card__img">
                                    <?php if ( has_post_thumbnail() ) : the_post_thumbnail('large'); else : ?>
                                    <picture>
                                        <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/no-img.webp" type="image/webp">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/no-img.png" alt="" width="1440" height="400" loading="lazy">
                                    </picture>
                                    <?php endif; ?>
                                </div>
                                <div class="c-news-card__content">
                                    <div class="c-news-card__label">
                                        <time class="c-news-card__date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                            <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                                        </time>
                                        <?php if ( $topic_name ) : ?>
                                        <span class="c-news-card__category"><?php echo esc_html( $topic_name ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="c-news-card__title"><?php the_title(); ?></div>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; else : ?>
                        <li class="p-news__card p-top-news__card--empty">まだ記事がありません</li>
                        <?php endif; ?>
                    </ul>

                    <?php else : ?>
                    <!-- NEWS：リスト型 -->
                    <ul class="p-top-news__lists">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php
                  $genre_terms = get_the_terms( get_the_ID(), 'genre' );
                  $genre_name  = ( $genre_terms && ! is_wp_error( $genre_terms ) ) ? $genre_terms[0]->name : '';
                ?>
                        <li class="p-top-news__list c-news-list">
                            <a class="p-top-news__list-link c-news-list__link" href="<?php the_permalink(); ?>">
                                <div class="p-top-news__label c-news-list__label">
                                    <time class="p-top-news__date c-news-list__date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                        <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                                    </time>
                                    <?php if ( $genre_name ) : ?>
                                    <span class="p-top-news__list-category c-news-list__category"><?php echo esc_html( $genre_name ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="p-top-news__list-title c-news-list__title"><?php the_title(); ?></div>
                            </a>
                        </li>
                        <?php endwhile; else : ?>
                        <li class="p-top-news__list p-top-news__list--empty">まだ記事がありません</li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>

                    <?php get_template_part('template/pagination'); ?>
                </div>

                <?php get_template_part('template/side-bar'); ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
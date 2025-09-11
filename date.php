<?php
/**
 * Date Archive Template (news / column 両対応)
 * ファイル名: date.php
 */
get_header();

$paged = max(1, (int) get_query_var('paged'));
$year  = (int) get_query_var('year');
$month = (int) get_query_var('monthnum');
$day   = (int) get_query_var('day');

$pt = get_query_var('post_type'); // pre_get_posts で news/column が入る
$pt = in_array($pt, ['news','column'], true) ? $pt : 'news';

$label_en = ($pt === 'news') ? 'NEWS' : 'COLUMN';
$label_ja = ($pt === 'news') ? 'ニュース' : 'コラム';

$date_title = '';
if ($year && $month && $day) {
  $date_title = sprintf('%d年%02d月%02d日', $year, $month, $day);
} elseif ($year && $month) {
  $date_title = sprintf('%d年%02d月', $year, $month);
} elseif ($year) {
  $date_title = sprintf('%d年', $year);
}
?>
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

<!-- p-news -->
<section class="p-news">
    <div class="p-news__inner l-inner--1200">
        <div class="p-news__container">

            <div class="p-news__main-content">
                <?php if ( have_posts() ) : ?>

                <?php if ( $pt === 'news' ) : ?>
                <!-- NEWS：リスト型 -->
                <ul class="p-news__lists">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <li class="p-top-news__list c-news-list">
                        <a class="p-top-news__list-link c-news-list__link" href="<?php the_permalink(); ?>">
                            <div class="p-top-news__label c-news-list__label">
                                <time class="p-top-news__date c-news-list__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <?php
                        $genre_terms = get_the_terms(get_the_ID(), 'genre');
                        if ( $genre_terms && ! is_wp_error($genre_terms) ) :
                      ?>
                                <span class="p-top-news__list-category c-news-list__category">
                                    <?php echo esc_html($genre_terms[0]->name); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="p-top-news__list-title c-news-list__title"><?php the_title(); ?></div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>

                <?php else : ?>
                <!-- COLUMN：カード型 -->
                <ul class="p-news__cards">
                    <?php while ( have_posts() ) : the_post(); ?>
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
                                    <time class="c-news-card__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                    </time>
                                    <?php
                          $topic_terms = get_the_terms(get_the_ID(), 'topic');
                          if ( $topic_terms && ! is_wp_error($topic_terms) ) :
                        ?>
                                    <span class="c-news-card__category"><?php echo esc_html($topic_terms[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="c-news-card__title"><?php the_title(); ?></div>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>

                <!-- pagination -->
                <?php get_template_part('template/pagination'); ?>

                <?php else : ?>
                <p>該当する<?php echo esc_html($label_ja); ?>はありません</p>
                <?php endif; ?>

            </div>

            <!-- aside -->
            <?php get_template_part('template/side-bar'); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>